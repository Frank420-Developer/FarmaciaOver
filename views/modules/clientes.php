<?php
    // session_start();
    // if(!isset($_SESSION['usuario'])){
    //     echo '
    //         <script>
    //             alert("Porfavor inicia sesión");
    //         </script>
    //     ';
    //     header("location: ../index.php");
    //     session_destroy();
    //     die();
    // }
?>

<!DOCTYPE html>
<html>
<head>
    <?php include './views/modules/components/header.php'; ?>
    <script>
        function activa(){
            const seccion = document.querySelector('.clientes');
            seccion.classList.add('fas');
            seccion.classList.add('fa-caret-right');
        };
    </script>
</head>
<body onload="activa()">
    <div class="d-flex" id="wrapper">
        <?php include './views/modules/components/menuLateral.php'; ?>
        <div class="w-100">
            <?php include './views/modules/components/navegacion.php'; ?>

            <main class="container">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success btn-lg m-2" data-toggle="modal" data-target="#modal_nuevo_cliente">Registrar Nuevo Cliente</button>
                </div>
                

                <!-- ..::Mostrando NOTIFICACIONES -->
                <?php include './views/modules/components/notifications.php';?>
                <div class="row d-flex">
                    <?php
                        foreach($data['clientes'] as $cliente){
                            print(" <div class='col-md-6 col-sm-12 m-0'>
                                        <div class='card bg-light'>
                                            <div class='card-header'>
                                                <div class='text-center'><i class='fas fa-user'></i></div>
                                            </div>
                                            <div class='card-body'>
                                                <h2 class='text-center'>". $cliente['nombre'] . "</h2>

                                            </div>
                                            <div class='card-footer d-flex'>
                                                <button class='btn btn-success btn-lg m-auto' data-toggle='modal' data-target='#modal_editar_cliente' onclick='carga_datos_cliente(". $cliente['id'] .")'><i class='fas fa-edit'></i> Editar</button>
                                                <button class='btn btn-danger btn-lg m-auto'><i class='fas fa-trash'></i> Eliminar</button>
                                            </div>
                                        </div>
                                    </div>");
                    }
                    ?>
                </div>
            </main>

            <?php include './views/modules/components/footer.php'; ?>

        </div>

    </div>    
    
    <!-- ..::MODAL NUEVO CLIENTE::.. -->
    <div class="modal fade" id="modal_nuevo_cliente">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-user-plus"></i>  Registrar nuevo cliente</h4>
                    <button type="button" data-dismiss="modal" class="close"><i class="fas fa-times"></i></button>
                </div>
                <form method="POST" action="<?= $data['host']?>/clientes/procesar">
                    <div class="modal-body">
                        <div style="display:none;">
                            <input type="hidden" name="token" value="<?= $data['token'] ?>">
                        </div>
                        <label for="">Nombre</label>
                        <input class="custom-control w-100" type="text" placeholder="Nombre" name="nombre">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-lg" type="submit"><i class="fas fa-plus"></i> Registrar</button>
                        
                        <button class="btn btn-danger btn-lg" type="button" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ..::MODAL EDITAR CLIENTE::.. -->
    <div class="modal fade" id="modal_editar_cliente">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-user-edit"></i>   Editar cliente</h4>
                    <button type="button" data-dismiss="modal" class="close"><i class="fas fa-times"></i></button>
                </div>
                <form method="POST" action="<?= $data['host']?>/clientes/procesar">
                <input type="hidden" name="id_cliente">
                    <div class="modal-body">
                        <div style="display:none;">
                            <input type="hidden" name="token" value="<?= $data['token'] ?>">
                        </div>
                        <label for="">Nombre</label>
                        <input class="custom-control w-100" type="text" placeholder="Nombre" name="nombre_editar">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-lg" type="submit"><i class="fas fa-plus"></i> Guardar</button>
                        
                        <button class="btn btn-danger btn-lg" type="button" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include './views/modules/components/javascript.php'; ?>
    <script src="<?= $data['host'] ?>/views/assets/js/inventario.js"></script>
    <script src="<?= $data['host'] ?>/views/assets/js/cliente.js"></script>
</body>
</html>