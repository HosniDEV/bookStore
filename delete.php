<?php
include  'connexion.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql= $sql="DELETE FROM `books` WHERE ID=$id";
    $result=mysqli_query($con,$sql);
    if($result){
       // echo "data Deleted successfully";
       header ('location:main.php');
    }else{
        die(mysqli_error($con));
    }
}

    ?>