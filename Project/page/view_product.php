<?php
// include "./navbar.php";
// include("./function.php");
// error_reporting(0);
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
        <style>
        
        #hello {
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
    </style>

    <title>Hello, world!</title>
</head>

<body>
<?php
    $id = $_GET["id"];
    if ($id < 1) {
        moveto("./product_information.php?page=1");
    }
    $query = "SELECT * FROM product where id = '$id' ";
    $sql = $conn->query($query);
    $row = $sql->fetch_array();

    $product = $row["product"];
    $category = $row['category'];
    $price = $row['price'];
    $description = $row['description'];

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
                            <p class="text-muted mb-0"><?php echo $product; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $category; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $price; ?></p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $description; ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

<!-- ------------------------------------------------------------------------------------------ -->

</body>

</html>