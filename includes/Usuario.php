<?php

    function agregarUsuario(){
        include_once '../config/conection.php';
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $tipoUsuario = $_POST["tipoUsuario"];
        
        $sql="INSERT INTO alumnos (Nombre,Contraseña,tipoUsuario) VALUES ('$nombre','$password','$tipoUsuario')";
        $result=mysqli_query($conn,$sql);
        if($result){
            header("Location:usuarios.php"); 
          echo "guardado";
        }else{
            echo "Error";
        }
    }

    function eliminarUsuario(){
        include_once '../config/conection.php';
        $clave = $_POST['clave'];
        $sql= "SELECT Id FROM alumnos WHERE Id = '$clave'";
        $result = mysqli_query($conn,$sql);
        if($result){
            $query= "DELETE FROM alumnos WHERE Id = '$clave'";
            $res = mysqli_query($conn,$query);
            header("Location:usuarios.php");
        }
    }

    

    if(isset($_POST['eliminar'])){
        eliminarUsuario();
    }
   

    if(isset($_POST['guardar'])){
    
        agregarUsuario();
    }



?>