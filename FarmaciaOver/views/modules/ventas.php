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
<html>
<head>
    <?php include './views/modules/components/header.php'; ?>
    <script>
        function activa(){
            const seccion = document.querySelector('.venta');
            seccion.classList.add('fas');
            seccion.classList.add('fa-caret-right');
        };
    </script>
</head>
<body onload="activa()">
    <div class="d-flex" id="wrapper">
        <?php include './views/modules/components/menuLateral.php'; ?>
        <div class="w-100">
            <?php include './views/modules/components/navegacion.php'; ?>

            <main>


            </main>

            <!-- <?php include './views/modules/components/footer.php'; ?> -->
        </div>
    </div>    
    


    <?php include './views/modules/components/javascript.php'; ?>
    <script src="<?= $data['host'] ?>/views/assets/js/inventario.js"></script>
</body>
</html>