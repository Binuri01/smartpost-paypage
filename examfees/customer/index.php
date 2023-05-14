<?php
    require('../../index.php');
    require_once('../admin/insert.php');

    $query = "select * from exams";
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
    <title>Exam Information</title>
</head>
<body>
    

        <div class= "transactions">
            <h2 class="header"><center>Available Exams</center></h2>
            <div id="progress">
                
                    <?php
                    require_once('../admin/insert.php');

                    $query = "select * from exams WHERE status = 1";
                    $run = mysqli_query($conn, $query);
                    $check = mysqli_num_rows($run) > 0;

                    if($check){
                        $cardIndex = 1; // initialize card index
                        while($row = mysqli_fetch_assoc($run)){
                            ?>

                                <div class="row"> 
                                    <div class="content-card" data-step="<?php echo $cardIndex; ?>">
                                        <center><div class="card-content">
                                            <a onclick="selectCard(this)" data-name="<?php echo $row['ename']?>" href="checkout.php" style="text-decoration:none"><h2><?php echo $row['ename']; ?></h2>
                                            Deadline:<h3 style="color:red;"><?php echo $row['duration']; ?></h3>
                                            <h2>Rs. <?php echo $row['amount']; ?></h2></a>
                                        </div></center>
                             
                                    </div>
                                </div>

                            <?php
                            $cardIndex++; // increment card index

                            
                        }
                    }
                    else{
                        echo "No Data Found";
                    }
                    ?>
                <input id="name" type="hidden" name="name">
             </div>
        
             <script>
          var selectedCards = [];

          function selectCard(card) {
          // Remove the 'selected' class from all cards
          const cards = document.getElementsByClassName('card');
          const ename = document.getElementById('ename');

          for (let i = 0; i < cards.length; i++) {
            cards[i].classList.remove('selected');
          }

          // Add the 'selected' class to the clicked card
          card.classList.add('selected');
          ename.value = card.getAttribute("data-name");
        }
      </script>
</body>
</html>