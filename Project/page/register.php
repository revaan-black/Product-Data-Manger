<?php 
include "../links/include.php";

$credit = "0";
$debit = "0";
if (isset($_POST['submit'])) {
    if (empty($_POST['email'])) {
        $email = "---";
    } else {
        $email = $_POST['email'];
    }
    if (empty($_POST['post'])) {
        $post = "---";
    } else {
        $post = $_POST['post'];
    }
    $name = $_POST['name'];
    $phone = $_POST['number'];
    $formatted_number = substr_replace($phone, '-', 4, 0);
    // INSERT DATA
    $sql = "INSERT INTO register (customer, email, phone, addres, credit, debit) VALUES ('$name', '$email', '$formatted_number', '$post', '$credit', '$debit')";
    
    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        alert("Data Was Inserted Successfully!", "success");
    } else {
        alert("Something Went Wrong!", "danger");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <h1 class="text-center">Register a Customer</h1>
    <div class="container">
        <?php
        if (!empty($_SESSION["success"])) {
            echo abc();
        }
        ?>
    </div>
    <form action="./register.php" method="POST">
        <div class="container">
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>

                <input type="tel" class="form-control" id="phone" name="number" placeholder="Enter phone" pattern="[0][3][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" required>
                <small>Format: 03123456789</small>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="post" class="form-control" id="address" rows="3"></textarea>
            </div>
            <button name="submit" type="submit" class="btn btn-primary btn-default">Submit</button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>