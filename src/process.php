<?php
    if(isset($_POST['register-submit'])) {

        require('dbh.php'); // contains connection to database

        // storing data from user
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $password1 = $_POST['pwd_1'];
        $password2 = $_POST['pwd_2'];
        $gender = $_POST['gender'];

        //validating the data collected from user
        if(empty($firstname) || empty($lastname) || empty($username) || empty($phonenumber) || empty($email) || empty($gender)) {
            header("location: ./signup.htm?error=emptyfields&firstname=".$firstname."&lastname=".$lastname."&email=".$email);
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match( "/^[a-zA-Z0-9]*$/" , $username)) {
            header("location: ./signup.htm?error=invalidemailandusername&firstname=".$firstname."&lastname=".$lastname);
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("location: ./signup.htm?error=invalidemail&firstname=".$firstname."&lastname=".$lastname);
            exit();
        }
        elseif(!preg_match("/^[a-zA-Z0-9]*$/" , $username)) {
            header("location: ./signup.htm?error=invalidusername&firstname=".$firstname."&lastname=".$lastname."&email=".$email);
            exit();
        }
        elseif(!preg_match("/^[a-zA-Z]*$/" , $firstname)) {
            header("location: ./signup.htm?error=invalidfirstname&lastname=".$lastname."&email=".$email);
            exit();
        }
        elseif(!preg_match("/^[a-zA-Z]*$/" , $lastname)) {
            header("location: ./signup.htm?error=invalidlastname&firstname=".$firstname."&email=".$email);
            exit();
        }
        elseif($password1 !== $password2) {
            header("location: ./signup.htm?error=passwordcheck&firstname=".$firstname."&lastname=".$lastname."&email=".$email);
            exit();
        }
        //check if user already exists
        else{
            $sql = "SELECT username FROM users WHERE username= ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ./signup.htm?error=sqlerror");
                 exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);
                if($result > 0) {
                    header("location: ./signup.htm?error=usernametaken&firstname=".$firstname."&lastname=".$lastname."&email=".$email);
                    exit();
                } 
                
                else {
                    $sql = "INSERT INTO users (firstname, lastname, username, phonenumber, email, password, gender) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: ./signup.htm?error=sqlerror");
                        exit();
                    }
                    else {
                        $hashedpassword = password_hash($password1, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $lastname, $username, $phonenumber, $email, $hashedpassword, $gender);
                        mysqli_stmt_execute($stmt);
                        header("location: ./signup.htm?signup=success");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }
    else {
        header("location: ./signup.htm");
        exit();
    }
?>