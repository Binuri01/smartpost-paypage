<?php
    $host="localhost";
    $Hname="root";
    $Hpwd="";
    $dbname =  "paypage";
    $conn=mysqli_connect($host,$Hname,$Hpwd,$dbname);

    if(mysqli_connect($host,$Hname,$Hpwd,$dbname)){
        // exit(json_encode($_POST));
        if(!empty($_POST['ename']) && !empty($_POST['NIC']) && !empty($_POST['amount']) && !empty($_POST['method'])) {

            $ename = $_POST['ename'];
            $NIC = $_POST['NIC'];
            $amount = $_POST['amount'];
            $method = $_POST['method'];
        
            // Check the selected method and set values for refNo and cashCollected accordingly
            if($method == "card" && !empty($_POST['refNo'])) {
                $refNo = $_POST['refNo'];
                $cashCollected = 0; // Not applicable for card payments
            } else if($method == "cash" && isset($_POST['cashCollected'])) {
                $refNo = ""; // Not applicable for cash payments
                $cashCollected = 1;
            } else {
                // Invalid input, method not selected or wrong data
                echo "Invalid inputs";
                exit;
            }
        
            $query = "INSERT INTO manual_examfee (ename, NIC, amount, method, refNo, cashCollected) VALUES ('$ename', '$NIC', '$amount', '$method', '$refNo', '$cashCollected')";
        
            $run = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
            if($run){
                header("location:form-3.php");
            } else {
                echo "Form not submitted";
            }
        
        } else {
            echo "Invalid inputs";
        }
            
    }
    else{
        echo "db fail";
    }
