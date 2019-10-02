<?php	
session_start();

	if (!(isset($_SESSION['username']) && $_SESSION['username'] != ''))
	{ // we don't have session at all
		header("Location:index.html");
	}
	
	$user_id = $_SESSION['user_id'];
	$firstname = $_SESSION['firstname'];
	$lastname = $_SESSION['lastname'];
	$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <!-- seo meta tags -->
	    <meta name="description" content="Hera: Budget page">
        <meta name="author" content="thrive">
        <meta name="docsearch:language" content="en">
        <meta name="docsearch:version" content="4.3">
	    <!-- Animate CSS -->
	    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/fontawesome.min.css">
	    <link rel="stylesheet" type="text/css" href="css/budget.css"/>
	    <title>Hera: Budget page</title>
        <style type="text/css">
		.priority {
			font-family: Verdana, Geneva, sans-serif;
			font-size: 14px;
		}
		.priority_color {
		font-family: Verdana, Geneva, sans-serif;
		font-size: 11px;
		color: #F00;
		}
	  </style>
</head>

  <body>
    <!--work on the html @message @developerRuq @Goldin @thrive-->

    <div class="container-fluid">
      <div class="row">
        


        <div class=" budget-board col-md-12">
          <div class="row">
            <div class="col">
           
           <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Menu
  </a>
  <br>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <div class="choked"> <a href="index.html"><img class="budget-logo" src="img/logo normal.png"></a>
          <br>
          <br>
          <ul class="dashboad_nav">
            <li> <img class="dashboard_icon" src="img/home.svg"> <a class="dashboard_link "  href="index.html"> Home</a></li>
            <li> <img class="dashboard_icon" src="img/brick.png"> <a class="dashboard_link active"  href=""> Dashboard</a></li>
            <li> <img class="dashboard_icon" src="img/budg.png"> <a class="dashboard_link" href=""> Budget</a>
              <ul>
                <li> <a  class="dashboard_link small small_link" href=""> New Budget</a> </li>
                <li> <a class="dashboard_link small small_link" href="history.php" > Budget History</a> </li>
              </ul>
            </li>
            <li> <img class="dashboard_icon" src="img/team.svg"> <a class="dashboard_link "  href="team.html"> The Team</a></li>
            <li> <img class="dashboard_icon" src="img/brick.png"> <a class="dashboard_link "  href="contact.html"> Contact Us</a></li>
           <li> <img class="dashboard_icon" src="img/logout.png"> <a class="dashboard_link" href="logout.php"> Log Out</a></li>
          </ul>
    </div>
  </div>
</div>
              
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
            <div class="col-md-10">
            <h3>NEW BUDGET</h3>

            </div>
            <div class="col-md-2">
              <div class="name-tag">
                 <img class="user-img" src="img/profile_logo.jpg"> <?php echo $firstname . ' ' . $lastname ?>
               </div>
            </div>
          </div>

         <div class="row budget-panel">
            <div class="col-md-3 col-sm-4 ">
              <div class="card">
                <h5>Income</h5>
               <form id="budgetform">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2 offset-1">
                      <img class="naira-symbol" src="img/Naira.png" alt="naira symbol">

                    </div>
                    <div class="col-md-8">

                      <input type="number" class="form-control"  name="userbudget" id="userbudget" placeholder="E.g 250,000">
                      <span id="addedBudgetResponseMessage"> </span>
                      <span id="budgetResponseMessage" >  </span>
<br>
                      <br>
                      <button id="budgetButton" type="submit" class="btn btn-primary submit-btn">SUBMIT</button>
                    </div>
                  </div>
                </div>
                </form>
              </div>
              <br><br>

               <div class="card">
                <h5>Enter Budget</h5>
               <form id="expenseform" >
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-10 offset-1">


                      <input type="text" class="form-control" name="expensename" id="expensename" placeholder="Item">
                      <span id="expenseResponseMessage" >  </span>
                      <span id="addedExpenseResponseMessage"> </span>
                      <br>
                    </div>


                    </div>

                      <div class="form-group">
                        <div class="row">
                        <div class="col-md-5 offset-1">
                          <span class="priority">Priority Level </span>
                          <span class="priority_color">1 = Highest Level</span>
                        </div>
                        <div class="col-md-4">
                          <select class="form-control" id="priorities">
                               <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>


                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8 offset-2">
                         <button id="expenseButton" class="btn btn-primary submit-btn">SUBMIT</button>

                      </div>
                    </div>
                    </div>
                      </form>
                  </div>
                  <br>
                  <br>

                   <div>
                         <button id="calculate" class="btn btn-primary submit-btn">CALCULATE BUDGET</button>

                  </div>


                </div>

                <div class="col-md-9  budget-list-card">
                  <div class="card">
                    <table id="table" class="table">
                      <thead  class="thead-light">
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Item</th>
                          <th scope="col">Priority</th>
                          <th scope="col">Amount</th>

                        </tr>
                      </thead>
                      <tbody id="tbody">

                      </tbody>
                    </table>


                  </div>
                  <br><br><br>

                   <div>
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary submit-btn" data-toggle="modal" data-target="#exampleModal">
  SAVE BUDGET
</button>

<button type="button" class="btn btn-primary submit-btn" data-toggle="moda2" data-target="#exampleModa2">
  CLEAR BUDGET
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >What Do you want to save this as ?</h5>
        
      </div>
      <div class="modal-body">
         <form>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <div class="form-group">


                      <input type="text" class="form-control"  name="budgetTitle" id="budgetTitle" placeholder="Christmas Plan">
                      <!-- <span id="addedBudgetResponseMessage"> </span>
                      <span id="budgetResponseMessage" >  </span> -->
                      <br>
                      <!-- <button id="saveBudget" type="submit" class="btn btn-primary submit-btn">SUBMIT</button> -->
                    </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary submit-btn" data-dismiss="modal">Close</button>
        <button id="saveBudget" type="button" class="btn btn-primary submit-btn">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


                         <!-- <button class="btn btn-primary submit-btn">SAVE BUDGET</button> -->

                  </div>

                </div>
              </div>



            </div>
          </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

  <script  src="js/budget.js" type="text/javascript"></script>
  </body>
</html>
