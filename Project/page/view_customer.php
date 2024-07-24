<?php
// include "./navbar.php";
// include("./function.php");

// $conn = new mysqli("localhost","root", "", "water_project" );

include "../links/include.php";

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
<?php
    $id = $_GET["id"];
    if ($id < 1) {
        moveto("./customer_detali.php?page=1");
    }
    $query = "SELECT * FROM register where id = '$id' ";
    $sql = $conn->query($query);
    $row = $sql->fetch_array();

    $customer = $row["customer"];
    $email = $row['email'];
    $phone = $row['phone'];
    $post = $row['addres'];

    ?>
    <div class="container mb-5">
        <a href="customer_detali.php?page=1"><button name="submit1" type="submit" class="btn btn-lg btn-primary"><i class="bi bi-arrow-left"></i></button></a>
    </div>
    <div class="container" id="hello">

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body" style="background-color: #cfe2ff;">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $customer; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $email; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $phone; ?></p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $post; ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

<!-- ------------------------------------------------------------------------------------------ -->

</body>

</html>