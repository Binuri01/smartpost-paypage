<?php

    require_once('../../index.php');
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
        <h2 class="my-4 text-center">Exam Fee Payments</h2>

        <!--<div id="progress">
            <div id="progress-bar" style="background: lightseagreen;"></div>
                <ul id="progress-num">
                    <li class="step active">1</li>
                    <li class="step active">2</li>
                    <li class="step">3</li>
                </ul>
        </div>-->
        
    <form action="./charge.php" method="post" id="payment-form">
        <div class="form-row">
            <input type="text" name="name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Full Name">
            <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address"> 
            <input type="text" name="NIC" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="NIC">
            <input type="number" name="amount" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Exam Fee Amount"> 

            <?php
            require_once('../admin/insert.php');

            $query = "select * from exams";
            $run = mysqli_query($conn, $query);
            $check = mysqli_num_rows($run) > 0;

            if($check){
              while($row = mysqli_fetch_assoc($run)){
          ?>

                <!--<input type="hidden" name="type" value="<?php echo $row ['type']?>"> --> 

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

        <div class="button-group">
            <button class="submit-button">Submit</button>
            <button><a href="index.php" id="progress-prev" class="prev" style="text-decoration:none; color:white">Back</button>
        </div>
    </form>
 

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="../js/charge.js"></script>

    <script>
            const progressBar = document.getElementById("progress-bar");
            //const progressNext = document.getElementById("progress-next");
            const progressPrev = document.getElementById("progress-prev");
            const steps = document.querySelectorAll(".step");
            let active = 2;

            // add event listener to each card
            document.querySelectorAll(".card").forEach(card => {
                card.addEventListener("click", () => {
                    // get step index from card data attribute
                    const stepIndex = parseInt(card.getAttribute("data-step"));
                    active = stepIndex;
                    updateProgress();
                });
            });

            progressPrev.addEventListener("click", () => {
            active--;
                if (active < 1) {
                    active = 1;
            }
            updateProgress();
            });

            const updateProgress = () => {
                steps.forEach((step, i) => {
                    if (i < active) {
                        step.classList.add("active");
                    } else {
                        step.classList.remove("active");
                    }
                });
                progressBar.style.width = ((active - 1) / (steps.length - 1)) * 100 + "%";
                if (active === 1) {
                    progressPrev.disabled = true;
                } else if (active === steps.length) {
                    progressNext.disabled = true;
                } else {
                    progressPrev.disabled = false;
                    progressNext.disabled = false;
                }
            };
        </script>
</body>
</html>