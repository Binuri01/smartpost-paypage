<?php
require('../../index.php');
require_once  ("../admin/insert.php");

// define variables and set to empty values
$nameErr = $emailErr = $mobileNoErr = $amountErr = "";
$name = $email = $mobileNo = $amount = "";

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Customer MOBILE Bill Payment Form</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../../style.css" />

  </head>

  <body>
    <!-- Display a payment form -->
    <center><div class="container" style="max-width: 40%">  
      <h2 class="header"> MOBILE BILL PAYMENTS</h2>
      <form id="payment-form" name = "payment-form" onsubmit="return validate()" method="post" action = "checkout.php">

        <div class="form-row">

          <input type="text" name="mobileNo" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Enter Mobile Number" value="<?php echo $mobileNo;?>" required="required"><br>
          <span class="error"> <?php echo $mobileNoErr;?></span>

            
          <button id="submit">
            <span id="button-text">Verify Mobile Number</span>
          </button>

        </div>
      </form>
    </div>
</center>

    <script src="js/charge.js"></script>
  </body>
</html>