<?php

// define variables and set to empty values
$nameErr = $imgErr = $descriptionErr = "";
$name = $img = $description = "";

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Admin-Utility Bill Payments</title>
    <link rel="stylesheet" href="../css/style.css" />

    
  </head>

  <body>
    <!-- Display a payment form -->
    <div class="container">
      <center><h2 class="header">Add Biller Details</h2></center>

      <a href = "billers.php" style="text-decoration:none; float: right;"><button class="view-billers">View All Billers</button></a><br>

      <form id="payment-form" name = "payment-form" onsubmit="return validate()" method="post" action = "insert.php">

          <input type="text" id="name" name="name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Name of the Biller" value="<?php echo $name;?>" required="required"><br>
          <span class="error"> <?php echo $nameErr;?></span>

          <input class="imgupload" id="file" type='file' accept="image/png, image/jpg, image/tiff, image/jpeg " name="file"  required="required"><br><br>
          
          <textarea style="height:150px" id="description" name="description" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Add description" value="<?php echo $description;?>"></textarea><br>
          <span class="error"> <?php echo $descriptionErr;?></span>

          <button id="submit">
            <span id="button-text">Add Biller</span>
          </button>

      </form>
    </div>
    <script src="js/charge.js"></script>
  </body>
</html>
