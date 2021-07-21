<?php
    // session_start();
    // if(!isset($_SESSION['usuario'])){
    //     echo '
    //         <script>
    //             alert("Porfavor inicia sesión");
    //         </script>
    //     ';
    //     header("location: " . $data['host'] . "/login");
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
                <div class="row mx-1 my-4 nav-tabs pb-3"><!-- row-->
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
                <div class="container mt-4 mx-0">
                    <div class="titulo">
                        <h2 class="text-center">Productos Disponibles</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </section><!--#page-content-wrapper-->
            <!-- <?php include './views/modules/components/footer.php'; ?> -->
        </div>
    </div><!--.d-flex -->

    <?php include './views/modules/components/javascript.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.js" integrity="sha512-opXrgVcTHsEVdBUZqTPlW9S8+99hNbaHmXtAdXXc61OUU6gOII5ku/PzZFqexHXc3hnK8IrJKHo+T7O4GRIJcw==" crossorigin="anonymous"></script>
    
</body>

   
        <?php foreach($data['inventario'] as $inventario){
                            $datos = $inventario['unidades'];
                            echo '  <script>
                                        var ctx = document.getElementById("myChart").getContext("2d");
                                        var chart = new Chart(ctx, {
                                        type: "doughnut",
                                            data:{
                                                datasets: [{
                                                    data: [0,2,3,4,5],
                                                    backgroundColor: ["#42a5f5", "red", "green","blue","violet"],
                                                    label: "Comparacion de navegadores"}],
                                                    labels: ["Google Chrome","Safari","Edge","Firefox","Opera"]},
                                            options: {responsive: true}
                                    });
                                    </script>';
                        }?>
        
   

</html>