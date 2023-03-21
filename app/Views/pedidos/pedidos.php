<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h3 class="mt-4"><?php echo $titulo; ?></h3>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Rut</th>
                            <th>Email</th>
                            <th>Region</th>
                            <th>Teléfono</th>
                            <th>Pedido</th>
                            <th>Ver Detalle</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Rut</th>
                            <th>Email</th>
                            <th>Region</th>
                            <th>Teléfono</th>
                            <th>Pedido</th>
                            <th>Ver Detalle</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($datos as $dato) { ?>
                            <tr>
                                <td><?php echo $dato['nombre']; ?></td>
                                <td><?php echo $dato['apellidos']; ?></td>
                                <td><?php echo $dato['rut']; ?></td>
                                <td><?php echo $dato['email']; ?></td>
                                <td><?php echo $dato['region']; ?></td>
                                <td><?php echo $dato['telefono']; ?></td>
                                <td><?php echo $dato['pedido']; ?></td>
                                <td>
                                    <a href="<?php echo base_url() . '/pedidos/detalle/' . $dato['pedido']; ?>" class="btn btn-sm"><i class="fas fa-edit"></i></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->