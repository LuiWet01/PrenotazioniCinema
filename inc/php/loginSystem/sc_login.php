<?php
session_start();
    require_once("../db_connection.php");

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,$_POST['pass']);
    $keepConn = $_POST['RestaConnesso'];

    $emptyFieldDetected = false;
    if(empty($email) or empty($pass)){
        $emptyFieldDetected = true;
    }

    //Output error in case of empty fields
    if($emptyFieldDetected){
        echo '
                  <p>Riempi i campi</p>
                  <a type="button" href="../../../index.php" class="btn btn-outline-danger">Ok</a>

        ';
    }

    $q = "SELECT user_email, user_pass
            FROM users
           WHERE '$email' = user_email";
    $result = mysqli_query($conn, $q);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
            if(password_verify($pass,$row['user_pass'])){
                $_SESSION["logged"] = "true"; 
                //Cookies last 10day 
                if(isset($keepConn)){
                    setcookie("email", $email, time() + (86400 * 10), "/");
                    setcookie("pass", $pass, time() + (86400 * 10), "/");
                }
                header("Location:../../../index.php");
            }
            else
            {
            echo '<p>Password o email errate</p>
                  <a type="button" href="../../../index.php" class="btn btn-outline-danger">Ok</a>';
        	}
        }
    } else {
        echo'
                  <p>Password o email errate</p>
                  <a type="button" href="../../../index.php" class="btn btn-outline-danger">Ok</a>

        ';
        
    }
?>