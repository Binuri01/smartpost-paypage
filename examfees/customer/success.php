<?php
    require_once('../../index.php');
    /*if(!empty($_GET['tid'] && !empty($_GET['product']))){
        $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

        $tid = $GET['tid'];
        $product = $GET['product'];
    } else{
        header('Location: index.php');
    }*/
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../../style.css" />
    <title>Document</title>
</head>
<body>
    <center><div class="container mt-4">
        <!--<div id="progress">
            <div id="progress-bar" style="background: lightseagreen;"></div>
                <ul id="progress-num">
                    <li class="step active">1</li>
                    <li class="step active">2</li>
                    <li class="step active">3</li>
                </ul>
        </div>-->

        <div>
            <br><br>
            <center><img style="height:50px; width:50px;" src="assets/success.png"><br>
            Payment Successful! </center><br><br>
        </div>

        <div class="button-container">
            <form action="pdf_gen.php" method="POST">
                <button style="background-color:#28a745; border-color: #28a745; cursor:pointer;" type="submit" name="btn_pdf" class="btn btn-success download">Download Receipt</button>
            </form>
        </div>
        <div class="button-container">
            <p><a href="index.php" class="btn btn-light mt-2 back" style="text-decoration:none;">Back</a></p>
        </div>

        

</body>
</html>