<?php
    $host="localhost";
    $Hname="root";
    $Hpwd="";
    $dbname =  "paypage";
    $conn=mysqli_connect($host,$Hname,$Hpwd,$dbname); 

    if(isset($_POST['delete'])){
        $id = $_POST['id'];

        $query = "UPDATE utilitybills SET `status` = '0' WHERE id='$id'";
        $run = mysqli_query($conn, $query);

        if($run){
            header("location:billers.php");
        }
        else{
            echo '<script>alert("Data not deleted")</script>';
        }
    }

?>