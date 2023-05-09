function calculateETF(basic) {
    var epf = basic * 0.08;
    var employer_epf = basic * 0.12;
    var employer_etf = basic * 0.03;
    var total = epf + employer_epf + employer_etf;
    return total;
}

function showContributions() {
    var basic = document.getElementById("basic").value;
    var contributions = document.getElementById("contributions");
    var result = document.getElementById("result");
    var button = document.querySelector("button");
  
    if (contributions.style.display === "none") {
      contributions.style.display = "block";
      result.style.display = "block";
      var etf = calculateETF(basic); // Calculate ETF and EPF
  
      // Display contribution amounts
      document.getElementById("epf-contribution").textContent = "LKR " + (basic * 0.08).toFixed(2);
      document.getElementById("employer-epf-contribution").textContent = "LKR " + (basic * 0.12).toFixed(2);
      document.getElementById("employer-etf-contribution").textContent = "LKR " + (basic * 0.03).toFixed(2);
      document.getElementById("total-contribution").textContent = "LKR " + etf.toFixed(2);
    } else {
      contributions.style.display = "none";
      result.style.display = "none";
      button.textContent = "Calculate";
    }
  }
  