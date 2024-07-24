<?php
// include "./navbar.php";
// include "./crud.php";
// include "./parts/error_mesage.php";
// include("./function.php");
// $conn = new mysqli("localhost", "root", "", "water_project");
// $_SESSION['success'] = "";

include "../links/include.php";

$id = $_GET["id"];
$query = "SELECT * FROM register where id='$id' ";
$sql = $conn->query($query);
$row = $sql->fetch_array();

$customer = $row['customer'];
$email = $row['email'];
$phone = $row['phone'];
$addres = $row['addres'];
$id = $row['id'];

// Strip out any non-numeric characters
$phone = preg_replace("/[^0-9]/", "", $phone);



if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $post = $_POST['post'];

  $updateCustomerSql = "UPDATE register SET customer = '$name', email = '$email', phone = '$number', addres = '$post', addres = '$post' WHERE id = '$id'";
  
  echo $id;
  if ($conn->query($updateCustomerSql) === TRUE) {
    echo "<script>
              window.location.href = 'customer_detali.php?page=1';
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

    <a href="customer_detali.php?page=1"><button name="submit1" type="submit" class="btn btn-lg btn-primary"><i
          class="bi bi-arrow-left"></i></button></a>
  </div>
  <h1 class="text-center">Update the Customer infomation</h1>
  <div class="container">

      <form action="./update_customer.php?id=<?php echo $id; ?>" method="POST">

<div class="container">
    <form>
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" value="<?php echo $customer ; ?>" type="text" class="form-control" id="name" placeholder="Enter name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" value="<?php echo $email ; ?>" type="email" class="form-control" id="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input name="number" value="<?php echo htmlspecialchars($phone); ?>" type="number" class="form-control" id="phone" placeholder="Enter phone"
              required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="post"  class="form-control" id="address" rows="3" required><?php echo $addres ; ?></textarea>
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