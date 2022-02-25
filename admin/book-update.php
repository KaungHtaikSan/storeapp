<?php
include("confs/config.php");
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
$row = mysqli_fetch_assoc($result);
?>
<h1>Edit Book</h1>
<form action="book-update.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
<label for="title">Book Title</label>
<input type="text" name="title" id="title"
value="<?php echo $row['title'] ?>">
<label for="author">Author</label>
<input type="text" name="author" id="author"
value="<?php echo $row['author'] ?>">
<label for="sum">Summary</label>
<textarea name="summary" id="sum"><?php echo $row['summary'] ?></textarea>
<label for="price">Price</label>
<input type="text" name="price" id="price"
value="<?php echo $row['price'] ?>">
<label for="categories">Category</label>
<select name="category_id" id="categories">
<option value="0">-- Choose --</option>
<?php
$categories = mysqli_query($conn, "SELECT id, name FROM categories");
while($cat = mysqli_fetch_assoc($categories)):
?>
<option value="<?php echo $cat['id'] ?>"
<?php if($cat['id'] == $row['category_id']) echo "selected" ?> >
<?php echo $cat['name'] ?>
</option>
<?php endwhile; ?>
</select>
<br><br>
<img src="covers/<?php echo $row['cover'] ?>" alt="" height="150">
<label for="cover">Change Cover</label>
<input type="file" name="cover" id="cover">
<br><br>
<input type="submit" value="Update Book">
<a href="book-list.php">Back</a>
</form>

<?php
include("confs/config.php");
$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$summary = $_POST['summary'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];
$cover = $_FILES['cover']['name'];
$tmp = $_FILES['cover']['tmp_name'];
if($cover) {
move_uploaded_file($tmp, "covers/$cover");
$sql = "UPDATE books SET title='$title', author='$author',
summary='$summary', price='$price', category_id='$category_id',
cover='$cover', modified_date=now() WHERE id = $id";
} else {
$sql = "UPDATE books SET title='$title', author='$author',
summary='$summary', price='$price', category_id='$category_id',
modified_date=now() WHERE id = $id";
}
mysqli_query($conn, $sql);
header("location: book-list.php");
?>