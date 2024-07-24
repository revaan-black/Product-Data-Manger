<?php
// include("./navbar.php");
// include("./function.php");
// error_reporting(0);
// $conn = new mysqli("localhost", "root", "", "water_project");
// session_start();

include "../links/include.php";
// if (empty($_SESSION["login"])) {
//     moveto("./login.php");
// }
$connn = mysqli_connect("localhost", "root", "", "water_project");
if (($_GET["page"]) < 1) {
  $page = 1;
} else {
  $page = $_GET['page'];
}


$sub_sql = "";
$sub_sql_2 = " WHERE";
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



  echo $_POST['c_name'];
  echo $from;
  echo "</br>";
  echo $to;

  if (!empty($_POST['c_name']) && empty($_POST['from']) && !isset($_POST['chekbox'])) {
    echo "if";
    $name = $_POST['c_name'];
    $c_name = " customer = '$name'";
    $sub_sql = " where $c_name";
    $sub_sql_2 = " $c_name";
  } elseif (!empty($_POST['c_name']) && !empty($_POST['from']) && empty($_POST['chekbox'])) {
    $name = $_POST['c_name'];
    $chek = 0;
    $sub_sql = " WHERE customer = '$name' && date >= '$from' && date <= '$to'";
    $sub_sql_2 = " customer = '$name' && date >= '$from' && date <= '$to'";
  } elseif (isset($_POST['chekbox']) && !empty($_POST['c_name'])) {
    $name = $_POST['c_name'];
    $chek = 0;
    $sub_sql = " where payment = '$chek' && customer = '$name'";
    $sub_sql_2 = " payment = '$chek' && customer = '$name'";
  } elseif (!empty($_POST['c_name'])) {
    $name = $_POST['c_name'];
    $c_name = " AND customer = '$name'";
    $sub_sql = " where date >= '$from' && date <= '$to' $c_name";
    $sub_sql_2 = " date >= '$from' && date <= '$to' $c_name";
  } elseif (!empty($_POST['chekbox'])) {
    $name = 0;
    $c_name = " payment = '$name'";
    $sub_sql = " where $c_name";
    $sub_sql_2 = " $c_name";
  } else {
    $sub_sql = " where date >= '$from' && date <= '$to'";
    $sub_sql_2 = " date >= '$from' && date <= '$to'";
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





  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->





  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <!------ Include the above in your HEAD tag ---------->

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  <style>
    @media(max-width: 500px) {
      .table thead {
        display: none;
      }

      .table,
      .table tbody,
      .table tr,
      .table td {
        display: block;
        width: 100%;
      }

      .table tr {
        margin-bottom: 15px;
      }

      .table td {
        text-align: right;
        padding-left: 50%;
        text-align: right;
        position: relative;
      }

      .table td::before {
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 50%;
        padding-left: 15px;
        font-size: 15px;
        font-weight: bold;
        text-align: left;
      }
    }

    .active-cyan input.form-control[type=text] {
      border-bottom: 1px solid #4dd0e1;
      box-shadow: 0 1px 0 0 #4dd0e1;
    }

    .active-cyan input.form-control[type=text] {
      border-bottom: 1px solid #4dd0e1;
      box-shadow: 0 1px 0 0 #4dd0e1;
    }

    .btn-default {
      background-color: #007bff;
      border: none;
      color: #fff;
      border-radius: 4px;
      padding: 10px 20px;
      transition: all 0.2s ease-in-out;
      box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
    }

    .btn-default:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 10px -5px rgba(0, 0, 0, 0.5);
    }

    .select2-container .select2-selection--single {
      height: 34px !important;
    }

    .select2-container--default .select2-selection--single {
      border: 1px solid #ccc !important;
      border-radius: 0px !important;
    }
  </style>
  <title>Hello, world!</title>
  
</head>

