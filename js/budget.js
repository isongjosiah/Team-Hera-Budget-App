/* js file for budget page */

const addBudgetForm = document.getElementById("budgetform");
const budgetResponseMessage = document.getElementById('budgetResponseMessage');
const expenseResponseMessage = document.getElementById('expenseResponseMessage');
const addedBudgetResponseMessage = document.getElementById('addedBudgetResponseMessage');
// const addedExpenseResponseMessage document.getElementById('addedExpenseResponseMessage');

const addExpenseForm = document.querySelector("#expenseform");
const calculateBtn = document.getElementById('calculate');
const table = document.getElementById('table');


const expenseArray = [];
let Budget ={}
let userBudget; 
let totalBudget;



 //  Adding New Budget
addBudgetForm.addEventListener("submit", (event) => {
    event.preventDefault();
    userBudget =  document.getElementById("userbudget").value;


    if (!userBudget || userBudget === "" || userBudget === null) {
      budgetResponseMessage.append('Please, enter a budget.');
    } else {
    	budgetResponseMessage.remove();
    	// send Success Message
    	addedBudgetResponseMessage.append('Budget added.');

      // initiate new budget
	  const budgetValue = parseInt(userBudget);
      Budget.totalBudget = budgetValue
    }
});



//   Adding New Expense
addExpenseForm.addEventListener("submit", (event) => {

	event.preventDefault();
	let expenseName = document.querySelector("#expensename").value;
	const priorities = document.querySelector("#priorities");
	let priority = priorities.options[priorities.selectedIndex].value;
	console.log(expenseName);
	console.log(priority);

	if (!expenseName) {
	  expenseResponseMessage.append('Please, enter a budget.');
	} else {
	  const newExpense = {expenseName, priority }
	  expenseArray.push(newExpense);
      expenseResponseMessage.remove();
	  // Send Success MEssage
	  addedExpenseResponseMessage.append(`Added "${expenseName}" to Budget.`);
	  // console.log(expenseArray);
	
	  expenseName = document.querySelector("#expensename")
	  expenseName.value = " ";
	  expenseName = null; 

	//   setTimeout(function(){
	//   	addedExpenseResponseMessage.textContent = " ",
	// }, 3000);
	 
	}
});

// Calculate Budget
const calculateBudget = async () => {
    let totalPriority = 0;
    let totalInversePriority = 0;

    await expenseArray.map((expense) => {
      totalPriority = eval(parseInt(totalPriority) + parseInt(expense.priority));
    });

    await expenseArray.map((expense) => {
      expense.inversePriority = eval(parseInt(totalPriority) - expense.priority);
    });

    await expenseArray.map((expense) => {
      totalInversePriority = eval(parseInt(totalInversePriority) +  parseInt(expense.inversePriority));
    })

     await expenseArray.map((expense) => {
     	expense._id = expense.expenseName.slice(0, 2);
      // totalInversePriority = eval(parseInt(totalInversePriority) +  parseInt(expense.inversePriority));
    })


    await expenseArray.map((expense) => {
      const {inversePriority} = expense;
      // console.log(inversePriority, totalPriority);
      expense.fundAllocated = Math.floor(eval((parseInt(inversePriority) / parseInt(totalInversePriority) ) * parseInt(Budget.totalBudget)));
    })
     renderExpenses(expenseArray);
  return expenseArray;
}

// Start Calculating 
calculateBtn.addEventListener('click', calculateBudget);


const renderExpenses = (array) => {
  for (expense in array){
    const tr = document.createElement("tr");
  	// let _id = array[expense].expenseName.slice(0 , 1);
    // console.log(array[expense]);
    tr.innerHTML = `
    <td> <span class="budget-icon"> ${array[expense]._id}  </span> </td>
    <td> ${array[expense].expenseName}  </td>
    <td> ${array[expense].priority}  </td>
    <td> ${array[expense].fundAllocated}  </td>
    `
    console.log(tr);

    table.append(tr);
    // _id = " "
    console.log(array[expense]);
  }
}



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