<?php
  require_once("../mobile/admin/insert.php");
  require_once("../utility/admin/insert.php");
  require_once("../examfees/admin/insert.php");

?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Slide Button with Two Pages</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  
<div class="slider-container">
  <div class="slider">
    <input type="checkbox" id="slider-input" />
    <label for="slider-input" class="slider-page"></label>
  </div>
</div>
<div class="content-container">
  <div class="page page1">
    <h1>Cash Payments</h1>
    <form action="">

    <!--progress bar-->
    <div class="progressbar">
        <div class="progress" id="progress"></div>
        
        <div class="progress-step progress-step-active" data-title="Personal Details"></div>
        <div class="progress-step" data-title="Biller Details"></div>
        <div class="progress-step" data-title="Payment Details"></div>
        <div class="progress-step" data-title="Payment Receipt"></div>
      </div>

      <!--step 1-->
      <div class="form-step form-step-active" id="step-1">
        <div class="input-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" />

          <label for="email">Email Address</label>
          <input type="text" name="email" id="email" />
        </div>
        <div class="input-group bill-type">
          <label for="mobile-bill"><input type="radio" id="mobile-bill" name="type" value="Mobile Bill Payments">Mobile Bill Payments</label>
          <label for="utility-bill"><input type="radio" id="utility-bill" name="type" value="Utility Bill Payments">Utility Bill Payments</label>
          <label for="exam-fee"><input type="radio" id="exam-fee" name="type" value="Exam Fee Payment">Exam Fee Payments</label>
          <label for="vehicle-fine"><input type="radio" id="vehicle-fine" name="type" value="Vehicle Fine Payment">Vehicle Fine Payments</label>
        </div>


        <div class="">
          <!--<a href="#" class="btn btn-next width-50 ml-auto">Next</a>-->
        </div>
      </div>


      <!--step 2 Mobile Bill Payments-->
      <div class="form-step" id="step-2">

        <?php
                    
          $query = "select * from mobile";
          $run = mysqli_query($conn, $query);
          $check = mysqli_num_rows($run) > 0;

          if($check){
            while($row = mysqli_fetch_assoc($run)){
              ?>

                <div class="row"> 
                  <div class="card" onclick="selectCard(this)">
                    <center>
                      <div class="card-content">
                        <img src = "../mobile/admin/assets/<?php echo $row['img'];?>" class="card-img">
                        <!--<a href="utility.php" style="text-decoration:none"><h2><?php echo $row['name']; ?></h2>-->
                        <h2><?php echo $row['name']; ?></h2>    
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
        
        <br>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <a href="#" class="btn btn-next">Next</a>
        </div>
      </div>

      <!--step-6-->
    <div class="form-step" id="step-6">
      <div class="input-group">
        <label for="phoneNO">Phone Number</label>
        <input type="text" name="phone" id="phone" />
      </div>
      <div class="input-group">
        <label for="Amount">Amount</label>
        <input type="number" name="amount" id="amount"/>
      </div>

      <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
        <input type="submit" name="submit" value="Submit" class="btn btn-submit" />
      </div>
    </div>


      <!--step 3 Utility Bill Payments-->
      <div class="form-step" id="step-3">

        <?php
          $query = "select * from utilitybills";
          $run = mysqli_query($conn, $query);
          $check = mysqli_num_rows($run) > 0;

          if($check){
            while($row = mysqli_fetch_assoc($run)){
              ?>

                <div class="row"> 
                  <div class="card" onclick="selectCard(this)">
                    <center>
                    <img src = "../utility/admin/assets/<?php echo $row['img'];?>" class="card-img">
                      <div class="card-content">
                        <!--<a href="utility.php" style="text-decoration:none"><h2><?php echo $row['name']; ?></h2>-->
                        <h2><?php echo $row['name']; ?></h2>
                        <input type="hidden" name="type" value="<?php echo $row ['type']?>">     

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

        <div class="input-group">
          <label for="email">Email</label>
          <input type="text" name="email" id="email" />
        </div>

        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <a href="#" class="btn btn-next">Next</a>
        </div>
      </div>

      <!--step-7-->
      <div class="form-step" id="step-7">
        <div class="input-group">
          <label for="accNo">Bill Account Number</label>
          <input type="text" name="accNo" id="accNo" />
        </div>
        <div class="input-group">
          <label for="Amount">Amount</label>
          <input type="number" name="amount" id="amount"/>
        </div>

        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <input type="submit" name="submit" value="Submit" class="btn btn-submit" />
        </div>
      </div>

      <!--step 4 Exam Fee Payments-->
      <div class="form-step" id="step-4">

        <?php
          $query = "select * from exams WHERE status = 1";
          $run = mysqli_query($conn, $query);
          $check = mysqli_num_rows($run) > 0;

          if($check){
              $cardIndex = 1; // initialize card index
              while($row = mysqli_fetch_assoc($run)){
                  ?>
                      <div class="row"> 
                          <div class="card" data-step="<?php echo $cardIndex; ?>" onclick="selectCard(this)">
                              <center><div class="card-content">
                                  <!--<a href="checkout.php" style="text-decoration:none"><h2><?php echo $row['ename']; ?></h2>-->
                                  <h2><?php echo $row['ename']; ?></h2>
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

        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <a href="#" class="btn btn-next">Next</a>
        </div>
      </div>


      <!--step-8-->
      <div class="form-step" id="step-8">
        <div class="input-group">
          <label for="NIC">NIC</label>
          <input type="text" name="NIC" id="NIC" />
        </div>
        <div class="input-group">
          <label for="Amount">Amount</label>
          <input type="number" name="amount" id="amount"/>
        </div>

        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <input type="submit" name="submit" value="Submit" class="btn btn-submit" />
        </div>
      </div>


      <!--step 5 Vehicle Fine Payments-->
      <div class="form-step" id="step-5">

        <fieldset class="sec1" data-category="fine">
          <legend>Fine Details</legend>
          <input type="text" name="vehicleNo" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Vehicle No (Ex: wpCAD5399)"> 
          <input type="text" name="address" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Home address"> 
          <input type="date" name="date" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Fined date"> 
          <input type="text" name="DLNo" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Driving License No"> 
          <input type="text" name="PStation" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Police Station Name"> 
          <input type="text" name="NIC" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="NIC">
        </fieldset>
  

        <br>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <a href="#" class="btn btn-next">Next</a>
        </div>
      </div>


      <!--step-9--> 
      <div class="form-step" id="step-9">

        <div class="input-group">
          <label for="Amount">Amount</label>
          <input type="number" name="amount" id="amount"/>
        </div>

        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <input type="submit" name="submit" value="Submit" class="btn btn-submit" />
        </div>
      </div>  

        <!--step-10 - Payment Receipt--> 
      <div class="form-step" id="step-10">

      <h2>✔Payment Successful</h2>

        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <a href="#" class="download">Download</a>
        </div>
      </div>
      


    </form>
  </div>


  <div class="page page2">
    <h1>Card Payments</h1>
    <p>This is the content of page 2.</p>
  </div>
</div>




<script src="script.js"></script>
<script>
    var selectedCards = [];

    function selectCard(card) {
    // Remove the 'selected' class from all cards
    var cards = document.getElementsByClassName('card');
    for (var i = 0; i < cards.length; i++) {
      cards[i].classList.remove('selected');
    }

    // Add the 'selected' class to the clicked card
    card.classList.add('selected');
  }
</script>



<!--next btn of step-2-->
<script>
const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const formSteps = document.querySelectorAll(".form-step");
const submit = document.querySelectorAll(".btn-submit");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    const currentStep = document.querySelector('.form-step-active');
    const radioOption = document.querySelector('input[name="type"]:checked');
    
    if (currentStep.id === '#step-2') {
      
      if (radioOption && radioOption.value === 'Mobile Bill Payments') {   
        location.href = '#step-6';
      
      } else if (radioOption && radioOption.value === 'Utility Bill Payments') {
        location.href = '#step-7';
      
      } else if (radioOption && radioOption.value === 'Exam Fee Payment') {
        location.href = '#step-8';
      
      } else if (radioOption && radioOption.value === 'Vehicle Fine Payment') {
        location.href = '#step-9';
      
      }
    } else {
      formStepsNum++;
      updateFormSteps();
    }
  });
});

/*newly added - check
  // Get all the submit buttons in step-6, 7, 8 and 9
  const submitBtns = document.querySelectorAll('#step-6 input[type="submit"], #step-7 input[type="submit"], #step-8 input[type="submit"], #step-9 input[type="submit"]');

  // Add a click event listener to each submit button
  submitBtns.forEach(submitBtn => {
    submitBtn.addEventListener('click', (event) => {
      event.preventDefault(); // Prevent the form from submitting normally
      window.location.href = '#step-10'; // Redirect to step-10
    });
  });*/

submit.forEach((btn) => {
  btn.addEventListener("click", () => {
    const currentStep = document.querySelector('.form-step-active');

    if (currentStep.id === 'step-6' || currentStep.id === 'step-7' || currentStep.id === 'step-8' || currentStep.id === 'step-9') {
      // do nothing, handled in nextBtns event listener
    } else {
      // handle final step 10
      location.href = "#step-10";
      document.getElementById("step-10").classList.add("form-step-active");
      document.querySelector('.form-step-active').classList.remove("form-step-active");
      document.querySelector('.progress-step[data-title="Payment Receipt"]').classList.add('progress-step-active');
      document.getElementById("progress").style.width = "100%";
    }
  });
});




prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    if (formStepsNum < 0) {
      formStepsNum = 0;
    }
    location.href = "#step-1";
    updateFormSteps();
  });
});


