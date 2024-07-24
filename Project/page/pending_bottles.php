<?php
include "../links/include.php";
if (($_GET["page"]) < 1) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$sub_sql = " where bd > br ";
$c_name = "";
$toDate = $fromDate = "";
if (isset($_POST['name11'])) {
    $from = $_POST['from'];
    $fromDate = $from;
    $fromArr = explode("/", $from);
    // $from = $fromArr['2'] . '-' . $fromArr['1'] . '-' . $fromArr['0'];
    $from = $fromArr['1'] . '/' . $fromArr['0'] . "/" . $fromArr['2'];
    $to = $_POST['to'];
    $toDate = $to;
    $toArr = explode("/", $to);
    $to = $toArr['1'] . '/' . $toArr['0'] . '/' . $toArr['2'];
    if (!empty($_POST['c_name']) && empty($_POST['from']) && !isset($_POST['chekbox'])) {
        $name = $_POST['c_name'];
        $c_name = " selling_product.customer = '$name'";
        $sub_sql = " where $c_name && bd > br";
    } elseif (!empty($_POST['c_name']) && !empty($_POST['from']) && empty($_POST['chekbox'])) {
        $name = $_POST['c_name'];
        $chek = 0;
        $sub_sql = " where selling_product.customer = '$name' && date >= '$from' && date <= '$to' && bd > br";
    } elseif (isset($_POST['chekbox']) && !empty($_POST['c_name'])) {
        $name = $_POST['c_name'];
        $chek = 0;
        $sub_sql = " where selling_product.payment = '$chek' && selling_product.customer = '$name' || bd > br && selling_product.customer = '$name'";
    } elseif (isset($_POST['chekbox']) && empty($_POST['c_name']) && empty($_POST['from'])) {
        $chek = 0;
        $sub_sql = " WHERE payment = '$chek' && bd > br";
    } else {
        $name = $_POST['c_name'];
        $chek = 0;
        $sub_sql = " where selling_product.payment = '$chek' && date >= '$from' && date <= '$to'";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <style>
        .btn-default {
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            padding: 10px 20px;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
        }
    </style>
    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <form action="./pending_bottles.php?page=<?php echo $page; ?>" method="post">
            <form action="./product_information.php?page=1" method="post" class=" d-flex justify-content-center md-form form  active-cyan-2 mb-2">
                <div class="input-group mb-3">
                    <input name="param" type="text" class="form-control" id="name" placeholder="Search" required>
                    <button name="search" class="btn btn-outline-info" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <h1>Pending Bottles</h1>
                </div>
                <div class="col-lg-2 col-sm-6 my-2 ">
                    <button type="button" id="btnExport" class="btn btn-primary btn-default">download table</button>
                </div>
                <div class="col-lg-2 col-sm-6 my-2">
                    <button type="button" class="btn btn-info btn-default" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Filter</button>
                </div>
            </div>
             <!-- ############################################################################ -->
            <div class="">
                <form action="./pending_bottles.php?page=<?php echo $page; ?>" method="post" class=" d-flex justify-content-center md-form form  active-cyan-2 mb-2">
                    <div class="modal fade" id="exampleModal" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="recipient-name" name="name" class="col-form-label">Customer:</label><br>
                                            <select data-placeholder="Select a coutomer" name="c_name" class="select2" style="width: 465px;">
                                                <option value="">Select Customer</option>
                                                <?php
                                                $query = "SELECT * FROM register";
                                                $sql = $conn->query($query);
                                                while ($row = $sql->fetch_array()) {
                                                ?>
                                                    <option value="<?php echo $row['customer']; ?>"><?php echo $row['customer']; ?></option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Date From:</label>
                                            <input type="text" class="form-control" autocomplete="off" placeholder="Date From" id="from" name="from" value="<?php echo $fromDate ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">End Date:</label>
                                            <input type="text" class="form-control" autocomplete="off" placeholder="End Date" id="to" name="to" value="<?php echo $toDate ?>">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input name="chekbox" value="" class="form-check-input" type="checkbox" id="inlineCheckbox1">
                                                <label class="form-check-label" for="inlineCheckbox1">0 Payment Customers</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-danger" style="margin-left: 10px;" name="name11" value="Filter">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ############################################################################ -->
                </form>
            </div>
            <table id="tblCustomers" class="table table-striped">
                <thead>
                    <tr class="bg-info">
                        <th>#</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Product</th>
                        <th>Bd</th>
                        <th>Br</th>
                        <th>P. Bottles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $limit = 20;
                    $query1 = "SELECT count(*) FROM selling_product";
                    $sql1 = $conn->query($query1);
                    $total_rows = mysqli_fetch_array($sql1)[0];
                    $total_page = ceil($total_rows / $limit);
                    $offset = ($page - 1) * $limit;
                    $res = mysqli_query($conn, "select * from selling_product JOIN register ON selling_product.customer_id = register.id $sub_sql  order by selling_product.id desc LIMIT $offset, $limit");
                    // echo $res;
                    if (isset($_POST["search"])) {
                        $permission_pagiantion = false;
                        $param = $_POST["param"];
                        $sql = "SELECT * FROM selling_product 
                        JOIN register ON selling_product.customer_id = register.id
                        WHERE bd > br 
                        AND (product LIKE '%$param%' 
                            OR date LIKE '%$param%' 
                            OR selling_product.customer LIKE '%$param%' 
                            OR bd LIKE '%$param%' 
                            OR br LIKE '%$param%' 
                            OR payment LIKE '%$param%' 
                            OR phone LIKE '%$param%' 
                            OR register.email LIKE '%$param%' 
                            OR register.fix_price LIKE '%$param%') 
                        ORDER BY selling_product.id DESC";
                        echo $param;
                        $result = mysqli_query($conn, $sql);

                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                            $date = $row['date'];
                            $product = $row['product'];
                            $customer = $row['customer'];
                            $date = $row['date'];
                            $phone = $row['phone'];
                            $email = $row['email'];
                            $bd = $row['bd'];
                            $br = $row['br'];
                            $product = $row['product'];
                            $pen_bottles = $bd - $br;
                    ?>
                            <tr>
                                <td class="pro_id" data-label="Name"><?php echo $i; ?></td>
                                <td data-label="Customer"><?php echo $customer; ?></td>
                                <td data-label="Date"><?php echo $date; ?></td>
                                <td data-label="Phone"><?php echo $phone; ?></td>
                                <td data-label="Email"><?php echo $email; ?></td>
                                <td data-label="Product"><?php echo $product; ?></td>
                                <td data-label="Bd"><?php echo $bd; ?></td>
                                <td data-label="Br"><?php echo $br; ?></td>
                                <td data-label="P. bottles"><?php echo $pen_bottles; ?></td>
                            </tr>
                        <?php
                        }
                    } elseif (mysqli_num_rows($res) > 0) {
                        $permission_pagiantion = false;
                        if (mysqli_num_rows($res) > 19) {
                          $permission_pagiantion = true;
                        }
                        while ($row = mysqli_fetch_assoc($res)) {
                            $i++;
                            $date = $row['date'];
                            $product = $row['product'];
                            $customer = $row['customer'];
                            $date = $row['date'];
                            $phone = $row['phone'];
                            $email = $row['email'];
                            $bd = $row['bd'];
                            $br = $row['br'];
                            $fix_price = $row['fix_price'];
                            $payment = $row['payment'];
                            $product = $row['product'];
                            $bill = $row['total_bill'];
                            $pen_bottles = $bd - $br;
                        ?>
                            <tr>
                            <td class="pro_id" data-label="Name"><?php echo $i; ?></td>
                                <td data-label="Customer"><?php echo $customer; ?></td>
                                <td data-label="Date"><?php echo $date; ?></td>
                                <td data-label="Phone"><?php echo $phone; ?></td>
                                <td data-label="Email"><?php echo $email; ?></td>
                                <td data-label="Product"><?php echo $product; ?></td>
                                <td data-label="Bd"><?php echo $bd; ?></td>
                                <td data-label="Br"><?php echo $br; ?></td>
                                <td data-label="P. bottles"><?php echo $pen_bottles; ?></td>
                            </tr>
                    <?php }
                    } else {
                    }
                    if (!$res) {
                        echo "Error: " . mysqli_error($conn);
                        exit;
                    } ?>
                </tbody>
            </table>
            <?php
            if ($permission_pagiantion) {
            ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php
                        if ($total_rows > 20) {
                            if ($page > 1) {
                        ?>
                                <li class="page-item">
                                    <a class="page-link" href="./pending_bottles.php?page=<?php echo $page - 1; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php
                            }
                            for ($i = 1; $i <= $total_page; $i++) {
                            ?>
                                <li class="page-item"><a class="page-link" href="./pending_bottles.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php
                            }
                            if ($total_page > $page) {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="./pending_bottles.php?page=<?php echo $page + 1; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </nav>
            <?php } ?>
        </form>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- jQuery UI library -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

        <!-- Select2 library -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

        <!-- PDFMake library -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>

        <!-- html2canvas library -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

        <script type="text/javascript">
            $(function() {
                var dateFormat = "dd/mm/yy";
                var from = $("#from").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    dateFormat: "dd/mm/yy",
                    onClose: function(selectedDate) {
                        $("#to").datepicker("option", "minDate", selectedDate);
                    }
                });
                var to = $("#to").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    dateFormat: "dd/mm/yy",
                    onClose: function(selectedDate) {
                        $("#from").datepicker("option", "maxDate", selectedDate);
                    }
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.select2').select2();
                $("#btnExport").on("click", function() {
                    html2canvas($('#tblCustomers')[0], {
                        onrendered: function(canvas) {
                            var data = canvas.toDataURL();
                            var docDefinition = {
                                content: [{
                                    image: data,
                                    width: 500
                                }]
                            };
                            pdfMake.createPdf(docDefinition).download("customer-details.pdf");
                        }
                    });
                });
            });
        </script>
</body>

</html>