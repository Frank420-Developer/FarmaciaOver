<?php

    session_start();

    include './libs/conexion_bd.php';

    $correo = $_POST['correo'];
    $contraseña = $_POST['password'];
    $contraseña = hash('sha512', $contraseña);

    $validar_login = mysqli_query($conexion, "SELECT * FROM login WHERE (Correo='$correo') AND (Contraseña='$contraseña')");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
        header("location: ../views/inicio.php");
        exit;
    }else{
        echo '
            <script>
                alert("Usuario no existe, verifique la información");
                window.location = "../views/index.php"
            </script>
        ';
        exit;
    }
    // mysqli_close($conexion);

?>