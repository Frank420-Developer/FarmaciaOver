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
<html lang="en">
<head>
    <?php include './views/modules/components/header.php'; ?>
</head>
<body>
    <header >
        <?php include './views/modules/components/navegacion.php'; ?>
        <div class="banner fondo">
            <div class="contenido-banner">
                
            </div>
        </div>
    </header>
    <main>
        <h2 class="centrar-texto">Services</h2>
        <div class="contenedor-servicios">
            <div class="servicio">
                <h3>Venta de Medicamento</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
            <div class="servicio">
                <h3>Emision de Factura</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
            </div>
            <div class="servicio">
                <h3>Compra de Medicamento</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
        </div>
    </main>
    <?php include './views/modules/components/footer.php'; ?>
</body>
</html>