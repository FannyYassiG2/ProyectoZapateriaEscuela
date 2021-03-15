<?php


function validarUsuario(){
    include('config/conection.php');
    session_start();

    
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM alumnos WHERE nombre ='$usuario' AND contraseña='$password'";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result)){
           $rolUsuario = $row['tipoUsuario'];
        }
    
        if(mysqli_num_rows($result)>0){
            if($rolUsuario == 0){
                $_SESSION["usuario"]= true;
                $_SESSION["nombre"]= $usuario;
                echo json_encode(array('data'=> 2));;
            }else{
                $_SESSION["autenticado"]= true;
                $_SESSION["nombre"]= $usuario;
                echo json_encode(array('data'=> 1));
            }
            
        }else{
          echo json_encode(array('data'=> 0));
        }
}

function validarVenta(){
    include('config/conection.php');
    

    
        $clave = $_POST['clave'];
        $unidades = $_POST['unidades'];
        
        $query = "SELECT * FROM productos WHERE Id = '$clave'";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result)){
           $Precio = $row['Precio'];
           
        }
        echo json_encode($Precio);
    
       
}

if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['password']) && !empty($_POST['password'])){
    validarUsuario();
}

if(isset($_POST['clave']) && !empty($_POST['clave']) && isset($_POST['unidades']) && !empty($_POST['unidades'])){
    validarVenta();
}



?>