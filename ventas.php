<?php
require_once ('includes/head.php');
?>

<body>
    <h1 class="text-center m-3">Declean Glamoure</h1>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark border border-danger img-fluid">
        
    </nav>

    <h2 class="text-center m-4"> Ventas </h2>
        <div class="bg-dark w-50 my-0 mx-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
                  <div class="" >
                            <li><a class="dropdown-item text-center text-light h5 p-2" href="includes/crearVenta.php">Crear Venta</a></li>
                            <li><a class="dropdown-item text-center text-light h5 p-2" href="includes/agotados.php">Finalizar Venta</a></li>
                            <li><a class="dropdown-item text-center text-light h5 p-2" href="includes/agregar.php">Cancelar Venta</a></li>
                            <li><a class="dropdown-item text-center text-light h5 p-2" href="includes/eliminar.php">Imprimir Venta</a></li>
                            
                  </div>
            </li>
          </ul>
        </div>

    <?php
    require_once ('includes/footer.php');
    ?>

    
    <script src="js/bootstrap.bundle.js"></script>
</body> 

</html>
