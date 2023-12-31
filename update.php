
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Book_Store</title>
</head>
<!-- pour affichier les le contenu du database dans la table -->
<?php
include 'connexion.php';
if (isset($_GET['updateid'])){
$id=$_GET['updateid'];
$sql="SELECT  * from  books where ID='$id'";
$result=mysqli_query($con,$sql);
$rows=mysqli_fetch_assoc($result);
$name=$rows['name'];
$publisher=$rows['publisher'];
$price=$rows['price'];
}
?>
<!-- la fonction update -->
<?php
include  'connexion.php';
if(isset($_POST['click'])){
    $id=$_GET['updateid'];
    $name=$_POST['name'];
    $publisher=$_POST['publisher'];
    $price=$_POST['price'];
    $sql="UPDATE `books` SET `ID`='$id', `name`='$name',`publisher`='$publisher',`price`='$price' WHERE ID=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "data Apdated succesfully ";
        header ('location:main.php');
    }else{
        die(mysqli_error($con));
    }
    
}

    ?>

  
<body>
    <div class="container">
        <h2>Books Store</h2>
        <form action="" method="post">
            
            <input placeholder="Book Name" type="text" name="name" value="<?php if(isset($_GET['updateid'])){
                echo "$name";
            }?>" >
            <input placeholder="Publisher"type="text" name="publisher"value="<?php if(isset($_GET['updateid'])){
                echo "$publisher";
            }?>" > 
            
            <input placeholder="Book price" type="number" name="price" value="<?php if(isset($_GET['updateid'])){
                echo "$price";
            }?>" >
           <h2 class="btns"> 
            <button class="add" name="click">update</button>
            </h2>
        </form>
        </div>
</body>
</html>