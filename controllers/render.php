<?php
    require 'models/registro_usuario.php';
    require 'models/login_usuario.php';

    class Index{
        function __construct($host_name="", $site_name="", $variables=null){
            $data['title'] = 'Farmacia Over | LogIn';
            $data['host'] = $host_name;
            $data['sitio'] = $site_name;
            $this->view = new View();
            $this->view->render('views/modules/index.php', $data);
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
                    $usuario = new RegistroPDO($nombre, $correo, $username, $contraseña);
                    $usuario_registrado = $usuario->registrar_usuario();
                    if($$usuario_registrado){
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
              // Redirecciona a la página de administrar/usuarios
              header("location: " . $host_name . "/index");
            
        }
    }
    class processLogin{
        function __construct($host_name="", $site_name="", $variables=null){
            if($_POST){
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];
                $username = $_POST['username'];
                $contraseña = $_POST['password'];
                $contraseña = hash('sha512', $contraseña); 

                // Crea una instancia de UsuarioPDO con los datos del formulario
                $usuario = new IniciarPDO($correo, $contraseña);
                $usuario_registrado = $usuario->iniciar_sesion();
                if($$usuario_registrado){
                    $data['status'] = "OK";
                    $data['msg'] = "Usuario creado con éxito";
                    }else{
                    $data['status'] = "ERROR";
                    $data['msg'] = "Ocurrió un error al crear el usuario";
                    }        
            }else{
                write_log("ProcessRegister\nNO se recibieron datos por POST");
            }
              // Redirecciona a la página de index
              header("location: " . $host_name . "/inicio");
        }
    }
    class Inicio{
        function __construct($host_name="", $site_name="", $variables=null){
            $data['title'] = 'Farmacia Over | Inicio';
            $data['host'] = $host_name;
            $data['sitio'] = $site_name;
            $this->view = new View();
            $this->view->render('views/modules/inicio.php', $data);
        }
    }
?>