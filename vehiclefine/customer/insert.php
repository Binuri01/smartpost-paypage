<?php
    $host="localhost";
    $Hname="root";
    $Hpwd="";
    $dbname =  "project";
    $conn=mysqli_connect($host,$Hname,$Hpwd,$dbname);


    if(mysqli_connect($host,$Hname,$Hpwd,$dbname)){
        if(!empty($_POST['name']) && !empty($_POST['email'])  && !empty($_POST['accNo']) && !empty($_POST['amount'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $accNo = $_POST['accNo'];
            $amount = $_POST['amount'];
           
    
            $query = "INSERT into utility(name, email, accNo, amount) values('$name', '$email', '$accNo', '$amount')";
    
            $run = mysqli_query($conn, $query) or die(mysqli_error());
    
            if($run){
                
                header("location:utility.php");
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