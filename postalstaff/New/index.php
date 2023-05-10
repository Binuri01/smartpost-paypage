<?php
  require_once("../../mobile/admin/insert.php");
  require_once("../../utility/admin/insert.php");
  require_once("../../examfees/admin/insert.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />

    <title>Manual Payments</title>
  </head>
  
  <body>
  <div class="container">
  
    <div class="options">
      <div class="input-group bill-type">
        <label for="mobile-bill"><input type="radio" id="mobile-bill" class="btn" name="type" value="Mobile Bill Payments" data-src="form-1.php">Mobile Bill Payments</label>
        <label for="utility-bill"><input type="radio" id="utility-bill" class="btn"  name="type" value="Utility Bill Payments" data-src="form-2.php">Utility Bill Payments</label>
        <label for="exam-fee"><input type="radio" id="exam-fee" class="btn" name="type" value="Exam Fee Payment" data-src="form-3.php">Exam Fee Payments</label>
        <label for="vehicle-fine"><input type="radio" id="vehicle-fine" class="btn" name="type" value="Vehicle Fine Payment" data-src="form-4.php">Vehicle Fine Payments</label>
      </div>
    </div>

      <iframe id="iframe" src="form-1.php"></iframe>
    
    </div>

    <script src="script.js" defer></script>
    <script>
        // Define variables for each step
        const step1 = document.getElementById('.step-1');
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

    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('input[type="radio"]').click(function() {
      var src = $(this).data('src');
      $('#iframe').attr('src', src);
    });
  });
</script>

    <!--<script>
      // Define variables for the radio buttons and forms
      const mobileBillRadio = document.getElementById('mobile-bill');
      const utilityBillRadio = document.getElementById('utility-bill');
      const examFeeRadio = document.getElementById('exam-fee');
      const vehicleFineRadio = document.getElementById('vehicle-fine');
      const form1 = document.getElementById('form-1');
      const form2 = document.getElementById('form-2');
      const form3 = document.getElementById('form-3');
      const form4 = document.getElementById('form-4');

      // Add event listener to the radio buttons
      mobileBillRadio.addEventListener('click', function() {
        form1.style.display = 'block';
        form2.style.display = 'none';
        form3.style.display = 'none';
        form4.style.display = 'none';
      });

      utilityBillRadio.addEventListener('click', function() {
        form1.style.display = 'none';
        form2.style.display = 'block';
        form3.style.display = 'none';
        form4.style.display = 'none';
      });

      examFeeRadio.addEventListener('click', function() {
        form1.style.display = 'none';
        form2.style.display = 'none';
        form3.style.display = 'block';
        form4.style.display = 'none';
      });

      vehicleFineRadio.addEventListener('click', function() {
        form1.style.display = 'none';
        form2.style.display = 'none';
        form3.style.display = 'none';
        form4.style.display = 'block';
      });
    </script>-->
  </body>
</html>
