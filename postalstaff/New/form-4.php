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
    <form action="manualVehiclefine.php" method="post" class="form" id="form-1">
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
        <!--step 1 - Vehicle fine payments-->
        <div class="form-step form-step-active" id="step-1">
          <div class="input-group">
            <fieldset class="sec1" data-category="fine">
                <legend>Fine Details</legend>
                <input type="text" name="vehicleNo" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Vehicle No (Ex: wpCAD5399)"> 
                <input type="text" name="address" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Home address"> 
                <input type="date" name="date" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Fined date"> 
                <input type="text" name="DLNo" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Driving License No"> 
                <input type="text" name="PStation" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Police Station Name"> 
                <input type="text" name="NIC" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="NIC">
            </fieldset>
          </div>

            <div class="">
                <a href="#" class="btn btn-next width-50 ml-auto" id="step1-next-btn">Next</a>
            </div>
        </div>


        <!--step 2 -->
        <div class="form-step step-2" id="step-2">

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

        <!--step 3  - cash-->
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

        <!--step 5- card-->
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

</body>
</html>