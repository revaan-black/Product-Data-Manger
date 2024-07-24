<?php
include "../links/include.php";
include "./crud.php";

// for time
date_default_timezone_set('Asia/Karachi');
$date = date("m/d/Y");
// for detel customer's payment data
if (isset($_POST['delete'])) {
  $delete_id = $_POST['delete_id'];
  // code to delete the product with id $delete_id
  $deleteProductSql = "DELETE FROM payment_history WHERE id = '$delete_id'";

if ($conn->query($deleteProductSql) === TRUE) {
    alert("Data Was Deleted Successfully!", "success");
} else {
    alert("Something Went Wrong!", "danger");
}
}
// makign page number for pagination
if (($_GET["page"]) < 1) {
  $page = 1;
} else {
  $page = $_GET['page'];
}


// adding data of this page into the database
if (isset($_POST["submit"])) {  
  if (!empty($_POST['c_name2']) && !empty($_POST['payment'])) {
    $customer = $_POST['c_name2'];
    $payment = $_POST['payment'];
    
    $sql = "INSERT INTO payment_history (date, customer, payment) VALUES ('$date', '$customer', '$payment')";
    
    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        alert("Data Was Inserted Successfully!", "success");
    } else {
        alert("Something Went Wrong!", "danger");
    }
} else {
    alert("You Need fill Both With Valid Input!", "danger");
}
  


  // collecting data form this page
  // collecting data from register table
  // $query = "SELECT * FROM register where customer = '$customer' ";
  // $sql1 = $conn->query($query);
  // $row_for_id = $sql1->fetch_array();
  // $id = $row_for_id['id'];
  // $credit = $row_for_id['credit'];
  // $debit = $row_for_id['debit'];
  // $fix_price = $row_for_id['fix_price'];
  // $extra_amount = $row_for_id['extra_amount'];
//   $persent_credit = $row_for_id['credit'];
//   $payment_2 = $credit + $payment;

//   // saving data
//   $obj->insert('payment', ["customer" => "$customer", "payment" => "$payment", "date" => "$date", "customer_id" => "$id"]);



//   $remine_payment = $payment_2 - $debit;
// // ---------------------------------------------------

//   $extra_amount_2 = $credit + $payment;
// // ---------------------------------------------------
//   $obj->update('register', ["extra_amount" => "$extra_amount_2"], "customer = '$customer' ");

//    // collecting data from register table
// $query = "SELECT * FROM register where customer = '$customer' ";
// $sql1 = $conn->query($query);
// $row_for_id_2 = $sql1->fetch_array();
// $extra_amount_3 = $row_for_id_2['extra_amount'];





// if ($debit > 0 && $payment_2 > 0) {
 
//   if($remine_payment > 0){
//     $obj->update('register', ["credit" => "$remine_payment", "debit" => "0"], "customer = '$customer' ");
//   }elseif($remine_payment < 0){
//     $new_remine_payment = abs($remine_payment);
//     $obj->update('register', ["credit" => "0", "debit" => "$new_remine_payment"], "customer = '$customer' ");
//   }else{
//     $obj->update('register', ["credit" => "0", "debit" => "0"], "customer = '$customer' ");
//   }
// }
  


//   $sql = "SELECT * FROM selling_product WHERE customer='$customer' AND payment=0 OR customer='$customer' AND payment < total_bill ";
//   $result = mysqli_query($conn, $sql);
//   while ($for_pay_payment = mysqli_fetch_assoc($result)) {


//   $sql = "SELECT * FROM register WHERE customer='$customer' ";
//   $result = mysqli_query($conn, $sql);
//   $row = mysqli_fetch_assoc($result);
//   $persent_credit = $row['credit'];

//   $total_bill = $for_pay_payment['total_bill'];
//   $payed_payment = $for_pay_payment['payment'];
//   $id = $for_pay_payment['id'];
//   echo $for_pay_payment['bd'] . "-" . $for_pay_payment['total_bill'] . "-" . $for_pay_payment['payment'] . "-" . $for_pay_payment['id'] . "</br>";
//   $bill_for_pay = $total_bill - $payed_payment;

//   $remine_amount = $extra_amount_3 - $bill_for_pay;

