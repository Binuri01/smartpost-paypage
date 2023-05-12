<?php
    $host="localhost";
    $Hname="root";
    $Hpwd="";
    $dbname =  "paypage";
    $conn=mysqli_connect($host,$Hname,$Hpwd,$dbname);


    if(mysqli_connect($host,$Hname,$Hpwd,$dbname)){
        //if(!empty($_POST['name']) && !empty($_POST['email'])  && !empty($_POST['accNo']) && !empty($_POST['amount'])){
            if(!empty($_POST['vehicleNo']) && !empty($_POST['address']) && !empty($_POST['date']) && !empty($_POST['DLNo']) && !empty($_POST['PStation']) && !empty($_POST['NIC']) && !empty($_POST['amount']) && !empty($_POST['cashCollected'])  ){
            $vehicleNo = $_POST['vehicleNo'];
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $date = $_POST['date'];
            $DLNo = $_POST['DLNo'];
            $PStation = $_POST['PStation'];
            $NIC = $_POST['NIC'];
            $amount = $_POST['amount'];
            //$method = $_POST['method'];
            //$refNo = $_POST['refNo'];
	        $cashCollected = isset($_POST['cashCollected']) ? 1 : 0;
    
            $query = "INSERT into manual_examfee(vehicleNo,address, date, DLNo, PStation, NIC, amount, cashCollected) values('$vehicleNo', '$address', '$date', '$DLNo', '$PStation', '$NIC', '$amount', '$cashCollected')";
    
            $run = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
            if($run){
                
                header("location:form-4.php");
            }else{
                echo "Form not submitted";
            }
        }
        else{
            echo "Invalid inputs";
        }
    }
    else{
        echo "db fail";
    }    

?>