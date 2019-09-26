<?php
    session_start();
    // initializing variables
    $firstName = "";
    $lastName = "";
    $userName = "";
    $email = "";
    $errors = array();

    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'registration');

    //REGISTER USER
    if(isset($_POST['register'])) {
        //storing input values from the registration form
        $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($db, $_POST['firstName']);
        $userName = mysqli_real_escape_string($db, $_POST['userName']);
        $password_1 = mysqli_real_escape_string($db, $_POST['pwd_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['pwd_2']);

        // form content validation
        if (empty($firstName)) {array_push($errors, "First Name cannot be blank");}
        if (empty($lastName)) {array_push($errors, "Last Name cannot be blank");}
        if (empty($userName)) {array_push($errors, "Username cannot be blank");}
        if (empty($email)) {array_push($errors, "Email cannot be blank");}
        if (empty($password_1)) {array_push($errors, "Password is required");}
        if (empty($password_2)) {array_push($errors, "Please confirm Password");}

        if ($password_1 !== $password_2) {array_push($errors, "Passwords do not Match");}


         // checking for user in database, making sure user does not already exist
        $user_check_query = "SELECT * FROM users WHERE username= '$userName' OR email = '$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

         // if the user exist
       if ($user['username'] === $userName) {
         array_push ($errors, "Username already exist, please make another choice");
        }
        if ($user['email'] === $email) {
         array_push ($errors, "Account already exists with this Email, please Log in.")
        }

         // if there are no errors and user doesn't exist, register the user

         if (count($errors) == 0) {
         $password = md5($password_1);

            $query = "INSERT INTO users (firstname, lastname, username, email, password) VALUES('$firstName', '$lastName', '$userName', '$email', '$password')";
            mysqli_query($db, $query);
            $_SESSION['username'] = $firstName;
            $_SESSION['success'] = "Welcome, to Hera Budget";
            header('location: index.html');
        }
    }


    // LOG IN 
    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['PASSWORD']);

        if (empty($username)) {array_push($errors, "Input your username");}
        if (empty($password)) {array_push($errors, "Input your password");}
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_row($results) == 1) {
                $_SESSION['username'] == $username;
                $_SESSION['success'] == "Succesful Log in";
                header('location: index.php');
            } else {
                array_push($errors, "Wrong username or password");
            }
        }
    }

?>