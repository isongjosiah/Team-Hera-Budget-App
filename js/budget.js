/* js file for budget page */
window.onload = () => {
  let editableBudgets = document.getElementsByClassName("editableBudget");
  console.log(editableBudgets);
    for(i = 0; i < editableBudgets.length; i++){
      editableBudgets.item(i).addEventListener("keyup",(event) => {
        if(event.keyCode === 13){
          //event.preventDefault();
          console.log("works!");
          }
          console.log("hey");
      });
    
    }
}
const addBudgetForm = document.getElementById("budgetform");
const budgetResponseMessage = document.getElementById("budgetResponseMessage");  //contains please enter a valid budget message
const expenseResponseMessage = document.getElementById(
  "expenseResponseMessage"
);
const addedBudgetResponseMessage = document.getElementById(
  "addedBudgetResponseMessage"
);
// const addedExpenseResponseMessage document.getElementById('addedExpenseResponseMessage');


const addExpenseForm = document.querySelector("#expenseform");
const calculateBtn = document.getElementById("calculate");
const table = document.getElementById("table");
const tbody= document.getElementById("tbody");

const expenseArray = [];
let Budget = {};
let userBudget;
let totalBudget;
let balance;

//  Adding New Budget
addBudgetForm.addEventListener("submit", event => {
  event.preventDefault();
  userBudget = document.getElementById("userbudget").value;

  if (userBudget <= 0 || userBudget === "" || userBudget === null) {
    budgetResponseMessage.append("Please, enter a valid budget.");
    setTimeout(function() {
      budgetResponseMessage.remove();
      addBudgetForm.reset();
    }, 2000);
    // setTimeout(function () {
    //   budgetResponseMessage.append('Please, enter a valid budget.'), 1000);
    // budgetResponseMessage.append('Please, enter a valid budget.');
  } else {
    budgetResponseMessage.textContent = null;
    // send Success Message
    addedBudgetResponseMessage.append("Budget added.");
    document.getElementById("userbudget").setAttribute("readonly", true);
    document.getElementById("budgetButton").setAttribute("disabled", true);

    // initiate new budget
    const budgetValue = parseInt(userBudget);
    Budget.totalBudget = budgetValue;
  }
});

//   Adding New Expense
addExpenseForm.addEventListener("submit", event => {
  event.preventDefault();

  let expenseName = document.querySelector("#expensename").value;
  const priorities = document.querySelector("#priorities");
  let priority = priorities.options[priorities.selectedIndex].value;
  console.log(expenseName);
  console.log(priority);

  if (expenseName.length < 2 || expenseName === "") {
    expenseResponseMessage.append("Please, enter a valid budget title.");
  } else {
    const newExpense = { expenseName, priority };
    expenseArray.push(newExpense);
    expenseResponseMessage.textContent = null;
    // Send Success MEssage
    addedExpenseResponseMessage.append(`Added "${expenseName}" to Budget.`);


    // Render table here
    const tr = document.createElement("tr");
    
    const _id = expenseName.trim().slice(0, 2);
    tr.innerHTML = `
    <td> <span class="budget-icon"> ${_id}  </span> </td>
    <td> ${expenseName}  </td>
    <td> ${priority}  </td>
    <td>₦... </td>
    <hr>
    `;

    console.log(tr);

    table.append(tr);

    // console.log(expenseArray);

    expenseName = document.querySelector("#expensename");
    expenseName.value = null;
    expenseName = null;

    setTimeout(function() {
      addedExpenseResponseMessage.textContent = null;
    }, 1000);
  }
});

// Calculate Budget
const calculateBudget = async () => {
  let totalPriority = 0;
  let totalInversePriority = 0;
  let totalFundAllocated = 0;

  await expenseArray.map(expense => {
    totalPriority = eval(parseInt(totalPriority) + parseInt(expense.priority));
  });

  await expenseArray.map(expense => {
    expense.inversePriority = eval(parseInt(totalPriority) - expense.priority);
  });

  await expenseArray.map(expense => {
    totalInversePriority = eval(
      parseInt(totalInversePriority) + parseInt(expense.inversePriority)
    );
  });

  await expenseArray.map(expense => {
    expense._id = expense.expenseName.trim().slice(0, 2);
  });

  await expenseArray.map(expense => {
    const { inversePriority } = expense;
    // console.log(inversePriority, totalPriority);
    calculateFundAllocated = Math.floor(
      eval(
        (parseInt(inversePriority) / parseInt(totalInversePriority)) *
          parseInt(Budget.totalBudget)
      )
    );
    const FundsAllocated = roundDown(calculateFundAllocated, 100);
    totalFundAllocated = eval(
      parseInt(totalFundAllocated) + parseInt(FundsAllocated)
    );

    const styledFundsAllocated = FundsAllocated.toLocaleString();
    expense.fundAllocated = styledFundsAllocated;
  });
  balance = eval(parseInt(Budget.totalBudget) - parseInt(totalFundAllocated));
  renderExpenses(expenseArray, balance);

  return;
};

