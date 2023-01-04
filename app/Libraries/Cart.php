<?php

namespace App\Libraries;

/**
 * Shopping Cart Class
 *
 * @category	Shopping Cart
 *
 * @see		https://codeigniter.com/userguide3/libraries/cart.html
 */
class Cart
{
    /**
     * These are the regular expression rules that we use to validate the product ID and product name
     * alpha-numeric, dashes, underscores, or periods
     *
     * @var string
     */
    public $product_id_rules = '\.a-z0-9_-';

    /**
     * These are the regular expression rules that we use to validate the product ID and product name
     * alpha-numeric, dashes, underscores, colons or periods
     *
     * @var string
     */
    public $product_name_rules = '\w \-\.\:';

    /**
     * only allow safe product names
     *
     * @var bool
     */
    public $product_name_safe = true;

    /**
     * Contents of the cart
     *
     * @var array
     */
    protected $_cart_contents = [];

    /**
     * Shopping Class Constructor
     *
     * The constructor loads the Session class, used to store the shopping cart contents.
     *
     * @return void
     */
    public function __construct()
    {
        // Grab the shopping cart array from the session table
        $this->_cart_contents = session('cart_contents');
        if ($this->_cart_contents === null) {
            // No cart exists so we'll set some base values
            $this->_cart_contents = ['cart_total' => 0, 'total_items' => 0];
        }

        log_message('info', 'Cart Class Initialized');
    }

    /**
     * Insert items into the cart and save it to the session table
     *
     * @param array $items array of items to insert into the cart
     *
     * @return bool True if successful, false otherwise
     */
    public function insert(array $items = []): bool
    {
        // Was any cart data passed? No? Bah...
        if (! is_array($items) || count($items) === 0) {
            log_message('error', 'The insert method must be passed an array containing data.');

            return false;
        }

        // You can either insert a single product using a one-dimensional array,
        // or multiple products using a multi-dimensional one. The way we
        // determine the array type is by looking for a required array key named "id"
        // at the top level. If it's not found, we will assume it's a multi-dimensional array.

        $save_cart = false;
        if (isset($items['id'])) {
            if (($rowId = $this->_insert($items))) {
                $save_cart = true;
            }
        } else {
            foreach ($items as $val) {
                if (is_array($val) && isset($val['id'])) {
                    if ($this->_insert($val)) {
                        $save_cart = true;
                    }
                }
            }
        }

        // Save the cart data if the insert was successful
        if ($save_cart === true) {
            $this->_save_cart();

            return $rowId ?? true;
        }

        return false;
    }