//   if($remine_amount > 0){
//     echo "if   ";
//     $obj->update('selling_product', ["payment" => "$bill_for_pay"], "id = '$id' ");
//     $obj->update('register', ["credit" => "$remine_amount", "debit" => "$bill_for_pay", "extra_amount" => "$remine_amount"], "customer = '$customer' ");


     
//     $sql = "SELECT * FROM selling_product WHERE customer='$customer' AND payment=0 OR customer='$customer' AND payment < total_bill ";
//     $result = mysqli_query($conn, $sql);

//     // Initialize $_SESSION['payment_2'] before the loop
//     $_SESSION['payment_2'] = $credit + $payment;

//     while ($for_pay_payment_2 = mysqli_fetch_assoc($result)) {
//       $payed_payment = $for_pay_payment_2['payment'];
//       $bill = $for_pay_payment_2['total_bill'];
//       $id = $for_pay_payment_2['id'];
//       $customer_id = $for_pay_payment_2['customer_id'];
//       $bill_for_pay = $bill - $payed_payment;
//       echo  "BD => {$for_pay_payment_2['bd']} | ";
//       echo "  now_current_pay_pament => {$_SESSION['payment_2']} |   ";
//       $remine_amount = $_SESSION['payment_2'];
//       echo " bill_for_pay => $bill_for_pay |";
//       if($remine_amount < $bill_for_pay){
//         echo "if_2";
//         echo  "id => {$for_pay_payment_2['id']} |... ";
//         $remine_amount = $remine_amount - $bill_for_pay;
//         echo " after_pay_remine_payment => $remine_amount |";

//         $obj->update('selling_product', ["payment" => "$remine_amount"], "id = '$id' ");  

//       }elseif($remine_amount > $bill_for_pay){
//         // echo " sdfhgdf"; 
//         echo " {elseif} ";
//         $remine_amount = $remine_amount - $bill_for_pay;
        
//         echo " after_pay_remine_payment => $remine_amount ..|..";
//         echo  "id => {$id} | ";

//         $final_cerdit = $credit + $remine_amount; // ?
//         $final_debit = $debit - $payment; // ?
//         if ($credit == 0 && $debit == 0) {
//           echo "if";
//           $final_cerdit = $payment;
//           $final_debit = 0;
//         }elseif ($credit == 0) {
//           echo "elseif_1";
//           if ($payment < $debit) {
//             echo "nest_if";
//             $final_debit = $debit - $payment;
//             $final_cerdit = 0;
//           }else{
//             echo "nest_else";
//             $final_cerdit = $payment - $debit;
//             $final_debit = 0;
//           }
//         }elseif ($debit == 0) {
//           echo "elseif_2";
//           $final_cerdit = $credit + $payment;
//           $final_debit = 0;
//         }
//         else{
//           if ($payment > $debit) {
//             $cerdit_2 = $payment - $debit;
//             $final_cerdit = $credit;
//             $final_debit = 0;
//           }else{
//             $final_cerdit = $credit;
//           }
//         }

//         $obj->update('selling_product', ["payment" => "$bill"], "id = '$id' ");
//         $obj->update('register', ["credit" => "$final_cerdit", "debit" => "$final_debit"], "id = '$customer_id' ");


//         if ($remine_amount > $bill_for_pay) {
//           echo "</br> its adding into credit and make payment => $payed_payment and bill => $bill same same";
//           $final_cerdit = $credit + $remine_amount;
//           $obj->update('selling_product', ["payment" => "$bill"], "id = '$id' ");
//           $obj->update('register', ["credit" => "$final_cerdit", "debit" => "0"], "id = '$customer_id' ");

//         }
//       }
//       // Update $_SESSION['payment_2'] with the remaining amount
//       $_SESSION['payment_2'] = $remine_amount;
//     }












//   }
//   elseif ($remine_amount < 0) {
//     echo "elseif    ";
//     $debit_2 = $debit - $remine_amount;
//     $new_remine_amount = abs($remine_amount);
//     $extra_amount_3 = $payed_payment + $payment;
//     $debit_2 = $debit - $extra_amount_3;
//     $obj->update('selling_product', ["payment" => "$extra_amount_3"], "id = '$id' ");
//     $obj->update('register', ["credit" => "0", "debit" => "$debit_2", "extra_amount" => "0"], "customer = '$customer' ");
//   }else{
//     echo "else    ";
//     $debit_2 = $debit - $bill_for_pay;
//     $obj->update('selling_product', ["payment" => "$total_bill"],"id = '$id' ");
//     $obj->update('register', ["credit" => "0", "debit" => "$debit_2", "extra_amount" => "0"], "customer = '$customer' ");
//   }
  
