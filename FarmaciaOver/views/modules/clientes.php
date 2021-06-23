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
    <link rel="stylesheet" href="<?= $data['host']?>/views/assets/css/clientes.css">
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

            <main class="container" style="max-width: 100%;">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success btn-lg my-4" data-toggle="modal" data-target="#modal_nuevo_cliente">Registrar Nuevo Cliente</button>
                </div>
                
                <!-- ..::Mostrando NOTIFICACIONES -->
                <?php include './views/modules/components/notifications.php';?>
                <div class="row d-flex clientes">
                    <?php
                        if($data['clientes'] == null){
                            print(" <div class='img_vacia pt-5'>
                                        <img class='m-auto w-100' src='".$data['host']."/views/assets/img/clientes_vacio.svg'>
                                        <h2 class='text-center pt-4' style='font-size:3rem; margin-top:-50%; font-weight:bold;'>No hay clientes registrados</h2>
                                    </div>'");
                        }else{
                        foreach($data['clientes'] as $cliente){
                            $icon = "";
                            if($cliente['Activo'] == 1){
                                $icon = "<i class= 'fas fa-toggle-on color_green icon_status' style='position: absolute; top:1rem; right:1rem;'></i>";
                                
                            }else{
                                $icon = "<i class= 'fas fa-toggle-off color_red icon_status' style='position: absolute; top:1rem; right:1rem;'></i>";
                            }
                            print(" <div class='col-md-6 col-sm-12 m-0 mb-3 mt-1'>
                                        <div class='card bg-light' style='position: relative;'>
                                            <div class='card-header'>
                                                <div class='text-center'><i class='fas fa-user fa-2x'></i></div>
                                                <a href='".$data['host']."/clientes/switch_active/".$cliente['id']."/".$cliente['Activo'] ."'> " . $icon . " </a>
                                            </div>
                                            <div class='card-body'>
                                                <h2 class='text-center'>". $cliente['nombre'] . "</h2>

                                            </div>
                                            <div class='card-footer d-flex'>
                                                <button class='btn btn-success btn-lg m-auto' data-toggle='modal' data-target='#modal_editar_cliente' onclick='carga_datos_cliente(". $cliente['id'] .")'><i class='fas fa-edit'></i> Editar</button>


                                                <button class='btn btn-danger btn-lg m-auto' data-toggle='modal' data-target='#modal_eliminar_cliente' onclick='borra_datos_cliente(". $cliente['id'].")'><i class='fas fa-trash'></i> Eliminar</button>
                                            </div>
                                        </div>
                                    </div>");
                        }
                    }
                    ?>
                </div>
            </main>

            <!-- <?php include './views/modules/components/footer.php'; ?> -->

        </div>

    </div>    
    
    <!-- ..::MODAL NUEVO CLIENTE::.. -->
    <div class="modal fade" id="modal_nuevo_cliente">
        <div class="modal-dialog modal-sm">
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
                        <label for="nombre">Nombre</label>
                        <input class="custom-control w-100" type="text" placeholder="Nombre" name="nombre" required>
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
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-user-edit"></i>   Editar cliente</h4>
                    <button type="button" data-dismiss="modal" class="close"><i class="fas fa-times"></i></button>
                </div>
                <form method="POST" action="<?= $data['host']?>/clientes/procesar">
                <input type="hidden" name="id_cliente">
                <input type="hidden" name="activo">
                    <div class="modal-body">
                        <div style="display:none;">
                            <input type="hidden" name="token" value="<?= $data['token'] ?>">
                        </div>
                        <label for="nombre_editar">Nombre</label>
                        <input class="custom-control w-100" type="text" placeholder="Nombre" name="nombre_editar" id="nombre_editar" required>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-lg" type="submit"><i class="fas fa-check"></i> Guardar</button>
                        
                        <button class="btn btn-danger btn-lg" type="button" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ..::MODAL ELIMINAR CLIENTE::.. -->
    <div class="modal fade" id="modal_eliminar_cliente">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-trash"></i>   Eliminar cliente</h4>
                    <button type="button" data-dismiss="modal" class="close"><i class="fas fa-times"></i></button>
                </div>
                <h3 class="text-center mt-3" >¿Seguro que desea eliminar el siguiente cliente? </h3>
                <form method="POST" action="<?= $data['host']?>/clientes/eliminar">
                <input type="hidden" name="id_cliente">
                    <div class="modal-body">
                        <div style="display:none;">
                            <input type="hidden" name="token" value="<?= $data['token'] ?>">
                        </div>
                        <label for="nombre_cliente_eliminar">Nombre: </label>
                        <input class="custom-control w-100" type="text" placeholder="Nombre" name="nombre_cliente_eliminar" id="nombre_cliente_eliminar">
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button class="btn btn-success btn-lg" type="submit"><i class="fas fa-check"></i> Aceptar</button>
                        <button class="btn btn-danger btn-lg" type="button" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include './views/modules/components/javascript.php'; ?>
    <script src="<?= $data['host'] ?>/views/assets/js/cliente.js"></script>
</body>
</html>