// Start Calculating
calculateBtn.addEventListener("click", calculateBudget);


const renderExpenses = (array, balance) => {
  console.log(tbody)

  const thead = `
  <thead  class="thead-light">
  <tr>
                          <th scope="col"></th>
                          <th scope="col">Item</th>
                          <th scope="col">Priority</th>
                          <th scope="col">Amount</th>

                        </tr>
                        
                      </thead>
  `
  table.innerHTML = " ";
  table.innerHTML = thead
  for (expense in array) {      
    const tr = document.createElement("tr");
    // let _id = array[expense].expenseName.slice(0 , 1);
    // console.log(array[expense]);
    tr.innerHTML = `
    <td> <span class="budget-icon"> ${array[expense]._id}  </span> </td>
    <td> ${array[expense].expenseName}  </td>
    <td> ${array[expense].priority}  </td>
    
    `;

    const newTD = document.createElement("td");
    newTD.appendChild(document.createTextNode("₦ "));
    const newInput = document.createElement("input");
    newInput.setAttribute("type","text");
    newInput.setAttribute("class","editableBudget");
    newInput.setAttribute("value",`${array[expense].fundAllocated}`);
    newInput.setAttribute("keyup","editBudget()");
    let originalprice = document.createAttribute("data-originalprice");
    originalprice.value = `${array[expense].fundAllocated}`;
    newInput.setAttributeNode(originalprice);
    newTD.appendChild(newInput);
    newInput.addEventListener("keyup",editBudget);

    tr.appendChild(newTD);

    hr = document.createElement("hr");
    tr.appendChild(hr);


    /*let editableBudgets = document.getElementsByClassName("editableBudget");
    editableBudgets.item(i).addEventListener("keyup",(event) => {
      if(event.keyCode === 13){
        //event.preventDefault();
        console.log("works!");
        }
        console.log("hey");
    });*/
    //<td> id = "inputHolder"> ₦ <input type = "text" class = "editableBudget" value = "${array[expense].fundAllocated}"></td>
    //<hr>
    
    /*const newInput = document.createElement("input");
    newInput.setAttribute("type","text");
    newInput.setAttribute("class","editableBudget");
    newInput.setAttribute("value",`${array[expense].fundAllocated}`);
    newInput.setAttribute("keyup","editBudget()");
    .appendChild(newInput);
    newInput.addEventListener("keyup",editBudget);*/

    
    // console.log(tr);

    table.append(tr);
    // _id = " "
    // alert(balance)
    // console.log(array[expense]);
    
  }
  if (balance) {
    const tr = document.createElement("tr");
    tr.setAttribute("id","balanceTR");

    tr.innerHTML = `
    <td> </td>
    <td> </td>
    <td> <b> BALANCE </b>  </td>
    <td >₦ <span id = "balance">${balance}</span></td>`;

    table.append(tr);
  } else {
    // Do nothing ;
  }
};

const roundDown = (num, precision) => {
  num = parseFloat(num);
  if (!precision) return num.toLocaleString();
  return Math.floor(num / precision) * precision;
};

// const toggle = document.querySelector(".toggle");
// let items = document.querySelectorAll(".item");

// toggle.addEventListener("click", function() {
//   items.forEach(item => {
//     if (item.style.display == "") {
//       item.style.display = "block";
//     } else {
//       item.style.display = "";
//     }
//   });
// });

//  the code above is for the nav bar



const editBudget = (event) => {
  
  if(event.keyCode === 13){
    let originalPrice = parseInt((event.target.dataset.originalprice).replace(/,/gi,""));  //works
    let modifiedValue = parseInt((event.target.value).replace(/,/gi,""));
    let balance = document.getElementById("balance");
   /* console.log(originalPrice);
    console.log(modifiedValue);
    let balanceValue;*/

   
    

    console.log("works!");
  
    console.log("hey");
    if(balance === null){
        balanceValue = 0;
        const tr = document.createElement("tr");
        tr.setAttribute("id","balanceTR");
        tr.innerHTML = `
        <td> </td>
        <td> </td>
        <td> <b> BALANCE </b>  </td>
        <td >₦ <span id = "balance">${balanceValue}</span></td>`;
    
        table.append(tr);
    }
    else {
        // Do nothing ;
        
        balanceValue = parseInt(balance.innerHTML);  //works
    }

    //console.log(balanceValue);
    

    document.getElementById("balance").innerHTML = balanceValue + (originalPrice - modifiedValue);
    event.target.dataset.originalprice = event.target.value; 
    
    //console.log(typeof document.getElementById("balance").innerHTML);
  }

}


