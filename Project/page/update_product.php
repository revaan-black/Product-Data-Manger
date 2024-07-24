<?php
include "../links/include.php";
$id = $_GET["id"];
$query = "SELECT * FROM product where id='$id' ";
$sql = $conn->query($query);
$row = $sql->fetch_array();

$name = $row['product'];
$category = $row['category'];
$price = $row['price'];
$post = $row['description'];

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $post = $_POST['post'];

  $updateProductSql = "UPDATE product SET product = '$name', category = '$category', price = '$price', description = '$post' WHERE id = '$id'";

if ($conn->query($updateProductSql) === TRUE) {
    echo "<script>
            window.location.href = 'product_information.php?page=1';
          </script>";
} else {
    echo "<script>
            alert('Something went wrong!');
          </script>";
}
  
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <div class="container">

    <a href="./product_information.php?page=1"><button name="submit" type="submit" class="btn btn-lg btn-primary"><i
          class="bi bi-arrow-left"></i></button></a>
  </div>
  <h1 class="text-center">Update the Product</h1>
  <div class="container">

    <form action="./update_product.php?id=<?php echo $id; ?>" method="POST">

      <div class="container">
        <form>
          <div class="form-group">
            <label for="productName">Product Name</label>
            <input name="name" value="<?php echo $name; ?>" type="text" class="form-control" id="productName"
              placeholder="Enter product name" required>
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <input name="category" value="<?php echo $category; ?>" type="text" class="form-control" id="category"
              placeholder="Enter category" required>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input name="price" value="<?php echo $price ?>" type="number" class="form-control" id="price"
              placeholder="Enter price" required>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="post" class="form-control" id="description" rows="3"
              required><?php echo $post; ?></textarea>
          </div>
          <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>

    </form>
    <!-- ------------------------------------------------------------------------------------------ -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"></script>
</body>

</html>