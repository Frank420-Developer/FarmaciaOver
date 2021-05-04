<?php
    // session_start();
    // if(isset($_SESSION['usuario'])){
    //     header("location: views/inicio.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './views/modules/components/header.php' ?>
    <link rel="stylesheet" href="<?= $data['host']?>/views/assets/css/login.css">
</head>
<body style="overflow: hidden;">
    <main >
	<img class="wave2" src="<?= $data['host']?>/views/assets/img/wave2.svg">
    <img class="wave" src="<?= $data['host']?>/views/assets/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="<?= $data['host']?>/views/assets/img/logo.svg">
		</div>
		<div class="login-content">
			<form action="<?= $data['host']?>/login/inicio_sesion" method="POST">
				<img src="<?= $data['host']?>/views/assets/img/log.svg">
				<h2 class="title">Farmacia OVER</h2>
				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Correo</h5>
           		   		<input type="text" class="input" name="correo" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="pass" required><i class="contra fas fa-eye-slash mt-4 d-flex justify-content-end"></i>
            	   </div>
            	</div>
				<div class="d-flex justify-content-between mt-5">
					<div>
						<p class="h5">¿Aún no tienes cuenta?</p>
						<a href="<?= $data['host']?>/registro"><p class="h5 text-dark">Crear nueva cuenta</p></a>
					</div>
            		<a href="#"><p class="h5 text-dark mt-4">Olvidé mi contraseña</p></a>
				</div>
            	<input type="submit" class="btn" value="Login">
				<!--  ..:: MENSAJES/NOTIFICACIONES ::..-->
				<?php include './views/modules/components/notifications.php'?>
            </form>
        </div>
    </div>
    </main>
    <script src="<?= $data['host']?>/views/assets/js/login.js"></script>
</body>
</html>