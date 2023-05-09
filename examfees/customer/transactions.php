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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                    <th>Action</th>
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
                        <td>
                            <a href="#delete" class="delete" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete" style="color: red;"> &#xE872; </i> 
                            </a>  

                            <a href="#" class="view">
                                <i class="material-icons" title="View" style="color: blue;">visibility</i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table></center>


         <!------delete modal------->
         <div class="modal fade" tabindex="-1" id="delete" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <p>Are You sure you want to delete this record?</p>
                            <p class="text-warning"><small>this action cannot be undone</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success"> Delete </button>
                    </div>
                </div>
            </div>
        </div>
        <!-------end of delete modal---------->



        <br>
        <p><a href="index.php">Pay Page</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/charge.js"></script>
</body>
</html>




