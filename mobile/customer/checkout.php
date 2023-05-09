<?php
    require('../../index.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../../style.css" />
    <title>Pay Page</title>
</head>
<body>
    <div class="container">
        <h2 class="my-4 text-center">Mobile Bill Payments</h2>
        <form action="./charge.php" method="post" id="payment-form">
        <div class="form-row">
            <input type="text" name="name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Full Name">
            <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address"> 
            <input type="number" name="amount" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Bill Amount"> 

            <?php
            require_once('../admin/insert.php');

            $query = "select * from mobile";
            $run = mysqli_query($conn, $query);
            $check = mysqli_num_rows($run) > 0;

            if($check){
              while($row = mysqli_fetch_assoc($run)){
          ?>

                <input type="hidden" name="mobileNo" value="<?php echo $row ['mobileNo']?>">  

                <?php                 
              }
            }
            else{
              echo "No Data Found";
            }

            ?>



            <div id="card-element" class="form-control">
                <!--a Stripe element will be inserted here-->
            </div>

            <!--used to display form error--> 
            <div id="card-errors" role="alert"></div>
        </div>

        <button>Submit Payment</button>
    </form>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="../js/charge.js"></script>

</body>
</html>