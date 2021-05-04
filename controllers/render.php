<?php
    require 'models/usuario.php';
    require 'models/stock.php';
    require 'models/cliente.php';

    class Login{
        function __construct($host_name="", $site_name="", $variables=null){
            $data['title'] = 'Farmacia OVER | LogIn';
            $data['host'] = $host_name;
            $data['sitio'] = $site_name;
            $this->view = new View();
            $this->view->render('views/modules/login.php', $data);
        }
    }
    class Registro{
      function __construct($host_name="", $site_name="", $variables=null){
          $data['title'] = 'Farmacia OVER | SignUp';
          $data['host'] = $host_name;
          $data['sitio'] = $site_name;
          $this->view = new View();
          $this->view->render('views/modules/registro.php', $data);
      }
  }
    class processRegister{
        function __construct($host_name="", $site_name="", $variables=null){
            if($_POST){
                if(empty($_POST['id_user'])){
                    $nombre = $_POST['nombre'];
                    $correo = $_POST['correo'];
                    $username = $_POST['username'];
                    $contraseña = $_POST['password']; 
                    $contraseña = hash('sha512', $contraseña); 

                    // Crea una instancia de UsuarioPDO con los datos del formulario
                    $usuario = new UsuarioPDO($nombre, $correo, $username, $contraseña);
                    $usuario_registrado = $usuario->registrar_usuario();
                    $sesion = new UserSession();
                    if($usuario_registrado){
                      $sesion->set_notification("OK", "Se ha realizado el registro de manera correcta. Ahora puede iniciar sesión");
                    }else{
                      $sesion->set_notification("ERROR", "Ocurrió un error al realizar el registro.");
                    }
                }       
            }else{
                write_log("ProcessRegister\nNO se recibieron datos por POST");
            }
              // Redirecciona a la página de login
            header("location: " . $host_name . "/registro");
            
        }
    }
    class processLogin{
        function __construct($host_name="", $site_name="", $variables=null){
            if($_POST){
                $email = $_POST['correo'];
                $contra = $_POST['pass'];
                $contra = hash('sha512', $contra); 

                // Crea una instancia de UsuarioPDO con los datos del formulario
                $usuario = new UsuarioPDO($email, $contra);
                $usuario_logeado = $usuario->logear_usuario($email, $contra);
                $sesion = new UserSession();
                    if($usuario_logeado){
                      header("location: " . $host_name . "/dashboard");
                      print ("<script>
                                alert('Sesion Iniciada con Éxito');
                              </script>");
                    }else{
                      $sesion->set_notification("ERROR", "Ocurrió un error al intentar iniciar sesión. Intente de nuevo.");
                      header("location: " . $host_name . "/login");
                    }
            }else{
                write_log("ProcessLogin\nNO se recibieron datos por POST");
                header("location: " . $host_name . "/login");
            }
              // Redirecciona a la página de index
              // header("location: " . $host_name . "/dashboard");
            }
        }

    class Dashboard{
        function __construct($host_name="", $site_name="", $variables=null){
            $data['title'] = 'Farmacia Over | Inicio';
            $data['host'] = $host_name;
            $data['sitio'] = $site_name;
            $this->view = new View();
            $this->view->render('views/modules/dashboard.php', $data);
        }
    }
    
    class Inventario{
        function __construct($host_name="", $site_name="", $variables=null){
            $data['title'] = 'Farmacia Over | Inventario';
            $data['host'] = $host_name;
            $data['sitio'] = $site_name;

            $inventario = new InventarioPDO();
            $data['inventario'] = $inventario->get_productos();

            $sesion = new UserSession();
            $data['token'] = $sesion->set_token();

            $this->view = new View();
            $this->view->render('views/modules/inventario.php', $data);
        }
    }

    class processProducto{
        function __construct($host_name="", $site_name="", $variables=null){
            if($_POST){
              //Valida el token de la sesión
              $token = $_POST['token'];
               $sesion = new UserSession();
              if($sesion->validate_token($token)){
                  //SI NO SE RECIBE ID ES UN INSERT
                if (empty($_POST['id_producto'])){
                  $codigo = $_POST['codigo_producto'];  
                  $nombre = $_POST['nombre_producto'];
                  $precio = $_POST['precio'];
                  $descripcion = $_POST['descripcion'];
                  // Crea una instancia de InventarioPDO con los datos del formulario
                  $producto = new InventarioPDO("0", $codigo, $nombre, $precio, $descripcion);
                  $producto_creado = $producto->crear_producto();  // Crea el producto con los datos que mandamos
                  // Verifica si se creó el producto
                  $sesion = new UserSession();
                    if($producto_creado){
                      $sesion->set_notification("OK", "Se ha añadido un nuevo producto");
                    }else{
                      $sesion->set_notification("ERROR", "Ocurrió un error al añadir el producto.");
                    }
                }else{
                  //Si se recibe un id_producto significa que es un update
                  $id_producto = $_POST['id_producto'];
                  $codigo = $_POST['codigo_producto_editar'];
                  $nombre = $_POST['nombre_producto_editar'];
                  $precio = $_POST['precio_editar'];
                  $descripcion = $_POST['descripcion_editar'];
                  // Crea una instancia de InventarioPDO con los datos del formulario
                  $producto = new InventarioPDO($id_producto, $codigo, $nombre, $precio, $descripcion);
                  $producto_actualizado = $producto->actualizar_producto();  // Crea el productocon los datos que mandamos
                  // Verifica si se actualizó el producto
                  $sesion = new UserSession();
                      if($producto_actualizado){
                        $sesion->set_notification("OK", "Se ha actualizado el producto: " . $nombre);
                      }else{
                        $sesion->set_notification("ERROR", "Ocurrió un error al actualizar el producto. Intente de nuevo.");
                      }
                }
              }
            }else{
              write_log("ProcessProducto\nNO se recibieron datos por POST");
            }
              header("location: " . $host_name . "/inventario");
          }
    }
    class processEliminar{
      function __construct($host_name="", $site_name="", $variables=""){
        if($_POST){
          $token = $_POST['token'];
          $sesion = new UserSession();
            if($sesion->validate_token($token)){
              if(!isset($_POST['id_product'])){
                $id_producto = $_POST['id_product'];
                $producto = new InventarioPDO($id_producto);
                $producto_borrado = $producto->borrar_producto();
                // Verifica si se borró el producto
                $sesion = new UserSession();
                if($producto_borrado){
                  $sesion->set_notification("OK", "Se ha borrado el producto: " . $id_producto);
                }else{
                  $sesion->set_notification("ERROR", "Ocurrió un error al borrar el producto. Intente de nuevo.");
                }
              }
            }
        }else{
          write_log("processEliminar\nNO se recibieron datos por GET");
        }
        header("location: " . $host_name . "/inventario");
      }
    }
    class Ventas{
      function __construct($host_name="", $site_name="", $variables=NULL){
          $data['title'] = "Farmacia OVER | Venta de Producto";
          $data['host'] = $host_name;
          $data['sitio'] = $site_name;

          $inventario = new InventarioPDO();
          $data['inventario'] = $inventario->get_productos();

          $this->view = new View();
          $this->view->render('views/modules/ventas.php', $data);
      }
    }

    class Clientes{
      function __construct($host_name="", $site_name="", $variables=NULL){
        $data['title'] = "Farmacia OVER | Clientes";
        $data['host'] = $host_name;
        $data['sitio'] = $site_name;

        $cliente = new ClientePDO();
        $data['clientes'] = $cliente->obtener_clientes();

        $sesion = new UserSession();
        $data['token'] = $sesion->set_token();

        $this->view = new View();
        $this->view->render('views/modules/clientes.php', $data);
    }
    }

    class processCliente{
      function __construct($host_name="", $site_name="", $variables=null){
        if($_POST){
          if(empty($_POST['id_cliente'])){
            $nombre = $_POST['nombre'];

            $cliente = new ClientePDO('0', $nombre);
            $cliente_registrado = $cliente->registrar_cliente();

            $sesion = new UserSession();
              if($cliente_registrado){
                $sesion->set_notification("OK", "Se ha añadido un nuevo cliente");
              }else{
                $sesion->set_notification("ERROR", "Ocurrió un error al registrar el cliente");
              }
          }else{
            $id_cliente = $_POST['id_cliente'];
            $nombre = $_POST['nombre_editar'];

            $cliente = new ClientePDO($id_cliente, $nombre);
            $cliente_actualizado = $cliente->actualizar_cliente();
            $sesion = new UserSession();
              if($cliente_actualizado){
                $sesion->set_notification("OK", "Se ha actualizado el cliente: " . $nombre);
              }else{
                $sesion->set_notification("ERROR", "Ocurrió un error al actualizar el cliente. Intente de nuevo.");
              }
          }
        }else{
          write_log("processCliente \n NO se recibieron datos por POST");
        }
        header("location: " . $host_name . "/clientes");
      }
    }
?>