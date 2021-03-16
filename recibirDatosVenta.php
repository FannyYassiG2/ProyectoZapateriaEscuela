<?php


function generarVenta(){
    include('config/conection.php');
    
        $clave = $_POST['clave'];
        $unidades = $_POST['unidades'];
        $fecha_actual = date("Y-m-d");
        
        $query = "SELECT * FROM productos WHERE Id = '$clave'";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result)){
            $stock = $row['Stock'];
         }
         if($result){
                
            $query= "UPDATE productos SET Stock = '$stock' - '$unidades' WHERE Id = '$clave'";
            $sql= "INSERT INTO factura (fecha,Id_producto,unidades) VALUES ('$fecha_actual', '$clave', '$unidades')";
            
            $res2= mysqli_query($conn,$sql);
             $res = mysqli_query($conn,$query);
             $query2 = "SELECT * FROM factura";
             $res3 = mysqli_query($conn,$query2);
             while($row=mysqli_fetch_array($res3)){
                $factura = $row['Id_factura'];
             }
             
             echo json_encode($factura);
         } 
    

}



if(isset($_POST['clave'])){
    generarVenta();
}



?>