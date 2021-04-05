<?php
require_once './libs/conexion_bd.php';

Class IniciarPDO extends ConexionPDO{
    private $correo;
    private $contraseña;

    function __construct($email='',$pass=''){
        parent::__construct();
        $this->correo = $email;
        $this->contraseña = $pass;
    }
    public function iniciar_sesion(){
        $this->conectar();
        try {
            $sql = "SELECT * FROM login WHERE (Correo='$this->correo') AND (Contraseña='$this->contraseña')";
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

    // session_start();

    // include './libs/conexion_bd.php';

    // $correo = $_POST['correo'];
    // $contraseña = $_POST['password'];
    // $contraseña = hash('sha512', $contraseña);

    // $validar_login = mysqli_query($conexion, "SELECT * FROM login WHERE (Correo='$correo') AND (Contraseña='$contraseña')");

    // if(mysqli_num_rows($validar_login) > 0){
    //     $_SESSION['usuario'] = $correo;
    //     header("location: ../views/inicio.php");
    //     exit;
    // }else{
    //     echo '
    //         <script>
    //             alert("Usuario no existe, verifique la información");
    //             window.location = "../views/index.php"
    //         </script>
    //     ';
    //     exit;
    // }
    // // mysqli_close($conexion);

?>