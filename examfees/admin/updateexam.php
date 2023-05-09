<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'payments');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $ename = $_POST['ename'];
        $duration = $_POST['duration'];
        $amount = $_POST['amount'];

        $query = "UPDATE exams SET ename='$ename', duration='$duration', amount=' $amount' WHERE id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>