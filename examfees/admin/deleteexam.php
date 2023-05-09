<?php
    date_default_timezone_set("Etc/GMT+8");

    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection, 'payments');

    $query = mysqli_query($connection, "SELECT * FROM `exams`");
    $date = date("Y-m-d");

    while($fetch = mysqli_fetch_array($query)){
		
        if(strtotime($fetch['duration']) < strtotime($date)){        
            mysqli_query($connection, "UPDATE `exams` SET `status` = '0' WHERE `id` = '$fetch[id]'") or die(mysqli_error($conn));
		}
	}
?>





