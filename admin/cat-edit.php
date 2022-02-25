<!doctype html>
<html>
<head>
<h1> Book Store</h1>
<style>
    body{
    background:#efefef;
    font-family:arial;
    color:#333;
}
form{
    width: 500px;
    padding: 20px;
    margin: 10px auto;
    border: 4px solid #ddd;
    background: #fff;
}
form label {
    display: block;
    margin-top: 8px;
}
h1,h2{
    font-family:verdana;
    font-size:20px;
    
}
</style>
</head>
<body>
<?php
include("confs/config.php");

$id=$_GET['id'];
$result=mysqli_query($conn,"SELECT * FROM categories WHERE id=$id");
$row=mysqli_fetch_assoc($result);

?>

<form action="cat-update.php" method="post">
    <h1>Edit Category</h2>
<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
<label for="name">Category Name</label>
<input type="text" name="name" id="name"
value="<?php echo $row['name'] ?>">
<label for="remark">Remark</label>
<textarea name="remark"
id="remark"><?php echo $row['remark'] ?></textarea>
<br><br>
<input type="submit" value="Update Category">
</form>
</body>
</html>