<?php
    $host="localhost";
    $Hname="root";
    $Hpwd="";
    $dbname =  "paypage";
    $conn=mysqli_connect($host,$Hname,$Hpwd,$dbname);

    if(mysqli_connect($host,$Hname,$Hpwd,$dbname)){
            if(!empty($_POST['name']) && !empty($_POST['phoneNo']) && !empty($_POST['amount']) && !empty($_POST['method']) && !empty($_POST['refNo'])){
                $name = $_POST['name'];
                $phoneNo = $_POST['phoneNo'];
                $amount = $_POST['amount'];
                $method = $_POST['method'];
                $refNo = $_POST['refNo'];
    
                $query = "INSERT into manual_mobilebill(name, phoneNo, amount, method, refNo) values('$name', '$phoneNo', '$amount', '$method', $refNo)";
    
                $run = mysqli_query($conn, $query) or die(mysqli_error());
    
                if($run){
                    
                    header("location:index.php");
                }else{
                    echo "Form not submitted";
                }
    
            }
            
            else{
                //echo "Invalid inputs";
            }
        }
    else{
        echo "db fail";
    }    

    
?>