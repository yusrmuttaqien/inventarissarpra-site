<?php 
session_start(); 
require "functions.php";

    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // cek apakah admin
    if($username === 'root' && $password === 'toor'){
        $_SESSION["loggged"] = true;
        header ('Location: ../admin/page/dashboard.php');
        exit;
    }

    // cek akun di database
    $sql = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

    if(mysqli_num_rows($sql) === 1){
            // cek password
            $query = mysqli_fetch_assoc($sql);
            if(password_verify($password, $query["password"])){

                // set session
                    $_SESSION["fl1"] = $query["id_user"];
                    $_SESSION["fl2"] = $query["username"];
                    $_SESSION["fl3"] = $query["kelas"];
                    $_SESSION["logged"] = true;
                header("Location: ../page/dashboard.php");
                exit;
            }
        }else{
            header("Location: ../page/no_account.html");
        }
?>