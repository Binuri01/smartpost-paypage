<?php 
    require_once('vendor/autoload.php');
    require_once('../lib/db.php');
    require_once('../admin/Customer.php');
    require_once('../admin/Transaction.php');

    \Stripe\Stripe::setApiKey('sk_test_51MXdaYD6qbEya7gHQ3ishJFCv1cFvX9Lmn7NWN9NrDjdzWXCveQccjYtKKalPeMco1cqulH4Plf7qCCSsXJmzim400JcLIQn4B');

    //Sanitize POST array
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $ename =  $POST['ename'];
    $fname =  $POST['fname'];
    $email = $POST['email'];
    $NIC =  $POST['NIC'];
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
        "description" => "Exam Fee Payments",
        "customer" => $customer->id,
    ));

    //Customer data
    $customerData = [ 
        'id' => $charge->customer,
        'ename' => $ename,
        'fname' => $fname,
        'email' => $email,
        'NIC' => $NIC,
        'amount' => $amount
    ];

    //Instantiate customer
    $customer = new Customer();

    //Add customer to DB
    $customer->addCustomer($customerData);


    //Transaction data
    $transactionData = [ 
        //'id' => $charge->id,
        //'id' => substr(md5(uniqid()), 0, 5), // random transaction ID
        //'id' => time() . rand(1000, 9999),
        'id' => str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT),
        'customer_id' => str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT),
        'product' => $charge->description,
        //'amount' => $charge->amount,
        //'currency' => $charge->currency,
        'status'=> $charge->status,
    ];

    //Instantiate transactions
    $transaction = new Transaction();

    //Add transaction to DB
    $transaction->addTransaction($transactionData);

    //Redirect to success
    header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);
?>