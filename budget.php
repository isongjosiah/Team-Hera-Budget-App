<?php require('header.php') ?>
<?php if(isset($_SESSION['username'])){
  echo '
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
</head>
  <body>
    <!--work on the html @message @developerRuq @Goldin @thrive-->
      <nav>
			<ul class="menu">
				<li class="logo"><a href="#"><img class="logo-image" src="/Designs/logo normal.png" class="img-fluid"></a></li>
        <li class="item"><a href="index.php"> Home</a></li>
       
        <li class="item"><a href="budget.php"> Dashboard</a></li>
        <li class="item"><a href="team.php"> Meet The Team</a></li>
        <li class="item"><a href="contact.php"> Contact Us</a></li>
        <li class="item button"><a href="signin.php"> Login</a></li>
        <li class="item button secondary"><a href="#"> Sign Up</a></li>
				<li class="toggle"> <span class="bars"></span></li>
			</ul>
		</nav>
      <!--grid layout-->
      <div class="container">
          <div class="row">
              
            <!--left grid-->  
            <div class="col-sm-2">
                    <!--<img class="logo-image" src="/Designs/logo normal.png" class="img-fluid">-->
                    <p><img src="img/brick.png" class="img-fluid mr-1" alt="brick-icon">Dashboard</p>
                    <div>
                       <p><img src="img/budg.png" class="img-fluid"> Budget</p>
                            <ul>
                                <li>New Budget</li>
                                <li>Budget History</li>
                            </ul>
                    </div>
                    <form action="./src/logout.php" method = "post">
                    <!-- <p><a href="#"><img src="img/logout.png" class="img-fluid">Logout</a></p> -->
                    <button type = "submit" name = "logout-submit">Log out</button>
                    </form>
                
            </div>
          
              
          <!--middle-grid-->
            <div class="col-sm-4 colum text-center">
                <h1 class="font-weight-bolder text-white mt-5">NEW BUDGET</h1>
                <div class="jumbotron">
                    <h4 class="font-weight-bold pt-1 text-left">Income</h4>
                    <form action="#" class="needs-validation form-group" novalidate>
                        <label for="naira"><img src="img/Naira.png" alt="naira symbol"><input type="number" name="income"> </label><br>
                        <div class="wrap"><input type="submit" class="item-button" name="submit" value="SUBMIT"></div>
                    </form>
                </div>
                
                <div class="jumbotron jb">
                    <h4 class="font-weight-bold pt-1 text-left">Enter Budget</h4>
                    <label for="naira"><img src="img/Naira.png" alt="naira symbol"><input type="number" name="income"> </label>
                    <label for="naira"><span>Item</span><input type="text"  name="income"> </label><br>
                    <span>Priority Level</span><select id ="dropdown" name="CurrentPos">
                            <option disabled value>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option> 
                    </select>
                    
                   <div class="wrap"><input type="submit" class="item-button" name="submit" value="SUBMIT"></div>
                </div>
                <div class="wrap"><input type="submit" class="item-button mb-5" name="submit" value="CALCULATE BUDGET"></div>
            </div>
              
            <!--RIGHT GRID-->
          <div class="col-sm-6 colum">
              <p><input type="text"  name="income"></p>
              jnruyubvyvbubvubvuvbubvuvuburivbuus
        </div>
      
      </div>
    </div>

    <script src="/Js/budget.js"></script>
  </body>
</html>';
} else {
  echo '<h1>Please<a href= "signup.php">Login</a> To continue</h1>';
}