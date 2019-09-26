<?php
    if(isset($_POST['login-submit'])) {

        require('dbh.php');

        // get data from form
        $mailname = $_POST['name'];
        $password = $_POST['password'];

        //validate input
        if(empty($mailname) || empty($password)) {
            header("Location: ./index.html?error=emptyfield&name=".$mailname);
            exit();
        }
        else{
            $sql = "SELECT * FROM user WHERE username = ? OR email = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ./index.html?error=emptyfield&name=".$mailname);
                exit()
            }
            else {
                mysqli_stmt_bind_param($stmt, "ss", $mailname, $mailname);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if($row = mysqli_fetch_assoc($result)) {
                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                    $passwordcheck = password_verify($hashedpwd, $row['password']);
                    if(!$passwordcheck) {
                        header("Location: ./index.html?error=wrongpassword&name=".$mailname);
                    }
                    else if($passwordcheck == true) {
                        session_start();
                        $_SESSION['userId'] = $row['id'];
                        $_SESSION['UserName'] = $row['username'];
                        $_SESSION['firstName'] = $row['firstname'];
                        $_SESSION['lastName'] = $row['lastname'];
                        $_SESSION['phoneNumber'] = $row['phonenumber'];
                        $_SESSION['gender'] = $row['gender'];

                        header("Location: ./budget.html?login=success");
                    }
                }
                else {
                    header("Location: ./index.html?error=nouser&name);
                }
            }
        }

    }
    else{
        header("Location: ./index.html")
    }
?>