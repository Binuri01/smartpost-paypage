<?php 
    require_once('vendor/autoload.php');
    require_once('../lib/db.php');
    require_once('../admin/Customer.php');
    require_once('../admin/Transaction.php');

    \Stripe\Stripe::setApiKey('sk_test_51MXdaYD6qbEya7gHQ3ishJFCv1cFvX9Lmn7NWN9NrDjdzWXCveQccjYtKKalPeMco1cqulH4Plf7qCCSsXJmzim400JcLIQn4B');

    // Connect to database
    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    //Sanitize POST array
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $name =  $POST['name'];
    $fname =  $POST['fname'];
    $mobileNo = $POST['mobileNo'];
    $email = $POST['email'];
    $amount = $POST['amount'];
    $token = $POST['stripeToken'];


    // Create customer in stripe
    $customer = \Stripe\Customer::create(array(
        "email" => $email,
        "source" => $token,
    ));

    // Charge customer
    $charge = \Stripe\Charge::create(array(
        "amount" => 50000,
        "currency" => "lkr",
        "description" => "Mobile Bill Payments",
        "customer" => $customer->id,
    ));

    //Customer data
    $customerData = [ 
        'id' => $charge->customer,
        'name' => $name,
        'mobileNo' => $mobileNo,
        'fname' => $fname,
        'email' => $email,
        'amount' => $amount
    ];

    //Instantiate customer
    $customer = new Customer($db);

    //Add customer to DB
    $customer->addCustomer($customerData);


    //Transaction data
    $transactionData = [ 
        'id' => str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT),
        'customer_id' => str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT),
        'product' => $charge->description,
        //'amount' => $charge->amount,
        //'currency' => $charge->currency,
        'status'=> $charge->status,
    ];

    //Instantiate transactions
    $transaction = new Transaction($db);

    //Add transaction to DB
    $transaction->addTransaction($transactionData);

    //Redirect to success
    header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);
?>
