const form = document.querySelector('#tax-form');
const taxResult = document.querySelector('#tax-result');


function calculatorIncomeTax(income) {
  const annualIncome = income * 12;
  let tax = 0;
  if (annualIncome > 0 && annualIncome <= 1200000) {
    tax = 0;
  } else if (annualIncome > 1200000 && annualIncome <= 1700000) {
    tax = Math.round(((annualIncome - 1200000) / 12) * 0.06);
  } else if (annualIncome > 1700000 && annualIncome <= 2200000) {
    tax =
      Math.round(((500000 / 12) * 0.06) +
      (((annualIncome - 1700000) / 12) * 0.12));
  } else if (annualIncome > 2200000 && annualIncome <= 2700000) {
    tax =
      Math.round(((500000 / 12) * 0.06) +
      ((500000 / 12) * 0.12) +
      (((annualIncome - 2200000) / 12) * 0.18));
  } else if (annualIncome > 2700000 && annualIncome <= 3200000) {
    tax =
      Math.round(((500000 / 12) * 0.06) +
      ((500000 / 12) * 0.12) +
      ((500000 / 12) * 0.18) +
      (((annualIncome - 2700000) / 12) * 0.24));
  } else if (annualIncome > 3200000 && annualIncome <= 3700000) {
    tax =
      Math.round(((500000 / 12) * 0.06) +
      ((500000 / 12) * 0.12) +
      ((500000 / 12) * 0.18) +
      ((500000 / 12) * 0.24) +
      (((annualIncome - 3200000) / 12) * 0.3));
  } else if (annualIncome > 3700000) {
    tax =
      Math.round(((500000 / 12) * 0.06) +
      ((500000 / 12) * 0.12) +
      ((500000 / 12) * 0.18) +
      ((500000 / 12) * 0.24) +
      ((500000 / 12) * 0.3) +
      (((annualIncome - 3700000) / 12) * 0.36));
  }
  return tax.toFixed(2);
}

  

form.addEventListener('submit', (event)=>{
    event.preventDefault();

    const income = Number(form.income.value);
    const tax = calculatorIncomeTax(income);

    //taxResult.textContent = `Your income tax for the monthly income of ${income} is LKR ${tax}`;
    taxResult.textContent = `Your income tax is LKR ${tax}`;
})


/*function calculatorIncomeTax(income) {
  const annualIncome = income * 12;
  let tax = 0;
  let taxSlabs = [
    {slab: "Up to 1,200,000/12", rate: "6%", amount: 0},
    {slab: "2nd 500,000/12", rate: "12%", amount: 0},
    {slab: "3rd 500,000/12", rate: "20%", amount: 0},
    {slab: "4th 500,000/12", rate: "24%", amount: 0},
    {slab: "5th 500,000/12", rate: "30%", amount: 0},
    {slab: "Above 3,700,000/12", rate: "34%", amount: 0}
  ];

  if (annualIncome > 0 && annualIncome <= 1200000) {
    taxSlabs[0].amount = 0;
    tax = 0;
  } else if (annualIncome > 1200000 && annualIncome <= 1700000) {
    taxSlabs[0].amount = Math.round(((annualIncome - 1200000) / 12) * 0.06);
    tax = taxSlabs[0].amount;
  } else if (annualIncome > 1700000 && annualIncome <= 2200000) {
    taxSlabs[0].amount = Math.round(((500000 / 12) * 0.06));
    taxSlabs[1].amount = Math.round(((annualIncome - 1700000) / 12) * 0.12);
    tax = taxSlabs[0].amount + taxSlabs[1].amount;
  } else if (annualIncome > 2200000 && annualIncome <= 2700000) {
    taxSlabs[0].amount = Math.round(((500000 / 12) * 0.06));
    taxSlabs[1].amount = Math.round(((500000 / 12) * 0.12));
    taxSlabs[2].amount = Math.round(((annualIncome - 2200000) / 12) * 0.18);
    tax = taxSlabs[0].amount + taxSlabs[1].amount + taxSlabs[2].amount;
  } else if (annualIncome > 2700000 && annualIncome <= 3200000) {
    taxSlabs[0].amount = Math.round(((500000 / 12) * 0.06));
    taxSlabs[1].amount = Math.round(((500000 / 12) * 0.12));
    taxSlabs[2].amount = Math.round(((500000 / 12) * 0.18));
    taxSlabs[3].amount = Math.round(((annualIncome - 2700000) / 12) * 0.24);
    tax = taxSlabs[0].amount + taxSlabs[1].amount + taxSlabs[2].amount + taxSlabs[3].amount;
    } else if (annualIncome > 3200000 && annualIncome <= 3700000) {
    taxSlabs[0].amount = Math.round(((500000 / 12) * 0.06));
    taxSlabs[1].amount = Math.round(((500000 / 12) * 0.12));
    taxSlabs[2].amount = Math.round(((500000 / 12) * 0.18));
    taxSlabs[3].amount = Math.round(((500000 / 12) * 0.24));
    taxSlabs[4].amount = Math.round(((annualIncome - 3200000) / 12) * 0.3);
    tax = taxSlabs[0].amount + taxSlabs[1].amount + taxSlabs[2].amount + taxSlabs[3].amount + taxSlabs[4].amount;
    } else if (annualIncome > 3700000) {
    taxSlabs[0].amount = Math.round(((500000 / 12) * 0.06));
    taxSlabs[1].amount = Math.round(((500000 / 12) * 0.12));
    taxSlabs[2].amount = Math.round(((500000 / 12) * 0.18));
    taxSlabs[3].amount = Math.round(((500000 / 12) * 0.24));
    taxSlabs[4].amount = Math.round(((500000 / 12) * 0.3));
    taxSlabs[5].amount = Math.round(((annualIncome - 3700000) / 12) * 0.34);
    tax = taxSlabs[0].amount + taxSlabs[1].amount + taxSlabs[2].amount + taxSlabs[3].amount + taxSlabs[4].amount + taxSlabs[5].amount;
    }
}



form.addEventListener('submit', (event)=>{
  event.preventDefault();

  const tax = calculatorIncomeTax(income);

  const income = document.getElementById("income").value;
  const taxResult = document.getElementById("tax-result");
  const table = document.createElement("table");

  let headerRow = document.createElement("tr");
  let slabHeader = document.createElement("th");
  slabHeader.textContent = "Slab";
  headerRow.appendChild(slabHeader);

  let rateHeader = document.createElement("th");
  rateHeader.textContent = "Rate";
  headerRow.appendChild(rateHeader);

  let amountHeader = document.createElement("th");
  amountHeader.textContent = "Amount";
  headerRow.appendChild(amountHeader);

  table.appendChild(headerRow);

  ({tax, taxSlabs} = calculatorIncomeTax(income));

  for (let i = 0; i < taxSlabs.length; i++) {
    let row = document.createElement("tr");
    let slabCell = document.createElement("td");
    slabCell.textContent = taxSlabs[i].slab;
    row.appendChild(slabCell);

    let rateCell = document.createElement("td");
    rateCell.textContent = taxSlabs[i].rate;
    row.appendChild(rateCell);

    let amountCell = document.createElement("td");
    amountCell.textContent = taxSlabs[i].amount;
    row.appendChild(amountCell);

    table.appendChild(row);
  }

  taxResult.innerHTML = "";
  taxResult.appendChild(table);
})*/






