//  }
 




}
$sub_sql = "";
$c_name = "";
$toDate = $fromDate = "";
if (isset($_POST['name11'])) {
  $from = $_POST['from'];
  $fromDate = $from;
  $fromArr = explode("/", $from);
  $from = $fromArr['1'] . '/' . $fromArr['0'] . "/" . $fromArr['2'];
  $to = $_POST['to'];
  $toDate = $to;
  $toArr = explode("/", $to);
  $to = $toArr['1'] . '/' . $toArr['0'] . '/' . $toArr['2'];
  if (!empty($_POST['c_name1']) && empty($_POST['from']) && !isset($_POST['chekbox'])) {
    $name = $_POST['c_name1'];
    $c_name = " customer = '$name'";
    $sub_sql = " where $c_name";
  } elseif (!empty($_POST['c_name1']) && !empty($_POST['from']) && empty($_POST['chekbox'])) {
    $name = $_POST['c_name1'];
    $chek = 0;
    $sub_sql = " WHERE customer = '$name' && date >= '$from' && date <= '$to'";
  } elseif (isset($_POST['chekbox']) && !empty($_POST['c_name1'])) {
    $name = $_POST['c_name1'];
    $chek = 0;
    $sub_sql = " where payment = '$chek' && customer = '$name'";
  } elseif (!empty($_POST['c_name1']) && empty($_POST['from']) && empty($_POST['chekbox'])) {
    $name = $_POST['c_name1'];
    $c_name = " AND customer = '$name'";
    $sub_sql = " where date >= '$from' && date <= '$to' $c_name";
  } elseif (!empty($_POST['chekbox'])) {
    $name = 0;
    $c_name = " payment = '$name'";
    $sub_sql = " where $c_name";
  } else {
    $sub_sql = " where date >= '$from' && date <= '$to'";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9M uhOf23Q9Ifjh" crossorigin="anonymous">


  <!-- ------------------------------------------------------------- -->

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  
</head>

<body>

  <form action="customer_payment.php?page=<?php echo $page; ?>" method="POST">
    <div class="container">
      <div class="card">
        <div class="card-header">
          <h3>add customer Payment</h3>
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <div class="container">
              <div class="row">
                <div class="col-lg-5 col-sm-12 my-2">
                  <select name="c_name2" data-placeholder="Select a coutomer" class="select2" style="width: 400px;">
                    <option value="">Select Customer</option>
                    <?php
                    $query = "SELECT * FROM register";
                    $sql = $conn->query($query);
                    while ($row = $sql->fetch_array()) {
                    ?>
                      <option value="<?php echo $row['customer']; ?>"><?php echo $row['customer']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-lg-5 col-sm-12 my-2">
                  <input name="payment" type="number" class="form-control" id="phone" placeholder="Enter Payment">
                </div>
                <div class="col-lg-2 col-sm-6 my-2">
                  <button type="submit" name="submit" class="btn btn-primary">Add form</button>
                </div>
              </div>
            </div>
          </blockquote>
        </div>
      </div>
      <hr>
      <!-- ############################################################################ -->
      <div class="modal fade" id="exampleModal"  role="dialog"  aria-hidden="true">
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
                  <select name="c_name1" data-placeholder="Select a coutomer" class="select2" style="width: 100%; max-width: 465px;">
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
                  <label for="from" class="col-form-label">Date From:</label>
                  <input type="text" class="form-control" placeholder="Date From" autocomplete="off" id="from" name="from" value="<?php echo $fromDate ?>">
                </div>
                <div class="form-group">
                  <label for="to" class="col-form-label">End Date:</label>
                  <input type="text" class="form-control" placeholder="End Date" autocomplete="off" id="to" name="to" value="<?php echo $toDate ?>">
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
      <div class="text-right my-2">
        <div class="row">
          <div class="col-lg-10 col-sm-8">
            <!-- <input name="param" type="text" class="form-control" id="name" placeholder="Search" > -->
            <div class="input-group mb-3">
              <input name="param" type="text" class="form-control" id="name" placeholder="Search">
              <div class="input-group-append">
                       <button name="search" class="btn btn-outline-info" type="submit" id="button-addon2">Search</button>
              </div>
            </div>

          </div>
          <div class="col-lg-1 col-sm-1">
          </div>
          <div class="col-lg-1 col-sm-1">
            <button type="button" class="btn btn-info btn-default" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Filter</button>
          </div>
        </div>
      </div>
      <!-- ############################################################################ -->
      <table id="tblCustomers" class="table table-striped">
        <thead>
          <tr class="bg-info">
            <th>#</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Payment</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $limit = 20;
          $query1 = "SELECT count(*) FROM payment_history";
          $sql1 = $conn->query($query1);
          $total_rows = mysqli_fetch_array($sql1)[0];
          $total_page = ceil($total_rows / $limit);
          $offset = ($page - 1) * $limit;
          $res = mysqli_query($conn, "select * from payment_history $sub_sql order by id desc LIMIT $offset, $limit");
          if (isset($_POST["search"])) {
            $permission_pagiantion = false;
            $param = $_POST["param"];
            $sql = "SELECT * FROM payment_history WHERE date LIKE \"%$param%\" or customer LIKE \"%$param%\" or payment LIKE \"%$param%\" ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
              $i++;
              $id = $row['id'];
              $date = $row['date'];
              $customer = $row['customer'];
              $payment = $row['payment'];
          ?>
              <tr>
                <td class="pro_id" data-label="#"><?php echo $i; ?></td>
                <td data-label="Date"><?php echo $date; ?></td>
                <td data-label="Customer"><?php echo $customer; ?></td>
                <td data-label="Payment"><?php echo $payment; ?></td>
                <td data-label="Action">
                  <button type="button" data-id="<?php echo $id; ?>" class="btn btn-danger btn-sm delete_btn" data-toggle="modal" data-target="#exampleModalLong">
                    Delete
                  </button>
                </td>
              </tr>
            <?php
            }
          } elseif (mysqli_num_rows($res) > 0) {
            $permission_pagiantion = true;
            $i = "";
            while ($row = mysqli_fetch_assoc($res)) {
              $i++;
              $id = $row['id'];
              $date = $row['date'];
              $customer = $row['customer'];
              $payment = $row['payment'];
            ?>
              <tr>
                <td class="pro_id" data-label="#"><?php echo $i; ?></td>
                <td data-label="Date"><?php echo $date; ?></td>
                <td data-label="Customer"><?php echo $customer; ?></td>
                <td data-label="Payment"><?php echo $payment; ?></td>
                <td data-label="Action">
                  <button type="button" data-id="<?php echo $id; ?>" class="btn btn-danger btn-sm delete_btn" data-toggle="modal" data-target="#exampleModalLong">
                    Delete
                  </button>
                </td>
              </tr>
          <?php }
          } else {
          }
          // echo $result;
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
                  <a class="page-link" href="./customer_payment.php?page=<?php echo $page - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php
              }
              for ($i = 1; $i <= $total_page; $i++) {
              ?>
                <li class="page-item"><a class="page-link" href="./customer_payment.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php
              }
              if ($total_page > $page) {
              ?>
                <li class="page-item">
                  <a class="page-link" href="./customer_payment.php?page=<?php echo $page + 1; ?>" aria-label="Next">
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
    </div>
    <!-- Modal -->
  </form>
  <form action="customer_payment.php?page=<?php echo $page; ?>" method="POST">
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="delete_id" id="delete_id">
            Do we really want to delete the record!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
          </div>
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

  <script>
    $('.delete_btn').click(function() {
      var id = $(this).data('id');
      $('#delete_id').val(id);
    });
  </script>

  <!-- <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"
      integrity="sha512-eSeh0V+8U3qoxFnK3KgBsM69hrMOGMBy3CNxq/T4BArsSQJfKVsKb5joMqIPrNMjRQSTl4xG8oJRpgU2o9I7HQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css"
      integrity="sha512-0nkKORjFgcyxv3HbE4rzFUlENUMNqic/EzDIeYCgsKa/nwqr2B91Vu/tNAu4Q0cBuG4Xe/D1f/freEci/7GDRA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    /> -->

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

  <script>
    $(document).ready(function() {
      $('.select2').select2();

    });
  </script>
</body>

</html>