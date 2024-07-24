<?php
// function mainAlgo ($customer_id, $new_credit, $new_debit, $credits){
//     include "../server/connection.php";
//     echo $new_credit;
//     echo $new_debit;
//     echo "jdshgfjslkjdhg";
//     $query4 = "SELECT * FROM selling_product WHERE customer_id = '$customer_id'";
//     $sql = $conn->query($query4);
//     if ($new_debit > $new_credit) { 
//         while ($row = $sql->fetch_assoc()) {
//             $debit = $row['debits'];
//             $credit = $row['credits'];
//             $id = $row['id'];
//             if ($debit > $credit){
//                 $remain_amount = $debit - $credit;
//                 // echo $remain_amount;
                
//                 // echo $credits;
//                 if ($credits >= $remain_amount) {
//                     $credits -= $remain_amount;
//                     // echo $credits;
//                     // echo "----";
//                     // echo $id;
//                     $updateSellingProductSql = "UPDATE selling_product SET credits = '$debit' WHERE id = '$id'";
//                     $conn->query($updateSellingProductSql);
//                     // $updateSellingProductSql2 = "UPDATE selling_product SET credits = '$credits' WHERE id = '$id'";
//                     // $conn->query($updateSellingProductSql2);
//                     echo "updated";
//                 }else{
//                     $credits = 0;
//                     echo "loops works";
//                 }

//             }else{
                   
//             }
//             echo '<hr>';
//         }
//     } else {
//         echo "both are equal";
//     }
// }

// function mainAlgo($customer_id, $new_credit111, $new_debit111, $credits, $debits) {
//     include "../server/connection.php";
//     $new_credit = $new_credit111 + $credits;
//     $new_debit = $new_debit111 + $debits;
    
//     $query4 = "SELECT * FROM selling_product WHERE customer_id = '$customer_id'";
//     $sql = $conn->query($query4);

//     while ($row = $sql->fetch_assoc()) {
//         $debit = $row['debits'];
//         $credit = $row['credits'];
//         $credit = $row['credits'];
//         $remain_credit = $debit;
//         $id = $row['id'];
//         echo $new_credit . "    ";
        
//         if($new_credit >= $new_debit){
//             echo "all thing is equle to the d c";
//         }elseif($remain_credit <= $new_credit){

//             $updateProductSql = "UPDATE selling_product SET credits = '$debit' WHERE id = '$id'";
//             $conn->query($updateProductSql);
//             $new_credit -= $remain_credit;
//             echo $credit." => ". $debit. "<hr>";
//         }else{
//             $new_credit2 = $new_credit + $credit;
//             $updateProductSql = "UPDATE selling_product SET credits = '$new_credit2' WHERE id = '$id'";
//             $conn->query($updateProductSql);
//             echo $new_credit;
//             echo $new_credit . " add in selling product in in of " . $id . "<hr>";
//             $new_credit = 0;
//         }
//         echo "  ".$new_credit;
//         // echo ",";
//         // echo ",,". $remain_credit. ",,";
//         // echo "---";

//     }  
// }


function mainAlgo($customer_id, $new_credit, $new_debit, $credits, $debits) {
    include "../server/connection.php";;
    
    $query4 = "SELECT * FROM selling_product WHERE customer_id = '$customer_id' LIMIT 3";
    $sql = $conn->query($query4);

    while ($row = $sql->fetch_assoc()) {
        $oderDebit = $row['debits'];
        $orderCredit = $row['credits'];
        $remain_credit = $debit;
        $id = $row['id'];
        
        echo $id;
        echo '<hr>';

        if ($oderDebit > $orderCredit){
            $need = $oderDebit - $orderCredit;
            echo "need = ". $need . ",,,,,";
            if ($credits <= $need && $credits != 0){
                $totalCredit = $orderCredit + $credits;
                $credits -= $credits;
                $updateProductSql = "UPDATE selling_product SET credits = '$totalCredit' WHERE id = '$id'";
                $conn->query($updateProductSql);
                echo "credits = ". $credits . ",,,,,"; 
            }
            // elseif ($credits > $need){
            //     $updateProductSql = "UPDATE selling_product SET credits = '$oderDebit' WHERE id = '$id'";
            //     $conn->query($updateProductSql);
            //     $credits -= $need;
            // }
            else{
                echo "else";
                $updateProductSql = "UPDATE selling_product SET credits = '$credits' WHERE id = '$id'";
                $conn->query($updateProductSql);
            }
   
        }
    }  
}




?>
