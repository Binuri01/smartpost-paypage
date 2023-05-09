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
    <link rel="stylesheet" href="css/style.css" />

    
  </head>

  <body>
    <!-- Display a payment form -->
    <div class="form">
      <h2 class="header">Add Biller Details</h2>

      <a href = "billers.php" style="text-decoration:none;"><button class="view-billers">View All Billers</button></a>
  
      <form id="payment-form" name = "payment-form" onsubmit="return validate()" method="post" action = "insert.php">

        <div id="card-element">
          <input type="text" id="name" name="name" placeholder="Name of the Biller" value="<?php echo $name;?>" required="required"><br>
          <span class="error"> <?php echo $nameErr;?></span>

          <button><input type="radio" id="type" name="type" value="Electricity Bill">Electricity Bill</button>
          <button><input type="radio" id="type" name="type" value="Water Bill">Water Bill</button>
          <button><input type="radio" id="type" name="type" value="Telephone Bill">Telephone Bill</button>
          <button><input type="radio" id="type" name="type" value="Other">Other</button><br>

          <input class="imgupload" id="img" type='file' accept="image/png, image/jpg, image/tiff, image/jpeg " name="img" required="required"><br>
          
          <textarea id="description" name="description" placeholder="Add description" value="<?php echo $description;?>" required="required"></textarea><br>
          <span class="error"> <?php echo $descriptionErr;?></span>

          <button id="submit">
            <span id="button-text">Add Biller</span>
          </button>

        </div>
      </form>
    </div>
    <script src="js/charge.js"></script>
  </body>
</html>
