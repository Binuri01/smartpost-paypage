<?php
    $host="localhost";
    $Hname="root";
    $Hpwd="";
    $dbname =  "payments";
    $conn=mysqli_connect($host,$Hname,$Hpwd,$dbname);

    if(mysqli_connect($host,$Hname,$Hpwd,$dbname)){
            if(!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['img']) && !empty($_POST['description'])){
                $name = $_POST['name'];
                $type = $_POST['type'];
                $img = $_POST['img'];
                $description = $_POST['description'];
    
                $query = "INSERT into utilityBills(name, type, img, description) values('$name', '$type', '$img', '$description')";
    
                $run = mysqli_query($conn, $query) or die(mysqli_error());
    
                if($run){
                    
                    header("location:billers.php");
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