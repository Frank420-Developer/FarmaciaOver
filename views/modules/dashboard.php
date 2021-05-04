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
    <script>
        function activa(){
        const seccion = document.querySelector('.dashboard');
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
            <section class="m-2" id="page-content-wrapper">
                <div class="row mx-1 my-4 nav-tabs pb-3">
                    <div class="col col-lg-4 col-sm-12 mb-3">
                        <div class="card bg-primary px-3 py-4 text-center">    
                            <i class="fas fa-shopping-bag fa-2x pb-3"></i>
                            <h3>Ventas del Día: </h3>
                            
                        </div>
                    </div>
                    <div class="col col-lg-4 col-sm-12 mb-3">
                        <div class="card bg-warning px-3 py-4 text-center">    
                            <i class="fas fa-shopping-bag fa-2x pb-3"></i>
                            <h3>Ventas de la Semana: </h3>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-sm-12 mb-3">
                        <div class="card bg-danger px-3 py-4 text-center">    
                            <i class="fas fa-shopping-bag fa-2x pb-3"></i>
                            <h3>Ventas del Año: </h3>
                        </div>
                    </div>
                </div><!--.row -->
                <div class="container mt-4">
                    <div class="titulo">
                        <h2 class="text-center">Ultimas Ventas</h2>
                    </div>
                </div>
            </section><!--#page-content-wrapper-->
            <?php include './views/modules/components/footer.php'; ?>
        </div>
    </div><!--.d-flex -->

    <?php include './views/modules/components/javascript.php'; ?>
    
</body>
</html>