    /**
     * Insert
     *
     * @param array $items array of items to inserted
     *
     * @return bool|string|null
     */
    protected function _insert(array $items = [])
    {
        // Was any cart data passed? No? Bah...
        if (! is_array($items) || count($items) === 0) {
            log_message('error', 'The insert method must be passed an array containing data.');

            return false;
        }

        // Does the $items array contain an id, quantity, price, and name?  These are required
        if (! isset($items['id'], $items['qty'], $items['price'], $items['name'])) {
            log_message('error', 'The cart array must contain a product ID, quantity, price, and name.');

            return false;
        }

        // Prep the quantity. It can only be a number.  Duh... also trim any leading zeros
        $items['qty'] = (float) $items['qty'];

        // If the quantity is zero or blank there's nothing for us to do
        if ($items['qty'] === 0) {
            return false;
        }

        // Validate the product ID. It can only be alpha-numeric, dashes, underscores or periods
        // Not totally sure we should impose this rule, but it seems prudent to standardize IDs.
        // Note: These can be user-specified by setting the $this->product_id_rules variable.
        if (! preg_match('/^[' . $this->product_id_rules . ']+$/i', $items['id'])) {
            log_message('error', 'Invalid product ID.  The product ID can only contain alpha-numeric characters, dashes, and underscores');

            return false;
        }

        // Validate the product name. It can only be alpha-numeric, dashes, underscores, colons or periods.
        // Note: These can be user-specified by setting the $this->product_name_rules variable.
        if ($this->product_name_safe && ! preg_match('/^[' . $this->product_name_rules . ']+$/iu', $items['name'])) {
            log_message('error', 'An invalid name was submitted as the product name: ' . $items['name'] . ' The name can only contain alpha-numeric characters, dashes, underscores, colons, and spaces');

            return false;
        }

        // Prep the price. Remove leading zeros and anything that isn't a number or decimal point.
        $items['price'] = (float) $items['price'];

        // We now need to create a unique identifier for the item being inserted into the cart.
        // Every time something is added to the cart it is stored in the master cart array.
        // Each row in the cart array, however, must have a unique index that identifies not only
        // a particular product, but makes it possible to store identical products with different options.
        // For example, what if someone buys two identical t-shirts (same product ID), but in
        // different sizes?  The product ID (and other attributes, like the name) will be identical for
        // both sizes because it's the same shirt. The only difference will be the size.
        // Internally, we need to treat identical submissions, but with different options, as a unique product.
        // Our solution is to convert the options array to a string and MD5 it along with the product ID.
        // This becomes the unique "row ID"
        if (isset($items['options']) && count($items['options']) > 0) {
            $rowId = md5($items['id'] . serialize($items['options']));
        } else {
            // No options were submitted so we simply MD5 the product ID.
            // Technically, we don't need to MD5 the ID in this case, but it makes
            // sense to standardize the format of array indexes for both conditions
            $rowId = md5($items['id']);
        }

        // Now that we have our unique "row ID", we'll add our cart items to the master array
        // grab quantity if it's already there and add it on
        $old_quantity = isset($this->_cart_contents[$rowId]['qty']) ? (int) $this->_cart_contents[$rowId]['qty'] : 0;

        // Re-create the entry, just to make sure our index contains only the data from this submission
        $items['rowid'] = $rowId;
        $items['qty'] += $old_quantity;
        $this->_cart_contents[$rowId] = $items;

        return $rowId;
    }

    /**
     * Update the cart
     *
     * This function permits the quantity of a given item to be changed.
     * Typically it is called from the "view cart" page if a user makes
     * changes to the quantity before checkout. That array must contain the
     * product ID and quantity for each item.
     *
     * @param array $items array of items to be updated
     *
     * @return bool True if the update was successful, false otherwise
     */
    public function update(array $items = []): bool
    {
        // Was any cart data passed?
        if (! is_array($items) || count($items) === 0) {
            return false;
        }

        // You can either update a single product using a one-dimensional array,
        // or multiple products using a multi-dimensional one.  The way we
        // determine the array type is by looking for a required array key named "rowid".
        // If it's not found we assume it's a multi-dimensional array
        $save_cart = false;
        if (isset($items['rowid'])) {
            if ($this->_update($items) === true) {
                $save_cart = true;
            }
        } else {
            foreach ($items as $val) {
                if (is_array($val) && isset($val['rowid'])) {
                    if ($this->_update($val) === true) {
                        $save_cart = true;
                    }
                }
            }
        }

        // Save the cart data if the insert was successful
        if ($save_cart === true) {
            $this->_save_cart();

            return true;
        }

        return false;
    }

    /**
     * Update the cart
     *
     * This function permits changing item properties.
     * Typically it is called from the "view cart" page if a user makes
     * changes to the quantity before checkout. That array must contain the
     * rowid and quantity for each item.
     */
    protected function _update(array $items = []): bool
    {
        // Without these array indexes there is nothing we can do
        if (! isset($items['rowid'], $this->_cart_contents[$items['rowid']])) {
            return false;
        }

        // Prep the quantity
        if (isset($items['qty'])) {
            $items['qty'] = (float) $items['qty'];
            // Is the quantity zero?  If so we will remove the item from the cart.
            // If the quantity is greater than zero we are updating
            if ($items['qty'] === 0) {
                unset($this->_cart_contents[$items['rowid']]);

                return true;
            }
        }

        // find updatable keys
        $keys = array_intersect(array_keys($this->_cart_contents[$items['rowid']]), array_keys($items));
        // if a price was passed, make sure it contains valid data
        if (isset($items['price'])) {
            $items['price'] = (float) $items['price'];
        }

        // product id & name shouldn't be changed
        foreach (array_diff($keys, ['id', 'name']) as $key) {
            $this->_cart_contents[$items['rowid']][$key] = $items[$key];
        }

        return true;
    }

