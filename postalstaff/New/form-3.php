<?php
  require_once("../../mobile/admin/insert.php");
  require_once("../../utility/admin/insert.php");
  require_once("../../examfees/admin/insert.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>
<body>
<div class="container">
    <form action="#" class="form" id="form-1">
        <h1 class="text-center">Manual Payment Form</h1>
        
        <!-- Progress bar -->
        <div class="progressbar">
          <div class="progress" id="progress"></div>
          
          <div class="progress-step progress-step-active" data-title="Billers"></div>
          <div class="progress-step" data-title="Payment method"></div>
          <div class="progress-step" data-title="Confirmation"></div>
          <div class="progress-step" data-title="Payment Receipt"></div>
        </div>

        <!-- Steps -->
        <!--step 1 - Mobile Bill Payments-->
        <div class="form-step form-step-active" id="step-1">
          <!--<div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" />
          </div>
          <div class="input-group">
            <label for="position">Position</label>
            <input type="text" name="position" id="position" />
          </div>-->
          

          <?php
          $query = "select * from exams WHERE status = 1";
          $run = mysqli_query($conn, $query);
          $check = mysqli_num_rows($run) > 0;

          if ($check) {
            $count = 0;
            while ($row = mysqli_fetch_assoc($run)) {
                if ($count % 3 == 0) {
                    echo '<div class="row">';
                }
                ?>
                  <div class="card" onclick="selectCard(this)">
                    <center>
                      <div class="card-content">
                        <!--<a href="utility.php" style="text-decoration:none"><h2><?php echo $row['name']; ?></h2>-->
                        <h2><?php echo $row['ename']; ?></h2>
                        Deadline:<h3 style="color:red;"><?php echo $row['duration']; ?></h3>
                        <h2>Rs. <?php echo $row['amount']; ?></h2></a>     

                      </div>
                    </center>
                  </div>
              <?php
                    $count++;
                    if ($count % 3 == 0) {
                        echo '</div>';
                    }
            }
                    // Close the row if the total number of cards is not divisible by 3
                    if ($count % 3 != 0) {
                        echo '</div>';
                    }
        } else {
            echo "No Data Found";
            }
        ?>


        <div class="">
            <a href="#" class="btn btn-next width-50 ml-auto" id="step1-next-btn">Next</a>
          </div>
        </div>


        <!--step 2 - Mobile bill payments-->
        <div class="form-step step-2" id="step-2">
         
        <div class="input-group">
            <label for="NIC">NIC</label>
            <input type="NIC" name="NIC" id="NIC" />
        </div>

          <div class="input-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" />
          </div>

          <div class="input-group">
            <label for="method">Select an option:</label>
            <select id="method" name="method">
              
              <option value="cash">Cash</option>
              <option value="card">Card</option>
            </select>
          </div>

          <div class="btns-group">
            <a href="#" class="btn btn-prev disabled">Previous</a>
            <a href="#" class="btn btn-next" id="step2-next-btn">Next</a>
          </div>
        </div>

        <!--step 3 - Mobile bill payments - cash-->
        <div class="form-step step-3">
          <div class="input-group">
            <label>
              <input type="checkbox" name="newsletter" value="subscribe"> Cash Collected
            </label>
          </div>

          <div class="btns-group">
            <a href="#" class="btn btn-prev" id="step3-prev-btn">Previous</a>
            <a href="#" class="btn btn-next" id="step3-next-btn">Next</a>
          </div>
        </div>

        <!--step 4 - payment receipt-->
        <div class="form-step step-4">
          <div class="input-group">
            <h2>✔Payment Successful</h2>
          </div>

          <div class="input-group">
            <label for="email">email</label>
            <input type="email" name="email" id="email" />
          </div>

          <div class="btns-group">
            <a href="#" class="btn download" id="download">Download</a>
            <input type="submit" value="Send" class="btn" id="myForm" />
          </div>
        </div>

        <!--step 5 - Mobile bill payments - card-->
        <div class="form-step step-5">
          <div class="input-group">
            <label for="refNo">refNo</label>
            <input type="text" name="refNo" id="refNo" />
          </div>

          <div class="btns-group">
            <a href="#" class="btn btn-prev" id="step5-prev-btn">Previous</a>
            <a href="#" class="btn btn-next" id="step5-next-btn">Next</a>
          </div>
        </div>

      </form>
        </div>


      <script src="script.js" defer></script>
    <script>
        window.onload = function() {
            // Define variables for each step
        const step1 = document.querySelector('.step-1');
        const step2 = document.querySelector('.step-2');
        const step3 = document.querySelector('.step-3');
        const step4 = document.querySelector('.step-4');
        const step5 = document.querySelector('.step-5');
        const step1NextBtn = document.getElementById('step1-next-btn');
        const step2NextBtn = document.getElementById('step2-next-btn');
        const step3PrevBtn = document.getElementById('step3-prev-btn');
        const step3NextBtn = document.getElementById('step3-next-btn');
        const step4PrevBtn = document.getElementById('step4-prev-btn');
        const step5PrevBtn = document.getElementById('step5-prev-btn');
        const step5NextBtn = document.getElementById('step5-next-btn');

        // Hide all steps except the first one
        step2.style.display = "block";
        step3.style.display = "none";
        step4.style.display = "none";
        step5.style.display = "none";

        step1NextBtn.addEventListener('click', () => {
          step1.style.display = "none";
          step2.style.display = "block";
        });

          // Add click event listener to step 2 next button
        step2NextBtn.addEventListener('click', () => {
          const selectedOption = document.getElementById('method').value;
          if (selectedOption === 'cash') {
            step2.style.display = "none";
            step3.style.display = "block";
          } else if (selectedOption === 'card') {
            step2.style.display = "none";
            step5.style.display = "block";
          }
        });

        // Add click event listener to step 3 next button
        step3NextBtn.addEventListener('click', () => {
          step3.style.display = "none";
          step4.style.display = "block";
        });

        step3PrevBtn.addEventListener('click', () => {
          step3.style.display = "none";
          step2.style.display = "block";
        });

        step5NextBtn.addEventListener('click', () => {
          step5.style.display = "none";
          step4.style.display = "block";
        });

        step5PrevBtn.addEventListener('click', () => {
          step5.style.display = "none";
          step2.style.display = "block";
        });

        // Add click event listener to step 4 submit button
        document.getElementById('myForm').addEventListener('submit', (event) => {
          event.preventDefault();
          alert('Form submitted!');
        });

        // Add click event listener to step 3 previous button
        step3PrevBtn.addEventListener('click', () => {
          step3.style.display = "none";
          step2.style.display = "block";
        });

        // Add click event listener to step 5 next button
        step5NextBtn.addEventListener('click', () => {
          step5.style.display = "none";
          step4.style.display = "block";
        });

        // Add click event listener to step 5 previous button
        step5PrevBtn.addEventListener('click', () => {
          step5.style.display = "none";
          step2.style.display = "block";
        });
        };
        

    </script>
</body>
</html>
