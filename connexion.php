<?php
$con=new mysqli('localhost','root','','Books');
if(!$con){
    die(mysqli_error($con));
}
?>