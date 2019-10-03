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
	    <title>Hera: Budget History</title>
</head>

  <body>
    <!--work on the html @message @developerRuq @Goldin @thrive-->

    <div class="container-fluid">
      <div class="row">
        <div class="side-pane col-sm-2 col-md-2"> <a href="index.html"><img class="budget-logo" src="img/logo normal.png"></a>
          <br>
          <br>
          <ul class="dashboad_nav">
            <li> <img class="dashboard_icon" src="img/home.svg"> <a class="dashboard_link "  href="index.html"> Home</a></li>
            <li> <img class="dashboard_icon" src="img/brick.png"> <a class="dashboard_link "  href="dashboard.php"> Dashboard</a></li>
            <li> <img class="dashboard_icon" src="img/budg.png"> <a class="dashboard_link" href=""> Budget</a>
              <ul>
                <li> <a  class="dashboard_link small small_link" href="dashboard.php"> New Budget</a> </li>
                <li> <a class="dashboard_link small small_link active" href="#" > Budget History</a> </li>
              </ul>
            </li>
            <li> <img class="dashboard_icon" src="img/team.svg"> <a class="dashboard_link "  href="team.html"> The Team</a></li>
            <li> <img class="dashboard_icon" src="img/brick.png"> <a class="dashboard_link "  href="contact.html"> Contact Us</a></li>
           <li> <img class="dashboard_icon" src="img/logout.png"> <a class="dashboard_link" href="logout.php"> Log Out</a></li>
          </ul>
        </div>


        <div class=" budget-board col-md-10">
          <div class="container">
            <div class="row">
            <div class="col-md-10">
            <h3> BUDGET HISTORY</h3>

            </div>
            <div class="col-md-2">
              <div class="name-tag">
                 <img class="user-img" src="img/profile_logo.jpg"> <?php echo $firstname . ' ' . $lastname ?>
              </div>
            </div>
          </div>
          <br><br>
          <div class="row">
            <div class="col-md-9 history-card">


      <table class="table">
        <thead class="thead-light">
          <tr>
            
            <th scope="col">Date</th>
            <th scope="col">Budget List</th>
            <th scope="col">Amount</th>
            <th scope="col"> </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b> 03/03/19 </b></td>
            <td>Christmas Stuffs</td>
            <td> ₦22,000</td>
            <td> <img class="dashboard_icon" src="img/trash.svg"> </td>
          </tr>
          <tr>
            <td><b> 03/03/19 </b></td>
            <td>Christmas Stuffs</td>
            <td> ₦22,000</td>
            <td> <img class="dashboard_icon" src="img/trash.svg"> </td>
          </tr><tr>
            <td><b> 03/03/19 </b></td>
            <td>Christmas Stuffs</td>
            <td> ₦22,000</td>
            <td> <img class="dashboard_icon" src="img/trash.svg"> </td>
          </tr><tr>
            <td><b> 03/03/19 </b></td>
            <td>Christmas Stuffs</td>
            <td> ₦22,000</td>
            <td> <img class="dashboard_icon" src="img/trash.svg"> </td>
          </tr><tr>
            <td><b> 03/03/19 </b></td>
            <td>Christmas Stuffs</td>
            <td> ₦22,000</td>
            <td> <img class="dashboard_icon" src="img/trash.svg"> </td>
          </tr><tr>
            <td><b> 03/03/19 </b></td>
            <td>Christmas Stuffs</td>
            <td> ₦22,000</td>
            <td> <img class="dashboard_icon" src="img/trash.svg"> </td>
          </tr><tr>
            <td><b> 03/02/19 </b></td>
            <td> Easter Plans</td>
            <td> ₦122,000</td>
            <td> <img class="dashboard_icon" src="img/trash.svg"> </td>
          </tr>
          
        </tbody>
      </table>
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
