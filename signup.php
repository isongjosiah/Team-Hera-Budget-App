
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
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					 	<li class="nav-item">
					    	<a class="nav-link rounded-0 active" id="pills-signin-tab" data-toggle="pill" href="#pills-signin" role="tab" aria-controls="pills-signin" aria-selected="true">Sign in</a>
					  	</li>
					  	<li class="nav-item">
					    	<a class="nav-link rounded-0" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false">Sign up</a>
					  	</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<!-- signin tab -->
					  	<div class="tab-pane fade show active" id="pills-signin" role="tabpanel" aria-labelledby="signin-tab">
						  	<form class="form-signin" id="login" action = "./src/login.php" method="POST">
						  		<div class="input-group mb-3">
								  	<div class="input-group-prepend">
								    	<span class="input-group-text bg-white border-right-0 rounded-left" id="basic-addon1"><i class="fas fa-envelope-open-text"></i></span>
								  	</div>
								  	<input type="email" name= "username" id="inputEmail" class="form-control border-left-0" placeholder="Email address" aria-label="Email address" aria-describedby="basic-addon1" name= "name" required>
								<div class="feedback"></div>
								</div>
								<div class="input-group mb-3">
								  	<div class="input-group-prepend">
								    	<span class="input-group-text bg-white border-right-0" id="basic-addon2"><i class="fas fa-lock"></i></span>
								  	</div>
								  	<input type="password" id="inputPassword" class="form-control border-left-0" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" name="password" required>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="remember-me"> Keep me Signed in
									</label>
								</div>
							  	<button class="btn btn-primary btn-block rounded-pill" type="submit" id="loginBtn" name="login-submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
							</form>
							<div class="text-center">
								<p class="text-center my-1">or Login in with</p>
							  	<div class="social-icons">
							  		<a class="btn btn-default border bg-white rounded-circle" href="#">
										<span class="fab fa-facebook-f mx-2"></span>
									</a>
									<a class="btn btn-default border bg-white rounded-circle" href="#">
										<img src="img/google.svg" class="mx-1" width="20" height="20">
									</a>
							  	</div>
								<p class="mt-2"> 
									<a href="#">Forgot password ?
									</a>
								</p>
							</div>
					  	</div>

					  <!-- Sign up tab -->
					  <div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="signup-tab">
					  	<form class="form-signup" id="register" method="POST" action= "./src/process.php">
					  		<div class="form-row">
							    <div class="form-group col-md-6">
							      <input type="text" class="form-control rounded-pill" id="regFirstName" placeholder="First Name" required name="firstname">
							    </div>
							    <div class="form-group col-md-6">
							      <input type="text" class="form-control rounded-pill" id="regLastName" placeholder="Last Name" name="lastname" required>
							    </div>
							</div>

							<div class="form-group">
							    <input type="text" class="form-control rounded-pill" id="regUserName" placeholder="User Name" name="username" required>
							</div>
							<div class="form-group">
							    <input type="tel" class="form-control rounded-pill" id="regPhone" placeholder="Phone Number" name="phonenumber" required>
							</div>
							<div class="form-group">
							    <input type="email" class="form-control rounded-pill" id="regEmail" placeholder="Email address" name="email" required>
							</div>

							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<input type="password" class="form-control rounded-pill" id="regInputPassword" placeholder="Password" pattern="(?=.*\d)(?=.*[A-Z])(?=.*[~`!@#$%^&*()\-_+={};:\[\]\?\.\\/,]).{6,}" title="Password must contain a capital letter,  a special character and a digit. Password length must be minimum 6 characters." autocomplete="off" name="password_1">
							    </div>
							    <div class="form-group col-md-6">
							      	<input type="password" class="form-control rounded-pill" id="confirmPassword" placeholder="Confirm password" title="Passwords must match" name="password_2" required>
							    </div>
							</div>

							<div class="form-group">
							    <div class="form-check form-check-inline px-0 mx-0">
								  	<input class="form-check-input" type="radio" id="inlineCheckbox1" value="male" name="gender">
								  	<label class="form-check-label" for="inlineCheckbox1">Male</label>
								</div>
								<div class="form-check form-check-inline px-0 mx-0">
								  	<input class="form-check-input" type="radio" id="inlineCheckbox2" value="female" name="gender">
								  	<label class="form-check-label" for="inlineCheckbox2">Female</label>
								</div>
								<div class="form-check form-check-inline px-0 mx-0">
								  	<input class="form-check-input" type="radio" id="inlineCheckbox3" value="notspecified" name="gender">
								  	<label class="form-check-label" for="inlineCheckbox3">Not specified</label>
								</div>
							</div>
							  <button type="submit" class="btn btn-primary btn-block rounded-pill" id="regBtn" name="register-submit"><i class="fas fa-user-plus"></i> Register</button>
					  	</form>
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

