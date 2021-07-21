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
      const seccion = document.querySelector('.inventario');
      seccion.classList.add('fas');
      seccion.classList.add('fa-caret-right');
      };
    </script>
</head>
<body onload="activa()">
    
  <main>
    <div class="d-flex" id="wrapper">
      <?php include './views/modules/components/menuLateral.php'; ?>
      <div class="w-100">
        <?php include './views/modules/components/navegacion.php'; ?>  
        <section class="p-3 ml-2">
            <div class="col-md-12 col-sm-12 text-right">
                <button type="button" class="btn btn-success waves-effect text-uppercase btn-lg m-2"  data-toggle="modal" data-target="#modal_nuevo_producto">
                    <i class="fa fa-plus"></i> Nuevo Producto
                </button>
            </div>
            
            <!--  ..:: MENSAJES/NOTIFICACIONES ::..-->
            <?php include './views/modules/components/notifications.php' ?>

            
                        <?php
                        if($data['inventario'] == null){
                          print(" <div class='img_vacia'>
                                    <img class='m-auto w-100' src='".$data['host']."/views/assets/img/inventario_vacio.svg'>
                                    <h3 class='text-center pt-4' style='font-size:3rem; margin-top:-50%; font-weight:bold;'>Inventario Vacio</h3>
                                  </div>");
                        }else{
                        
                        foreach($data['inventario'] as $inventario){
                            $icon=""; $icon_option=""; $label_action="";
                            if($inventario['Activo'] == 1){
                              $icon = "<i class='fas fa-toggle-on color_green icon_status'></i>";
                              $icon_option = "<i class='fas fa-toggle-off color_red'></i>";
                              $label_action = " Desactivar";
                            }else{
                              $icon = "<i class='fas fa-toggle-off color_red icon_status'></i>";
                              $icon_option = "<i class='fas fa-toggle-on color_green'></i>";
                              $label_action = " Activar";
                            }
                            print("<div class='table-responsive pt-4'>
                            <table class='table table-bordered table-dark table-hover'>
                              <thead>
                                <tr>
                                    <th class='text-center'>".$label_action."</th>
                                    <th class='text-center'>Unidades</th>
                                    <th class='text-center'>Código</th>
                                    <th class='text-center'>Nombre</th>
                                    <th class='text-center'>Precio</th>
                                </tr>
                              </thead>
                              <tbody class='t-body'>");
                          print(" <tr>
                                    <td class='text-center'><a href='". $data['host']."/inventario/switch_active/".$inventario['id']."/".$inventario['Activo']."'>". $icon ."</a></td>
                                    <td class='text-center'>". $inventario['unidades'] ."</td>
                                    <td class='text-center'>". $inventario['codigo'] ."</td>
                                    <td class='text-center'>". $inventario['nombre'] ."</td>
                                    <td class='text-center'>". $inventario['precio'] ."</td>
                                    <td class='text-center'>
                                      <div class='btn-group' role='group' aria-label='Button group with nested dropdown' style='width:100%;'>
                                          <button id='btnGroupDrop1' type='button' class='btn btn-info btn_options btn-lg text-center' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                            <i class='fa fa-cog fa-lg icon_btn_options'></i>
                                          </button>
                                          <div class='dropdown-menu p-3' aria-labelledby='btnGroupDrop1'>

                                            <a class='dropdown-item h3' href='#' data-toggle='modal' data-target='#modal_editar_producto' onclick='carga_datos_producto(". $inventario['id'] .")'> <i class='fa fa-edit'></i> Editar Producto</a>

                                            <div class='dropdown-divider'></div>

                                            <a class='dropdown-item h3' style='color:red;' href='#' data-toggle='modal' data-target='#modal_eliminar_producto' onclick='borra_datos_producto(". $inventario['id'] .")'> <i class='fa fa-trash'></i> Eliminar producto</a>

                                          </div>
                                      </div>
                                    </td>
                                  </tr>"); 
                          } 
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
      <!-- <?php include './views/modules/components/footer.php'; ?> -->
      </div>
    </div>
  </main>
  
    


     <!-- ..:: Modal Nuevo Producto ::.. -->
    <div class="modal fade" id="modal_nuevo_producto">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"> <i class="fa fa-plus"></i> Alta de Producto</h4>
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
          </div>
          <form method="POST" action="<?= $data['host'] ?>/inventario/procesar">
            <div class="modal-body">
              <div class="col-md-12 row">
                <div style="display:none;">
                    <input type="hidden" name="token" value="<?= $data['token'] ?>">
                </div>
                <div class="col-md-12">
                    <label for="unidad">Unidades: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control w-100 mx-0 mb-3" name="unidad" placeholder="Escriba la cantidad de unidades del producto" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <label for="codigo_producto">Código: </label>
                  <div class="col-md-12">
                    <input type="text" class="custom-control mx-0 w-100 mb-3" name="codigo_producto" placeholder="Escriba el código del producto" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="nombre_producto">Nombre: </label>
                  <div class="col-md-12">
                    <input type="text" class="custom-control mx-0 w-100 mb-3" name="nombre_producto" placeholder="Escriba el nombre del producto" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="precio">Precio: </label>
                  <div class="col-md-12">
                    <input type="text" class="custom-control mx-0 w-100 mb-3" name="precio" placeholder="Escriba el precio del producto" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="descripcion">Descripción: </label>
                  <div class="col-md-12">
                    <input type="text" class="custom-control mx-0 w-100 mb-3" name="descripcion" placeholder="Escriba la descripción del producto" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer w-100">
              <button type="submit" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal_usuario_creado"> <i class="fa fa-check"></i> Registrar producto</button>
              <button type="button" class="btn btn-danger btn-lg ml-4" data-dismiss="modal"> <i class="fa fa-times"></i> Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- ..:: Modal Editar Producto ::.. -->
    <div class="modal fade" id="modal_editar_producto">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"> <i class="fa fa-edit"></i> Editar Producto</h4>
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
          </div>
          <form method="POST" action="<?= $data['host'] ?>/inventario/procesar">
            <input type="hidden" name="id_producto">
            <input type="hidden" name="activo">
            <div class="modal-body">
                <div class="col-md-12 row">
                  <div style="display:none;">
                    <input type="hidden" name="token" value="<?= $data['token'] ?>">
                  </div>
                  <div class="col-md-12">
                    <label for="unidad_producto_editar">Unidades: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control mx-0 w-100 mb-3" name="unidad_producto_editar" placeholder="Escriba la cantidad de unidades del producto" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="codigo_producto_editar">Código: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control mx-0 w-100 mb-3" name="codigo_producto_editar" placeholder="Escriba el código del producto" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="nombre_producto_editar">Nombre: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control mx-0 w-100 mb-3" name="nombre_producto_editar" placeholder="Escriba el nombre del producto" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="precio_editar">Precio: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control mx-0 w-100 mb-3" name="precio_editar" placeholder="Escriba el precio del producto" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="descripcion_editar">Descripción: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control mx-0 w-100 mb-3" name="descripcion_editar" placeholder="Descripcion del Producto" autocomplete="off" required>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-lg"> <i class="fa fa-check"></i> Guardar cambios </button>
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"> <i class="fa fa-times"></i> Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- ..:: Modal Eliminar Producto ::.. -->
    <div class="modal fade" id="modal_eliminar_producto">
      <div class="modal-dialog modal-lg modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"> <i class="fa fa-trash"></i> Eliminar Producto</h4>
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
          </div>
          <form method="POST" action="<?= $data['host']?>/inventario/eliminar">
            <input type="hidden" name="id_product">
            <div class="modal-body">
                <div class="col-md-12 row">
                  <div style="display:none;">
                    <input type="hidden" name="token" value="<?= $data['token'] ?>">
                  </div>
                  <div class="col-md-12">
                    <label for="codigo_producto_eliminar">Código: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control" name="codigo_producto_eliminar" placeholder="Escriba el código del producto" autocomplete="off" disabled>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="nombre_producto_eliminar">Nombre: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control" name="nombre_producto_eliminar" placeholder="Escriba el nombre del producto" autocomplete="off" disabled>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-lg"> <i class="fa fa-check"></i> Confirmar </button>
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"> <i class="fa fa-times"></i> Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php include './views/modules/components/javascript.php'; ?>
    <script src="<?= $data['host'] ?>/views/assets/js/inventario.js"></script>
</body>
</html>