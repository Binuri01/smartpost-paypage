<?php
  require_once('../index.php');
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income Tax Calculator</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <div class="container">
      <h2 style="font-family: 'Poppins', sans-serif;">Income Tax Calculator</h2>
      <h3>Revised Income tax slabs under new tax regime for the financial year 2023-24</h3>
      
  <div class="wrapper">
    <div class="info">
    <p>
        The income tax slabs under the new income tax regime is as follows:
      </p>
      <table class="wrapTable">
        <tbody>
            <tr>
                <td><center>
                    <strong>Tax slabs based on monthly income</strong>
                    </center></td>
                <td><center>
                    <strong>Tax rates</strong>
                    </center></td>
            </tr>
            <tr>
                <td>Up to 1,200,000/12	</td>
                <td>0</td>
            </tr>
            <tr>
                <td>1st 500,000/12	</td>
                <td>6%</td>
            </tr>
            <tr>
                <td>2nd 500,000/12</td>
                <td>12%</td>
            </tr>
            <tr>
                <td>3rd 500,000/12	</td>
                <td>18%</td>
            </tr>
            <tr>
                <td>4th 500,000/12	</td>
                <td>24%</td>
            </tr>
            <tr>
                <td>5th 500,000/12	</td>
                <td>30%</td>
            </tr>

            <tr>
                <td>Above 3,700,000/12	</td>
                <td>36%</td>
            </tr>
        </tbody>
    </table>
  </div>
  <div class="cal">
    <form id="tax-form">
      <div class="form-group">
        <label for="income">Enter your monthly salary</label>
          <input type="number" id="income" name="income" placeholder="Amount (LKR)" required />
      </div>
      <div class="form-group">
        <button onclick="calculatorIncomeTax(income)" type="submit">Calculate Tax</button>
      </div><br>
      <h3 id="tax-result"></h3>
    </form>
  </div>
</div>

      
</div>
    



<script src="script.js"></script>
  </body>
</html>


