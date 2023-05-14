<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../../style.css">
    <title>Pay Page</title>
</head>
<body>
    <div class="container">
        <h2 class="my-4 text-center">Vehicle Fine Payments</h2>
            <form action="charge.php" method="post" id="payment-form">
                <div class="form-row">
                    
                    <fieldset class="sec1" data-category="fine">
                        <legend>Fine Details</legend>
                        <input type="text" name="vehicleNo" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Vehicle No (Ex: wpCAD5399)"> 
                        <input type="text" name="address" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Home address"> 
                        <input type="date" name="date" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Fined date"> 
                        <input type="text" name="DLNo" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Driving License No"> 
                        <input type="text" name="PStation" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="Police Station Name"> 
                        <input type="text" name="NIC" class="form-control mb-3 StripeElement StripeElement--empty"placeholder="NIC">
                    </fieldset>
                
                    <fieldset class="sec2" data-category="payment">
                        <legend>Payment Information</legend>
                        <input type="text" name="name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Full Name">
                        <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address"> 
                        <input type="number" name="amount" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Vehicle Fine Amount"> 
                    
                        <div id="card-element" class="form-control">
                            <!--a Stripe element will be inserted here-->
                        </div>
                    </fieldset>

                    <!--used to display form error--> 
                    <div id="card-errors" role="alert"></div>

                </div>
                <br>
                <button>Submit Payment</button>
            </form>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="../js/charge.js"></script>

</body>
</html>