<?php
function renderForm($email, $password, $error)
{	
?>

<!DOCTYPE html>
<html lang="en">
  	<head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <!-- seo meta tags -->
	    <meta name="description" content="Hera: a planned spending">
        <meta name="author" content="Akunna Message">
        <meta name="docsearch:language" content="en">
        <meta name="docsearch:version" content="4.3">
	    <!-- Animate CSS -->
	    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
	    <!-- Fontawesome css -->
	    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
	    <!-- bootstrap social css -->
	    <link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">
	    <!-- main style sheet -->
	    <link rel="stylesheet" type="text/css" href="css/signin.css">
	    <title>Hera: plan your spending</title>
	</head>
	<body class="sign-page">
		<main class="">
			<div class="signin-card card border-0 bg-white wow fadeIn">
				<div class="card-body pt-0">
					<div class="text-center mb-4">
						<img class="mb-2" src="img/logo.svg" alt="" width="200" height="60">
					</div>
                    <div align="center"><a href="signup.php">SIGN-UP</a> | <a href="#">SIGN-IN</a></div>
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    	<?php
							//if there is any error, displays them
							if ($error !='')
							{
							echo '<div align="center" style="color: red;">'.$error.'</div>';
							}
						?>                        
					</ul>
					<div class="tab-content" id="myTabContent">
						<!-- signin tab -->
					  	<div class="tab-pane fade show active" id="pills-signin" role="tabpanel" aria-labelledby="signin-tab">
						  	<form class="form-signin" id="login" action="" method="post">
     						  	<div class="input-group mb-3">
								  	<div class="input-group-prepend">
								    	<span class="input-group-text bg-white border-right-0 rounded-left" id="basic-addon1"><i class="fas fa-envelope-open-text"></i></span>
								  	</div>
								  	<input type="email" name= "email" id="inputEmail" class="form-control border-left-0" placeholder="Email address" aria-label="Email address" aria-describedby="basic-addon1" required>
								<div class="feedback"></div>
								</div>
								<div class="input-group mb-3">
								  	<div class="input-group-prepend">
								    	<span class="input-group-text bg-white border-right-0" id="basic-addon2"><i class="fas fa-lock"></i></span>
								  	</div>
								  	<input type="password" name="password" id="inputPassword" class="form-control border-left-0" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" required>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="remember-me"> Keep me Signed in
									</label>
								</div>
							  	<button class="btn btn-primary btn-block rounded-pill" type="submit" name="submit" id="loginBtn"><i class="fas fa-sign-in-alt"></i> Sign in</button>
							</form>
							
							</div>
					  	</div>
					</div>
				</div>
			</div>
		</main>
	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script> -->
	    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" type="text/javascript"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" type="text/javascript"></script>
	    <!-- <script src="js/signin.js" type="text/javascript"></script> -->
  	</body>
</html>

<?php
}
$table_name = "users";
//code to connect to database
include ("config/db_config.php");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die (mysqli_error());
mysqli_select_db ($connection, DB_DATABASE) or die (mysqli_error());

//check if the form has been submitted. If it has, start to process the form and save it to the database
if (isset($_POST['submit']))
{
	//get form data, making sure it is valid
	$email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));
	$password = mysqli_real_escape_string($connection, htmlspecialchars($_POST['password']));
		
	//check to make sure all fields are entered
	if ($email =='' || $password =='')
	{
		//generate error message
		$error = 'ERROR: Please enter all credentials.';
		
		//if either field is blank, display the form again
		renderForm($email, $password, $error);
		exit;
	}
	
	//first check if email already exists
	$check_pass = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email' and password = '$password'") or die (mysqli_error($connection));
	//mysql_num_row is counting table row
	$count_check = mysqli_num_rows ($check_pass);
	$row = mysqli_fetch_array($check_pass);
	
	if ($count_check == 1){
		//register $firstname, $lastname, $email and redirect to file dashboard page"
		session_start();
		$_SESSION['user_id'] = $row["serialno"];

		
		$_SESSION['firstname'] = $row['firstname'];
		$_SESSION['lastname'] = $row["lastname"];
		$_SESSION['username'] = $row["username"];

		//once updated, redirect back to the view page
		header("Location:dashboard.php");		
		exit;
	}
	else
	{
		//generate error message
		$error = 'ERROR: Authentication failed, pls try again.';
		//if either field is blank, display the form again
		renderForm($email, $password, $error);
		exit;
	}

}
else //if the form hasn't been submitted, get the data from the db and display the form
{
	//renderForm($username, $password_old, $password, $retype, $old_pass, '');
	renderForm('', '', '');	
}
mysqli_close($connection);

?>