<body>
  
  <div class="container">
    <form action="./sell_detail.php?page=<?php echo $page; ?>" method="post">
      <form action="./product_information.php?page=1" method="post" class=" d-flex justify-content-center md-form form  active-cyan-2 mb-2">
        <div class="input-group mb-3">
          <input name="param" type="text" class="form-control" id="name" placeholder="Search" required>
          <button name="search" class="btn btn-outline-info" type="submit" id="button-addon2">Search</button>
        </div>
      </form>
      <div class="row">
        <div class="col-lg-8 col-sm-12">
          <h1>History</h1>
        </div>
        <div class="col-lg-2 col-sm-12 my-2">
          <button type="button" id="btnExport" class="btn btn-primary btn-default">download table</button>
        
        
        </div>
        <div class="col-lg-2 col-sm-12 my-2">
        
        
          <button type="button" class="btn btn-info btn-default" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Filter</button>
        </div>
        
        <div class="col-6">
          <form action="sell_detail.php?page=<?php echo $page; ?>" method="post" class=" d-flex justify-content-center md-form form  active-cyan-2 mb-2">

          


            <!-- ############################################################################ -->


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
                        <input type="text" class="form-control" placeholder="Date From" id="from" name="from" value="<?php echo $fromDate ?>">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">End Date:</label>
                        <input type="text" class="form-control" placeholder="End Date" id="to" name="to" value="<?php echo $toDate ?>">
                      </div>
                      <div class="form-group">
                        <div class="form-check form-check-inline">
                          <input name="chekbox" class="form-check-input" type="checkbox" id="inlineCheckbox1">
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



      </div>


      <table id="tblCustomers" class="table table-striped">
        <thead>
          <tr class="bg-info">
            <th>#</th>
            <th>Date</th>
            <th>Product</th>
            <th>Customer</th>
            <th>Bd</th>
            <th>Br</th>
            <th>Payment</th>
            <th>Bill</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $limit = 20;
          $query1 = "SELECT count(*) FROM selling_product";
          $sql1 = $connn->query($query1);
          $total_rows = mysqli_fetch_array($sql1)[0];
          $total_page = ceil($total_rows / $limit);
          $offset = ($page - 1) * $limit;


          $res = mysqli_query($conn, "select * from selling_product $sub_sql  order by id desc LIMIT $offset, $limit");

          // echo $res;


          if (isset($_POST["search"])) {
            $permission_pagiantion = false;
            $param = $_POST["param"];
            $sql = "SELECT * FROM selling_product WHERE product LIKE \"%$param%\" or date LIKE \"%$param%\" or customer LIKE \"%$param%\" or bd LIKE \"%$param%\" or br LIKE \"%$param%\" or payment LIKE \"%$param%\" ORDER BY id DESC";
            $result = mysqli_query($connn, $sql);
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
              $i++;
              $date = $row['date'];
              $product = $row['product'];
              $customer = $row['customer'];
              $bd = $row['bd'];
              $br = $row['br'];
              $payment = $row['payment'];
              $bill = $row['total_bill'];
          ?>
              <tr>
                <td class="pro_id" data-label="Name"><?php echo $i; ?></td>
                <td data-label="Date"><?php echo $date; ?></td>
                <td data-label="Product"><?php echo $product; ?></td>
                <td data-label="Customer"><?php echo $customer; ?></td>
                <td data-label="Bd"><?php echo $bd; ?></td>
                <td data-label="Br"><?php echo $br; ?></td>
                <td data-label="Payment"><?php echo $payment; ?></td>
                <td data-label="Bill"><?php echo $bill; ?></td>
              </tr>
            <?php
            }
          } elseif (mysqli_num_rows($res) > 0) {

            $permission_pagiantion = false;
            if (mysqli_num_rows($res) > 19) {
              $permission_pagiantion = true;
            }
            // $permission_pagiantion = true;
            while ($row = mysqli_fetch_assoc($res)) {
              $i++;
              $date = $row['date'];
              $product = $row['product'];
              $customer = $row['customer'];
              $bd = $row['bd'];
              $br = $row['br'];
              $payment = $row['payment'];
              $bill = $row['total_bill'];

            ?>
              <tr>
                <td class="pro_id" data-label="Name"><?php echo $i; ?></td>
                <td data-label="Date"><?php echo $date; ?></td>
                <td data-label="Product"><?php echo $product; ?></td>
                <td data-label="Customer"><?php echo $customer; ?></td>
                <td data-label="Bd"><?php echo $bd; ?></td>
                <td data-label="Br"><?php echo $br; ?></td>
                <td data-label="Payment"><?php echo $payment; ?></td>
                <td data-label="Bill"><?php echo $bill; ?></td>
              </tr>
          <?php }
          } else {
          }
          // echo $result;
          if (!$res) {
            echo "Error: " . mysqli_error($connn);
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
                  <a class="page-link" href="./sell_detail.php?page=<?php echo $page - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php
              }
              for ($i = 1; $i <= $total_page; $i++) {
              ?>

                <li class="page-item"><a class="page-link" href="./sell_detail.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php
              }
              if ($total_page > $page) {
              ?>
                <li class="page-item">
                  <a class="page-link" href="./sell_detail.php?page=<?php echo $page + 1; ?>" aria-label="Next">
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

      <!-- ######################################################################################## -->
      <?php
      $credit_data = array();
      $bd_data = array();

      if (empty($sub_sql)) {
        $data_of_credit = mysqli_query($conn, "SELECT * FROM selling_product WHERE payment = 0");
      } else {
        $data_of_credit = mysqli_query($conn, "SELECT * FROM selling_product $sub_sql");
      }

      while ($row = mysqli_fetch_assoc($data_of_credit)) {
        $customer_id = $row['customer_id'];
        $data_bd = $row['bd'];
        $bd_data[] = $data_bd;


        $nested_sql = mysqli_query($conn, "SELECT * FROM register where id = '$customer_id' ");

        // $result = mysqli_stmt_get_result($nested_data);

        while ($nested_row = mysqli_fetch_assoc($nested_sql)) {
          $credit = $nested_row['fix_price'];
          $credit_data[] = $credit;
        }
      }

      $result_data_credit = array();

      for ($i = 0; $i < count($bd_data); $i++) {
        $result_data_credit[] = $bd_data[$i] * $credit_data[$i];
      }
      $res222 = mysqli_query($conn, "select * from selling_product $sub_sql ");


      $total_customer_amount = array("");
      $total_customer_BD = array("");
      $total_customer_BR = array("");
      while ($row = mysqli_fetch_assoc($res222)) {
        $payment = $row['payment'];
        $BD = $row['bd'];
        $BR = $row['br'];
        $total_customer_amount[] = $payment;
        $total_customer_BD[] = $BD;
        $total_customer_BR[] = $BR;
      }



      ?>
      <hr>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-sm-12">
            <p>Total Amount : <?php echo array_sum($total_customer_amount); ?></p>
          </div>
          <div class="col-lg-3 col-sm-12">
            <p>Total BD : <?php echo array_sum($total_customer_BD); ?></p>
          </div>
          <div class="col-lg-3 col-sm-12">
            <p>Total BR : <?php echo array_sum($total_customer_BR); ?></p>
          </div>
          <div class="col-lg-3 col-sm-12">
            <p>Total Credit : <?php echo array_sum($result_data_credit); ?></p>
          </div>
        </div>
      </div>

    </form>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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