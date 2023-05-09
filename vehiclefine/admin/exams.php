<?php
    require_once('insert.php');

    $query = "select * from exams";
    $run = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>Exam Information</title>
</head>
<body>


    <div class="transactions">
        <h2 class="header">Exam Information</h2>

            <a href='index.php'><button class="add">+ Add Exam</button></a><br>

                <?php
                    require_once('insert.php');

                    $query = "select * from exams";
                    $run = mysqli_query($conn, $query);
                    $check = mysqli_num_rows($run) > 0;

                    if($check){
                        while($row = mysqli_fetch_assoc($run)){
                            ?>

                                <div class="row"> 
                                    <div class="card">
                                        <div class="card-content">
                                            <a href="#" style="text-decoration:none;"><h2><?php echo $row['ename']; ?></h2>
                                            Deadline:<h3 style="color:red;"><?php echo $row['duration']; ?></h3>
                                            <h2 class="card-text">Rs. <?php echo $row['amount']; ?></h2></a>

                                            
                                                <div>
                                                    <form action="deleteExam.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $row ['id']?>">
                                                    <input type="submit" name="delete" class="card-delete" value="Remove">
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>

                            <?php

                        }
                    }
                    else{
                        echo "No Data Found";
                    }

                    ?>

    </div>
</body>
</html>