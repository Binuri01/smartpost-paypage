<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'payments');

if(isset($_POST['insertdata']))
{
    $ename = $_POST['ename'];
    $duration = $_POST['duration'];
    $amount = $_POST['amount'];

    $query = "INSERT INTO exams (`ename`,`duration`,`amount`, `status`) VALUES ('$ename','$duration','$amount', '1')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>
