<?php require('header.php') ?>
<?php if(isset($_SESSION['username'])){

echo'
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>

    <!--Bootstrap links-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/contact.css">
  </head>

  <body class = "">
    <div class="container-fluid">

      <!--Header - navbar-->
      <header class = "row mx-auto pl-5">
        <nav class = "w-100">
    			<ul class="menu">
    				<li class="logo"><a href="#"><img class="logo-image" src="Designs/logo normal.png" class="img-fluid"></a></li>
          <li class="item"><a href="index.php"> Home</a></li>
          
          <li class="item"><a href="budget.php"> Dashboard</a></li>
          <li class="item"><a href="team.php"> Meet The Team</a></li>
          <li class="item"><a href="contact.php"> Contact Us</a></li>
          <li class="item button"><a href="signin.php"> Login</a></li>
          <li class="item button secondary"><a href="#"> Sign Up</a></li>
    				<li class="toggle"> <span class="bars"></span></li>
    			</ul>
    		</nav>

      </header>

      <!--Main Content-->

      <main class = "row">
        <div class="col-12">
          <!--First Row-->
          <!--This row contains the contact us heading, other ways to contact us block and the vector graphic-->
          <div class="row">
            <div class="col-12 text-center text-lg-left col-lg-5 pl-lg-5">
              <div class="mb-lg-5" style = "width:auto">
                <h1 class = "contact-us mt-5" style = "font-family: Segoe UI">CONTACT US</h1>
                <p class = "mt-3 d-inline-block " id = "address"><i>285 Livingston Lane Lynwood, CA 9026</i></p>
              </div>
              <div class="mt-5 d-none d-lg-block pt-5">
                <h3 id = "other-ways" class = "contact-us">OTHER WAYS TO CONTACT US</h3>
                <div id = "contact-grid" class="row mt-4">
                  <div class =  "col-12 col-lg-6 mb-4 d-flex">
                      <img class = "mr-2"src="Designs/phone.svg" alt="" height = 30 width = 30>
                      <p class = ""> +234-56-789-0</p>
                  </div>
                  <div class =  "col-12 col-lg-6 mb-4 d-flex">
                      <img class = "mr-2"src="Designs/facebook.svg" alt="" height = 30 width = 30>
                      <p class = ""> /hera_fanpage</p>
                  </div>
                  <div class =  "col-12 col-lg-6 mb-4 d-flex">
                      <img class = "mr-2"src="Designs/mail.svg" alt="" height = 30 width = 30>
                      <p class = ""> hera@domain.com</p>
                  </div>
                  <div class =  "col-12 col-lg-6 mb-4 d-flex">
                      <img class = "mr-2"src="Designs/twitter.svg" alt="" height = 30 width = 30>
                      <p class = ""> @hera_account</p>
                  </div>
                  <div class =  "col-12 col-lg-6 mb-4 d-flex">
                      <img class = "mr-2"src="Designs/website.svg" alt="" height = 30 width = 30>
                      <p class = ""> www.hera.com</p>
                  </div>
                  <div class =  "col-12 col-lg-6 mb-4 d-flex">
                      <img class = "mr-2"src="Designs/instagram.svg" alt="" height = 30 width = 30>
                      <p class = ""> @hera_account</p>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-12 col-lg-7 vector-container float-right ">
              <!--if the user's screen is smaller than medium,the vector graphic will disappear and reappear under the "contact us heading" text-->
              <img class = "d-none d-md-block mb-5 w-100" id = "vector" src="Designs/contact-vector.svg" alt="vector illustration" height = 700>
              <div class="mx-auto mx-lg-0 " id =  "form-container">
                <h4 class = "text-center">CONTACT US</h4>
                <form>
                  <fieldset class="form-group">
                    <input type="text" class="form-control" id="name-field" placeholder="NAME">
                  </fieldset>
                  <fieldset class="form-group">
                    <input type="email" class="form-control" id="email-field" placeholder="EMAIL">
                  </fieldset>
                  <fieldset class="form-group">
                    <textarea name="name" class = "form-control" rows="6" cols="80"></textarea>
                  </fieldset>
                </form>
              </div>

            </div>
          </div>

          <!--SECOND ROW- this row only shows when the user's screen size is small, if the user is using a big screen it will disappear-->
          <!--It is the same as the "Other ways to contact us" block, it just has a different position and appears when the other "Other ways to contact us" block disappears-->
          <div class="row mt-4">
            <div class="col-8 text-center mx-auto d-block d-lg-none">
              <h3 id = "other-ways" class = "contact-us">OTHER WAYS TO CONTACT US</h3>
              <div id = "contact-grid" class="row mt-4 text-center">
                <div class =  "col-12 col-md-6 mb-4 d-flex justify-content-center">
                    <img class = "mr-2"src="Designs/phone.svg" alt="" height = 30 width = 30>
                    <p class = ""> +234-56-789-0</p>
                </div>
                <div class =  "col-12 col-md-6 mb-4 d-flex justify-content-center">
                    <img class = "mr-2"src="Designs/facebook.svg" alt="" height = 30 width = 30>
                    <p class = ""> /hera_fanpage</p>
                </div>
                <div class =  "col-12 col-md-6 mb-4 d-flex justify-content-center">
                    <img class = "mr-2 ml-4"src="Designs/mail.svg" alt="" height = 30 width = 30>
                    <p class = "">hera@domain.com</p>
                </div>
                <div class =  "col-12 col-md-6 mb-4 d-flex justify-content-center">
                    <img class = "mr-2"src="Designs/twitter.svg" alt="" height = 30 width = 30>
                    <p class = ""> @hera_account</p>
                </div>
                <div class =  "col-12 col-md-6 mb-4 d-flex justify-content-center">
                    <img class = "mr-2"src="Designs/website.svg" alt="" height = 30 width = 30>
                    <p class = ""> www.hera.com</p>
                </div>
                <div class =  "col-12 col-md-6 mb-4 d-flex justify-content-center">
                    <img class = "mr-2"src="Designs/instagram.svg" alt="" height = 30 width = 30>
                    <p class = ""> @hera_account</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </main>
    </div>




<script src="/js/contact.js"></script>
  </body>';} else {
    echo '<h1>Please<a href= "signup.php">Login</a> To continue</h1>';
  }
</html>
