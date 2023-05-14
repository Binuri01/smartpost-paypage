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
    <form action="manualExam.php" class="form" id="form-3" method="post">
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
        <!--step 1 - Exam fee Payments-->
        <div class="form-step form-step-active" id="step-1">

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
                  <div class="card" onclick="selectCard(this)" data-ename="<?php echo $row['ename']?>">
                    <center>
                      <div class="card-content">
                      <h2 style="font-size:10px"><?php echo $row['ename']; ?></h2>
                      <h3 style="font-size:6px">Deadline:<h3 style="color:red; font-size:7px"><?php echo $row['duration']; ?></h3>
                      <h4 style="font-size:10px">Rs. <?php echo $row['amount']; ?></h4></a>     
                        
                      <h2 hidden><?php echo $row['ename']; ?></h2>
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

        <input id="ename" type="hidden" name="ename">
        <div class="">
            <a href="#" class="btn btn-next width-50 ml-auto" id="step1-next-btn">Next</a>
          </div>
        </div>


        <!--step 2 - Exam fee payments-->
        <div class="form-step step-2" id="step-2">
         
        <div class="input-group">
            <label for="NIC">NIC</label>
            <input type="text" name="NIC" id="NIC" required>
        </div>

          <div class="input-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" required/>
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

        <!--step 3  cash-->
        <div class="form-step step-3">
          <div class="input-group">
            <label>
              <input type="checkbox" name="cashCollected" value="cashCollected"> Cash Collected
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
            <label for="email">email</label>
            <input type="email" name="email" id="email" />
          </div>

          <div class="btns-group">
            <input type="submit" value="Submit" class="btn" id="myForm" />
          </div>
        </div>

        <!--step 5 - card-->
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
          ename.value = card.getAttribute("data-ename");
        }
      </script>
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
