<?php  
session_start();
if(!isset($_SESSION["loggged"])){
    header("Location:../../index.html");
    exit;
}
?>