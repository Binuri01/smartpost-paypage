<?php
  require_once('../index.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EPF/ETF Calculator</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="calculator">
  <form id="EPF-form">
    <div class="form-group">
      <label for="income">Enter Your Basic Salary:</label>
      <input type="number" id="basic" name="basic" placeholder="Amount (LKR)" required />
    </div>
    <div class="form-group">
      <button onclick="showContributions()" type="button">Calculate</button>
    </div>
    <div id="contributions" style="display: none;">
      <h2>Employee Contribution</h2>
      <hr>
      <h3>EPF (8%)<span id="epf-contribution"></span></h3>
        <br>
      <h2>Employer Contribution</h2>
      <hr>
      <h3>EPF (12%)<span id="employer-epf-contribution"></span></h3>

      <h3>ETF (3%)<span id="employer-etf-contribution"></span></h3>
      <!--<p id="employer-etf-contribution"></p>-->
  
      <br>
      <h3>Total EPF+ETF (23%)<span id="total-contribution"></span></h3>
      <!--<p id="total-contribution"></p>-->
    </div>
    <h3 id="result" style="display: none;"></h3>
  </form>
</div>



    <script src="script.js"></script>
</body>
</html>