<?php
    // session_start();
    // if(isset($_SESSION['usuario'])){
    //     header("location: views/inicio.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'components/header.php' ?>
</head>
<body class="banner-login">
    <main class="login">
        <div class="contenedor">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia Sesión</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aun no tienes una cuenta?</h3>
                    <p>Registrate para Iniciar Sesión</p>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>
            <!--Formularios-->
            <div class="contenedor__login-register">
                <!--Formulario Log-In-->
                <form action="<?= $data['host']?>/index/iniciarSesión" method="POST" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="email" placeholder="correo electronico" name="correo">
                    <input type="password" placeholder="*********" name="password">
                    <button>Entrar</button>
                </form>

                <!--Formulario Register-->
                <form action="<?= $data['host']?>/index/registro" method="POST" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre Completo" name="nombre">
                    <input type="email" placeholder="Correo Electornico" name="correo">
                    <input type="text" placeholder="Usuario" name="username">
                    <input type="password" placeholder="**********" name="password">
                    <button>Registrarse</button>
                </form>
            </div>
        </div>
    </main>
    <script src="../assets/js/script.js"></script>
</body>
</html>