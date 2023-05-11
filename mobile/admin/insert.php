<?php
    $host="localhost";
    $Hname="root";
    $Hpwd="";
    $dbname =  "paypage";
    $conn=mysqli_connect($host,$Hname,$Hpwd,$dbname);

    if(mysqli_connect($host,$Hname,$Hpwd,$dbname)){
            if(!empty($_POST['name']) && !empty($_POST['img']) && !empty($_POST['description'])){
                $name = $_POST['name'];
                $img = $_POST['img'];
                $description = $_POST['description'];
    
                $query = "INSERT into mobile(name, img, description, status) values('$name', '$img', '$description', 1)";
    
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