<?php
    $host="localhost";
    $Hname="root";
    $Hpwd="";
    $dbname =  "paypage";
    $conn=mysqli_connect($host,$Hname,$Hpwd,$dbname);

    if(mysqli_connect($host,$Hname,$Hpwd,$dbname)){
            if(!empty($_POST['ename']) && !empty($_POST['amount']) && !empty($_POST['duration'])){
                $ename = $_POST['ename'];
                $amount = $_POST['amount'];
                $duration = $_POST['duration'];
    
                $query = "INSERT into exams(ename, duration, amount) values('$ename', '$duration', $amount)";
    
                $run = mysqli_query($conn, $query) or die(mysqli_error());
    
                if($run){
                    header("location:exams.php");
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