function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  if (formStepsNum == 1) {
    const selectedRadio = document.querySelector('input[name="type"]:checked');
    if (selectedRadio) {
      const radioValue = selectedRadio.value;
      if (radioValue === "Mobile Bill Payments") {

        location.href = "#step-6";
        document.getElementById("step-6").classList.add("form-step-active");
        document.querySelector('.progress-step[data-title="Payment Details"]').classList.add('progress-step-active');
        document.getElementById("progress").style.width = "65%";

      } else if (radioValue === "Utility Bill Payments") {

        location.href = "#step-7";
        document.getElementById("step-7").classList.add("form-step-active");
        document.querySelector('.progress-step[data-title="Payment Details"]').classList.add('progress-step-active');
        document.getElementById("progress").style.width = "70%";

      } else if (radioValue === "Exam Fee Payment") {

        location.href = "#step-8";
        document.getElementById("step-8").classList.add("form-step-active");
        document.querySelector('.progress-step[data-title="Payment Details"]').classList.add('progress-step-active');
        document.getElementById("progress").style.width = "70%";

      } else if (radioValue === "Vehicle Fine Payment") {

        location.href = "#step-9";
        document.getElementById("step-9").classList.add("form-step-active");
        document.querySelector('.progress-step[data-title="Payment Details"]').classList.add('progress-step-active');
        document.getElementById("progress").style.width = "70%";

      }
    }
  } else {
    formSteps[formStepsNum].classList.add("form-step-active");
    document.querySelector(`.progress-step[data-index="${formStepsNum}"]`).classList.add('progress-step-active');
    document.getElementById("progress").style.width = `${(formStepsNum + 1) * 25}%`;
  }
}



const submitBtn = document.querySelector('input[type="submit"]');
submitBtn.addEventListener('click', () => {
  const currentStep = document.querySelector('.form-step-active');
  document.getElementById("step-10").classList.add("form-step-active");
  document.querySelector('.form-step-active').classList.remove('form-step-active');
  //document.querySelector('.progress-step-active')
  document.querySelector('.progress-step[data-title="Payment Receipt"]').classList.add('progress-step-active');
  document.getElementById("progress").style.width = "100%";
  
  if (currentStep.id === 'step-6') {
    location.href = '#step-10';
  } else if (currentStep.id === 'step-7'){
    location.href = '#step-10';
  } else if (currentStep.id === 'step-8'){
    location.href = '#step-10';
  } else if (currentStep.id === 'step-9'){
    location.href = '#step-10';
  } else {
    formSteps[formStepsNum].classList.add("form-step-active");
    document.querySelector(`.progress-step[data-index="${formStepsNum}"]`).classList.add('progress-step-active');
    document.getElementById("progress").style.width = "100%";
  }

});






</script>

</body>
</html>



