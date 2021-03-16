<?php

include('config/conection.php');

$sql3 ="SELECT productos.Precio FROM factura INNER JOIN productos on factura.Id_producto = productos.Id WHERE Id_factura = '$id";
             $res5 = mysqli_query($conn,$sql3);
             while($row3=mysqli_fetch_array($res5)){
                 $precio = $row3;
              }
echo $precio;