    /**
     * Save the cart array to the session DB
     */
    protected function _save_cart(): bool
    {
        // Let's add up the individual prices and set the cart sub-total
        $this->_cart_contents['total_items'] = $this->_cart_contents['cart_total'] = 0;

        foreach ($this->_cart_contents as $key => $val) {
            // We make sure the array contains the proper indexes
            if (! is_array($val) || ! isset($val['price'], $val['qty'])) {
                continue;
            }

            $this->_cart_contents['cart_total'] += ($val['price'] * $val['qty']);
            $this->_cart_contents['total_items'] += $val['qty'];
            $this->_cart_contents[$key]['subtotal'] = ($this->_cart_contents[$key]['price'] * $this->_cart_contents[$key]['qty']);
        }

        // Is our cart empty? If so we delete it from the session
        if (count($this->_cart_contents) <= 2) {
            session()->remove('cart_contents');

            // Nothing more to do... coffee time!
            return false;
        }

        // If we made it this far it means that our cart has data.
        // Let's pass it to the Session class so it can be stored
        session()->set(['cart_contents' => $this->_cart_contents]);

        // Woot!
        return true;
    }

    /**
     * Cart Total
     *
     * @return float
     */
    public function total()
    {
        return $this->_cart_contents['cart_total'];
    }

    /**
     * Remove Item
     *
     * Removes an item from the cart
     */
    public function remove(string $rowId): bool
    {
        // unset & save
        unset($this->_cart_contents[$rowId]);
        $this->_save_cart();

        return true;
    }

    /**
     * Total Items
     *
     * Returns the total item count
     */
    public function total_items(): int
    {
        return $this->_cart_contents['total_items'];
    }

    /**
     * Cart Contents
     *
     * Returns the entire cart array
     *
     * @param bool $newest_first Sort items. True if newest first, false otherwise. Default is false.
     */
    public function contents(bool $newest_first = false): array
    {
        // do we want the newest first?
        $cart = ($newest_first) ? array_reverse($this->_cart_contents) : $this->_cart_contents;

        // Remove these so they don't create a problem when showing the cart table
        unset($cart['total_items'], $cart['cart_total']);

        return $cart;
    }

    /**
     * Get cart item
     *
     * Returns the details of a specific item in the cart
     */
    public function get_item(string $rowId): array
    {
        return (in_array($rowId, ['total_items', 'cart_total'], true) || ! isset($this->_cart_contents[$rowId]))
            ? false
            : $this->_cart_contents[$rowId];
    }

    /**
     * Has options
     *
     * Returns TRUE if the rowid passed to this function correlates to an item
     * that has options associated with it.
     */
    public function has_options(string $rowId = ''): bool
    {
        return isset($this->_cart_contents[$rowId]['options']) && count($this->_cart_contents[$rowId]['options']) !== 0;
    }

    /**
     * Product options
     *
     * Returns the an array of options, for a particular product row ID
     */
    public function product_options(string $rowId = ''): array
    {
        return $this->_cart_contents[$rowId]['options'] ?? [];
    }

    /**
     * Format Number
     *
     * Returns the supplied number with commas and a decimal point.
     *
     * @param float|string $n
     */
    public function format_number($n = ''): string
    {
        return ($n === '') ? '' : number_format((float) $n, 2, '.', ',');
    }

    /**
     * Destroy the cart
     *
     * Empties the cart and kills the session
     *
     * @return void
     */
    public function destroy()
    {
        $this->_cart_contents = ['cart_total' => 0, 'total_items' => 0];
        session()->remove('cart_contents');
    }
}
