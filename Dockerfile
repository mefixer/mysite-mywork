# Usar PHP 8.1 con Apache
FROM php:8.1-apache

# Instalar extensiones PHP necesarias para CodeIgniter 4
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    libonig-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-install \
    intl \
    mbstring \
    mysqli \
    pdo_mysql \
    zip \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar el DocumentRoot para apuntar al directorio public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar composer.json y composer.lock primero para aprovechar cache de Docker
COPY composer.json composer.lock ./

# Instalar dependencias de Composer
RUN composer install --no-scripts --no-autoloader --no-dev

# Copiar el resto de archivos de la aplicación
COPY . .

# Completar la instalación de Composer
RUN composer dump-autoload --optimize

# Establecer permisos correctos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/writable

# Exponer puerto 80
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]
