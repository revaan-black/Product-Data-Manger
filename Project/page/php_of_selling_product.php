<?php
include "../server/connection.php";
include "../server/connection.php";
include "../layouts.php/messages.php";
include "../Algo/mainAlgo.php";
error_reporting(0);
 $product = $_POST['porduct'];
 $date = $_POST['date'];
 // Data collect form product table
 $productQuery = "SELECT * FROM product where product = '$product' ";
 $productSql = $conn->query($productQuery);
 $productDate = $productSql->fetch_array();
 $productPrice = $productDate['price'];
 
 try {
    foreach ($_POST['customer'] as $key => $value) {    
   
        // echo $value;
        // Data collect form register table
        // Insert data of selling produnt with details

        
        $query1 = "SELECT * FROM register where customer = '$value' ";
        $sql1 = $conn->query($query1);
        $row = $sql1->fetch_array();
        $customer_id = $row['id'];
        $debit = $row['debit'];
        $credit = $row['credit'];
        // Data collect form product table
        $query2 = "SELECT * FROM register where customer = '$value' ";
        $sql1 = $conn->query($query2);
        $row = $sql1->fetch_array();
        // collecting data from selling_product(form)
        $credits = $_POST['payment'][$key];
        $bd = $_POST['bd'][$key];
        $br = $_POST['br'][$key];
        $debits = $bd * $productPrice;
        
        // This check if customer's last have give less credit than debit and its in cureent order than will pay more credit than debit than it recover its there old less credit and there total credit is more than it's total debits than it will have for it next order...
        
        $insertSellingProductDataSql = "INSERT INTO selling_product (product, date, customer, customer_id, bd, br, credits, debits) VALUES ('$product', '$date', '$value', '$customer_id', '$bd', '$br', 0, '$debits')";
        $conn->query($insertSellingProductDataSql);

        // fetching old credit and debit an customer on registter (table)

        $query3 = "SELECT * FROM register WHERE id = '$customer_id' ";
        $sql = $conn->query($query3);
        $row = $sql->fetch_array();
        $last_order_credit = $row['credit'];
        $last_order_debit = $row['debit'];

        // Calculating next credit and debit for the customer

        $new_credit = $last_order_credit + $credits;
        $new_debit = $last_order_debit + $debits;

        // updating credit and debit into register (table)

        // $updatecreditDebitSql = "UPDATE register SET credit = '$new_credit', debit = '$new_debit' WHERE id = '$customer_id'";
        // if ($conn->query($updatecreditDebitSql) === TRUE) {
        //     alert("Data Was Inserted Successfully!", "success");
        // } else {
        //     alert("Something Went Wrong!", "danger");
        // }
        
        // Now this time to upate selling_product (table). Frist fatch data from selling_product.
    //    echo $customer_id;
        mainAlgo($customer_id, $last_order_credit, $last_order_debit, $credits, $debits);



        
    }
}catch (PDOException $e) {
    alert("Something Went Wrong!", "danger");
}












































