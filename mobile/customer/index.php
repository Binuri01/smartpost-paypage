<?php
    require('../../index.php');
    require_once('../admin/insert.php');

    $query = "select * from utilitybills";
    $run = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../../style.css" />
    <title>Biller Information</title>
</head>
<body>
    

        <div class= "transactions">
            <h2 class="header"><center>MOBILE BILL PAYMENTS</center></h2>
          

                    <?php
                    require_once('../admin/insert.php');

                    $query = "select * from mobile WHERE status = 1";
                    $run = mysqli_query($conn, $query);
                    $check = mysqli_num_rows($run) > 0;

                    if($check){
                      while($row = mysqli_fetch_assoc($run)){
                        ?>

                          <div class="row"> 
                            <div class="card">
                              <center>
                                <div class="card-content">
                                  <img src = "../admin/assets/<?php echo $row['img'];?>" class="card-img">
                                  <a href="utility.php" style="text-decoration:none"><h2><?php echo $row['name']; ?></h2>    
                                  <?php echo $row['description']; ?></a>
                                </div>
                              </center>
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