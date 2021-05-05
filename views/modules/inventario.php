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
      const seccion = document.querySelector('.inventario');
      seccion.classList.add('fas');
      seccion.classList.add('fa-caret-right');
      };
    </script>
</head>
<body onload="activa()">
    <header >
      
        
        <!-- <section id="inicio" class="text-center">
            <div class="jumbotron pb-5">
                <h1 class="display-4">Distribuidora de Medicamento</h1>
                <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo quo sit necessitatibus sapiente tempora deserunt labore, quos magnam, rerum, a nemo. Alias ad dignissimos sequi perferendis itaque eligendi hic nam!</p>
                <button class="btn btn-primary btn-lg">Contactanos</button>
            </div>
        </section>   -->
    </header>
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

            <div class="table-responsive">
                <table class="table table-bordered table-dark table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Unidades</th>
                            <th class="text-center">Código</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Precio</th>
                            <!-- <th class="text-center">Descripción</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($data['inventario'] as $inventario){
                            $html_row =         ""."\n\t\t\t\t\t\t\t<tr>\n".
                                                "\t\t\t\t\t\t\t\t<th class='text-center'>". $inventario['unidades'] ."</th>\n".
                                                "\t\t\t\t\t\t\t\t<td class='text-center'>". $inventario['codigo'] ."</td>\n".
                                                "\t\t\t\t\t\t\t\t<td class='text-center'>". $inventario['nombre'] ."</td>\n".
                                                "\t\t\t\t\t\t\t\t<td class='text-center'>". $inventario['precio'] ."</td>\n".
                                                // "\t\t\t\t\t\t\t\t<td class='text-center'>". $inventario['descripcion'] ."</td>\n".
                                                "\t\t\t\t\t\t\t\t<td>\n".
                                                  "\t\t\t\t\t\t\t\t\t<div class='btn-group' role='group' aria-label='Button group with nested dropdown' style='width:100%;'>\n".
                                                    "\t\t\t\t\t\t\t\t\t\t<button id='btnGroupDrop1' type='button' class='btn btn-info btn_options btn-lg text-center' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>\n".
                                                      "\t\t\t\t\t\t\t\t\t\t\t<i class='fa fa-cog fa-lg icon_btn_options'></i>\n".
                                                    "\t\t\t\t\t\t\t\t\t\t</button>\n".
                                                    "\t\t\t\t\t\t\t\t\t\t<div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>\n".
                                                      "\t\t\t\t\t\t\t\t\t\t\t<a class='dropdown-item h4' href='#' data-toggle='modal' data-target='#modal_editar_producto' onclick='carga_datos_producto(". $inventario['id'] .")'> <i class='fa fa-edit'></i> Editar Producto</a>\n".
                                                      "\t\t\t\t\t\t\t\t\t\t\t<a class='dropdown-item h4' href='#' data-toggle='modal' data-target='#modal_eliminar_producto' onclick='carga_datos_producto(". $inventario['id'] .")'> <i class='fa fa-trash'></i> Eliminar producto</a>\n".
                                                    "\t\t\t\t\t\t\t\t\t\t</div>\n".
                                                  "\t\t\t\t\t\t\t\t\t</div>\n".
                                                "\t\t\t\t\t\t\t\t</td>\n".
                                              "\t\t\t\t\t\t\t\t</tr>\n";
                                  echo $html_row;  
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
      <?php include './views/modules/components/footer.php'; ?>
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
          <form class="form-inline" method="POST" action="<?= $data['host'] ?>/inventario/procesar">
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
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"> <i class="fa fa-edit"></i> Editar Producto</h4>
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
          </div>
          <form method="POST" action="<?= $data['host'] ?>/inventario/procesar">
            <input type="text" name="id_producto">
            <div class="modal-body">
                <div class="col-md-12 row">
                  <div style="display:none;">
                    <input type="hidden" name="token" value="<?= $data['token'] ?>">
                  </div>
                  <div class="col-md-12">
                    <label for="unidad_producto_editar">Unidades: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control" name="unidad_producto_editar" placeholder="Escriba la cantidad de unidades del producto" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="codigo_producto_editar">Código: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control" name="codigo_producto_editar" placeholder="Escriba el código del producto" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="nombre_producto_editar">Nombre: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control" name="nombre_producto_editar" placeholder="Escriba el nombre del producto" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="precio_editar">Precio: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control" name="precio_editar" placeholder="Escriba el precio del producto" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="descripcion_editar">Descripción: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control" name="descripcion_editar" placeholder="Descripcion del Producto" autocomplete="off" required>
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
      <div class="modal-dialog modal-lg">
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
                    <label for="codigo_producto_editar">Código: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control" name="codigo_producto_editar" placeholder="Escriba el código del producto" autocomplete="off" disabled>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="nombre_producto_editar">Nombre: </label>
                    <div class="col-md-12">
                      <input type="text" class="custom-control" name="nombre_producto_editar" placeholder="Escriba el nombre del producto" autocomplete="off" required>
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