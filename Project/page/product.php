<?php
include "../links/include.php";

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
  if (empty($_POST['post'])) {
    $post = "---";
  } else {
        $post = $_POST['post'];
    }
      $name = $_POST['name'];
      $price = $_POST['price'];
      $category = $_POST['category'];
      
      // INSERT DATA
      $sql = "INSERT INTO product (product, category, price, description) VALUES ('$name', '$category', '$price', '$post')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        alert("Data Was Inserted Successfully!", "success");
    } else {
        alert("Something Went Wrong! Error: " . $conn->error, "danger");
    }

  }
  ?>
  <!doctype html>
  <html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Hello, world!</title>
  </head>
  
  <body>
    <h1 class="text-center">Added a new Product</h1>
    <div class="container">
      <form action="./product.php" method="POST" id="form_data">
  
        <div class="container">
          <form class="append_items">
            <div class="form-group">
              <label for="productName">Product Name</label>
              <input name="name" type="text" class="form-control" id="productName" placeholder="Enter product name" required>
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <input name="category" type="text" class="form-control" id="category" placeholder="Enter category" required>
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" id="phone" name="price" placeholder="Enter phone" pattern="^[+]?([0-9]+(?:[\.][0-9]*)?|\.[0-9]+)$" required>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="post" class="form-control" id="description" rows="3"></textarea>
            </div>
            <button name="submit" type="submit" class="btn btn-primary btn-default">Submit</button>
          </form>
  
        </div>
  
      </form>
      <!-- ------------------------------------------------------------------------------------------ -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
  
  </body>
  
  </html>