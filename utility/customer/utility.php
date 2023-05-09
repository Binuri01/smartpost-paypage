<?php
require('../../index.php');
require_once  ("../admin/insert.php");

// define variables and set to empty values
$nameErr = $emailErr = $accNoErr = $amountErr = "";
$name = $email = $accNo = $amount = "";

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Customer Utility Bill Payment Form</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../../style.css" />

  </head>

  <body>
    <center>
    <!-- Display a payment form -->
    <div class="container" style="max-width: 40%">  
      <h2 class="header"> UTILITY BILL PAYMENTS</h2>
      <form id="payment-form" name = "payment-form" onsubmit="return validate()" method="post" action = "checkout.php">

        <div id="card-element">

          <input type="text" name="accNo" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Enter Account Number" value="<?php echo $accNo;?>" required="required"><br>
          <span class="error"> <?php echo $accNoErr;?></span>
    

          <?php
            require_once('../admin/insert.php');

            $query = "select * from utilitybills";
            $run = mysqli_query($conn, $query);
            $check = mysqli_num_rows($run) > 0;

            if($check){
              while($row = mysqli_fetch_assoc($run)){
          ?>

                <input type="hidden" name="type" value="<?php echo $row ['type']?>">  

                <?php                 
              }
            }
            else{
              echo "No Data Found";
            }

            ?>
            
          <button id="submit">
            <span id="button-text">Verify Account Number</span>
          </button>

        </div>
      </form>
    </div>
    </center>

    <script src="js/charge.js"></script>
  </body>
</html>