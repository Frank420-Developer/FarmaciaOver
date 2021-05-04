<div id="sidebar-wrapper" class="bg-primary py-2 px-3">
    <div>
        <h1 class="text-center py-3"><a class="text-dark" href="<?= $data['host']?>/dashboard">Farmacia <strong>OVER</strong></a></h1>
    </div>
    <div class="menu d-flex flex-column">

        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-6">
                <a class="nav-link py-4 d-flex" href="<?= $data['host']?>/dashboard"><i class="fas fa-laptop-medical m-2"></i> Dashboard</a>
            </div>
            <div class="col-6">
                <i class="dashboard"></i> 
            </div>
        </div>

        <div class="nav-tabs"></div>

        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-6">
                <a class="nav-link py-4 d-flex" href="<?= $data['host']?>/inventario"><i class="fas fa-cannabis m-2"></i> Inventario</a>
            </div>
            <div class="col-6">
                <i class="inventario"></i> 
            </div>
        </div>
        

        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-6">
                <a class="nav-link py-4 d-flex" href="<?= $data['host']?>/ventas"><i class="fas fa-notes-medical m-2"></i> Ventas</a>
            </div>
            <div class="col-6">
                <i class="venta"></i> 
            </div>
        </div>

        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-6">
                <a class="nav-link py-4 d-flex" href="<?= $data['host']?>/clientes"><i class="fas fa-users m-2"></i> Clientes</a>
            </div>
            <div class="col-6">
                <i class="clientes"></i> 
            </div>
        </div>
        
        <div class="nav-tabs"></div>

    </div>
</div>
