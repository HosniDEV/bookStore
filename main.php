
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Book_Store</title>
</head>
<?php
include  'connexion.php';
if(isset($_POST['add'])){
    $name=$_POST['name'];
    $publisher=$_POST['publisher'];
    $price=$_POST['price'];
    $sql="INSERT INTO `books` ( `name`, `publisher`, price) VALUES ( '$name', '$publisher', $price)";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "data inserted successfully";
    
    }else{
        die(mysqli_error($con));
    }
}

    ?>
<body>
    <div class="container">
        <h2>Books Store</h2>
        <form action="main.php" method="post">
            <input placeholder="Book Name" type="text" name="name" required>
            <input placeholder="Publisher"type="text" name="publisher" required>
            <input placeholder="Book price" type="number" name="price" required>
           <h2 class="btns"> 
            <button class="add"  name="add">Add</button>
            </h2>
        </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book name</th>
                    <th>Publisher</th>
                    <th>Book price</th>
                    <th>operations</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql="SELECT * FROM `books`";
            $result=mysqli_query($con,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $id=$row['ID'];
                    $name=$row['name'];
                    $publisher=$row['publisher'];
                    $price=$row['price'];
                    echo '<tr>
                    <th>'.$id.'</th>
                    <th>'.$name.'</th>
                    <th>'.$publisher.'</th>
                    <th> <span>$</span>'.$price.' </th>
                    <th>
                    <button class="update"><a href="update.php? updateid='.$id.'">Update</a></button>
                    <button class="delete"><a href="delete.php? deleteid='.$id.'">Delete</a></button>
                    </th>
                       </tr>';
                }
            
            }
            ?>
            <script src="main.js"></script>
            </tbody>
        </table>
    
</body>
</html>