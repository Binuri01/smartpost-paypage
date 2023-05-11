<?php
    $host="localhost";
    $Hname="root";
    $Hpwd="";
    $dbname =  "paypage";
    $conn=mysqli_connect($host,$Hname,$Hpwd,$dbname); 

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "UPDATE mobile SET `status` = '1' WHERE id='$id'";
        $run = mysqli_query($conn, $query);

        if($run){
            header("location:archive.php");
        }
        else{
            echo '<script>alert("Data not updated")</script>';
        }
    }
?>
