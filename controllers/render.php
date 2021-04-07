<?php
    require 'models/usuario.php';

    class Login{
        function __construct($host_name="", $site_name="", $variables=null){
            $data['title'] = 'Farmacia OVER | LogIn';
            $data['host'] = $host_name;
            $data['sitio'] = $site_name;
            $this->view = new View();
            $this->view->render('views/modules/login.php', $data);
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
                    // $contraseña = hash('sha512', $contraseña); 

                    // Crea una instancia de UsuarioPDO con los datos del formulario
                    $usuario = new UsuarioPDO($nombre, $correo, $username, $contraseña);
                    $usuario_registrado = $usuario->registrar_usuario();
                    if($usuario_registrado){
                        $data['status'] = "OK";
                        $data['msg'] = "Usuario creado con éxito";
                      }else{
                        $data['status'] = "ERROR";
                        $data['msg'] = "Ocurrió un error al crear el usuario";
                      }
                }       
            }else{
                write_log("ProcessRegister\nNO se recibieron datos por POST");
            }
              // Redirecciona a la página de login
              header("location: " . $host_name . "/login");
            
        }
    }
    class processLogin{
        function __construct($host_name="", $site_name="", $variables=null){
            if($_POST){
                $email = $_POST['correo'];
                $contra = $_POST['password'];
                $contra = hash('sha512', $contra); 

                // Crea una instancia de UsuarioPDO con los datos del formulario
                $usuario = new UsuarioMySQL($email, $contra);
                $usuario_logeado = $usuario->iniciar_sesion($email, $contra);
                if($usuario_logeado){
                    $data['status'] = "OK";
                    $data['msg'] = "Usuario logeado con éxito";
                    header("location: " . $host_name . "/dashboard");
                }else{
                    $data['status'] = "ERROR";
                    $data['msg'] = "Ocurrió un error al logear el usuario";
                    header("location: " . $host_name . "/login");
                }        
            // }else{
            //     write_log("ProcessLogin\nNO se recibieron datos por POST");
            //     header("location: " . $host_name . "/login");
            // }
            //   // Redirecciona a la página de index
            //   header("location: " . $host_name . "/dashboard");
            }
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
?>