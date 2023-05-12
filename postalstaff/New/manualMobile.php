<?php
    $host="localhost";
    $Hname="root";
    $Hpwd="";
    $dbname =  "paypage";
    $conn=mysqli_connect($host,$Hname,$Hpwd,$dbname);


    if(mysqli_connect($host,$Hname,$Hpwd,$dbname)){
        //if(!empty($_POST['name']) && !empty($_POST['email'])  && !empty($_POST['accNo']) && !empty($_POST['amount'])){
            if(!empty($_POST['phoneNo']) && !empty($_POST['amount']) && !empty($_POST['cashCollected'])  ){
            //$name = $_POST['name'];
            $phoneNo = $_POST['phoneNo'];
            $amount = $_POST['amount'];
            //$method = $_POST['method'];
            //$refNo = $_POST['refNo'];
	        $cashCollected = isset($_POST['cashCollected']) ? 1 : 0;
    
            $query = "INSERT into manual_mobilebill(phoneNo, amount, cashCollected) values('$phoneNo', '$amount', $cashCollected)";
    
            $run = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
            if($run){
                
                header("location:form-1.php");
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