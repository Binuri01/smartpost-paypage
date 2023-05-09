<?php
    require_once('../config/db.php');
    require_once('../lib/pdo_db.php');
    require_once('Transaction.php');

    //Instantiate customer
    $transaction = new Transaction();

    //Get customer
    $transactions = $transaction->getTransactions();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>View Transactions</title>
</head>
<body>
    <div class="" style="max-width: 100%">
        <div class="btn-group" role="group">
            <a href="customers.php" class="btn btn-secondary" style="text-decoration:none;">Customers</a>
            <a href="transactions.php" class="btn btn-primary"style="text-decoration:none;">Transactions</a>
        </div>
        <hr>
        <h2>Transactions</h2>
        <center><table class="table table-striped">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($transactions as $t): ?>
                    <tr>
                        <td><?php echo $t->id; ?></td>
                        <td><?php echo $t->customer_id; ?></td>
                        <td><?php echo $t->product; ?></td>
                        <td><?php echo sprintf('%.2f',$t->amount/100); ?>
                        <?php echo strtoupper($t->currency); ?></td>
                        <td><?php echo $t->created_at; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table></center>
        <br>
        <p><a href="index.php">Pay Page</p>
    </div>

</body>
</html>