<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
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
    <form action="cat-add.php" method="post">
        <h2>New Category Page</h2>
        <label for="name">Category Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="remark">Remark</label>
        <textarea name="remark" id="remark"></textarea>

        <br><br>
        <input type="submit" value="Add Category">
    </form>
</body>
</html>