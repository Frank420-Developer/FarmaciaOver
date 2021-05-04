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
    <img class="wave" src="<?= $data['host']?>/views/assets/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="<?= $data['host']?>/views/assets/img/logo.svg">
		</div>
		<div class="login-content">
			<form action="<?= $data['host']?>/login/registro" method="POST">
				<img src="<?= $data['host']?>/views/assets/img/registro.svg">
				<h2 class="title">Farmacia OVER</h2>
                <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nombre</h5>
           		   		<input type="text" class="input" name="nombre" required>
           		   </div>
           		</div>
				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-at"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Correo</h5>
           		   		<input type="text" class="input" name="correo" required>
           		   </div>
           		</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user-circle"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input type="password" class="input" name="password" required>
            	   </div>
            	</div>
				<div class="d-flex justify-content-between mt-5">
					<div>
						<p class="h5">¿Ya tienes cuenta?</p>
						<a href="<?= $data['host']?>/login"><p class="h5 text-dark">Inicia sesion</p></a>
					</div>
				</div>
            	<input type="submit" class="btn" value="Registrar">
				<!--  ..:: MENSAJES/NOTIFICACIONES ::..-->
				<?php include './views/modules/components/notifications.php'?>
            </form>
        </div>
    </div>
	
    </main>

    <script src="<?= $data['host']?>/views/assets/js/login.js"></script>
</body>
</html>