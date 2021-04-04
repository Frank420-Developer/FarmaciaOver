<?php
    require_once './libs/conexion_bd.php';

    Class RegistroPDO extends ConexionPDO{
        private $nombre;
        private $correo;
        private $username;
        private $contraseña;

        function __construct($nom='', $email='', $user_name='',$pass=''){
            parent::__construct();
            $this->nombre = $nom;
            $this->correo = $email;
            $this->username = $user_name;
            $this->contraseña = $pass;
        }
        public function obtener_usuarios(){
            $this->conectar();
            $state = $this->conexion->prepare("SELECT id_user, Nombre, Correo, Username FROM login");
            $state->execute();
            $result = $state->fetchAll(PDO::FETCH_ASSOC);
            write_log(serialize($result));
            return $result;
        }
        public function registrar_usuario(){
            $this->conectar();
            try {
                $sql = "INSERT INTO login (Nombre, Correo, Username, Contraseña) 
                VALUES('$this->nombre','$this->correo','$this->username','$this->contraseña')";
                $this->$sql->exec();
                write_log('Se realizo el insert de manera correcta');
                $this->desconectar();
                return true;
            } catch (PDOException $e) {
                $this->desconectar();
                return false;
            }
        }
    }
    // $nombre = $_POST['nombre'];
    // $correo = $_POST['correo'];
    // $username = $_POST['username'];
    // $contraseña = $_POST['password'];
    // $contraseña = hash('sha512', $contraseña); 

    // $query = "INSERT INTO login(Nombre, Correo, Username, Contraseña) 
    //           VALUES('$nombre', '$correo', '$username', '$contraseña')";

    
    // //VERIFICAR QUE NO SE REPITA EL CORREO ELECTRNICO
    // $consulta_correo = "SELECT * FROM login WHERE Correo='$correo'";
    // $verificar_correo = mysqli_query($conexion, $consulta_correo);

    // if(mysqli_num_rows($verificar_correo) > 0){
    //     echo '
    //     <script>
    //         alert("Este correo ya existe.");
    //         window.location = "../index.php";
    //     </script>
    //     ';
    //     exit();
    // }
    //  //VERIFICAR QUE NO SE REPITA EL USUARIO
    //  $consulta_usuario = "SELECT * FROM login WHERE Nombre='$nombre'";
    //  $verificar_usuario = mysqli_query($conexion, $consulta_usuario);
 
    //  if(mysqli_num_rows($verificar_usuario) > 0){
    //      echo '
    //      <script>
    //          alert("Este usuario ya existe.");
    //          window.location = "../index.php";
    //      </script>
    //      ';
    //      exit();
    //  }
    
    // //REGISTRAR USUARIO EN BASE DE DATOS
    // $ejecutar = mysqli_query($conexion, $query);
    // if($ejecutar){
    //     echo '
    //         <script>
    //             alert("Usuario Registrado Exitosamente.");
    //             window.location = "../index.php";
    //         </script>
    //     ';
    // }else{
    //     echo '
    //         <script>
    //             alert("Ocurrio un Error. Intentalo de nuevo.");
    //             window.location = "../index.php";
    //         </script>
    //     ';
    // }

    // mysqli_close($conexion);
?>