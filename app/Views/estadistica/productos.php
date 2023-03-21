<div class="container">
    <div class="row">
        <div class="col">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var labels = [];
    var values = [];
    <?php foreach ($productos as $producto) : ?>
        labels.push('<?php echo $producto['producto'] ?>');
        values.push('<?php echo $producto['cantidad'] ?>');
    <?php endforeach; ?>

    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: '# de ventas',
                data: values,
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>