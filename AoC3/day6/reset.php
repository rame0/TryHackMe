<?php
session_start();
include('./includes/creds.php');

  if($_SESSION['username'] !== $USER){
      header("Location: login.php");
      die();
  } else {
          $labNum = "Reset";
          require "./includes/header.php";
  
	  if($_GET['reset'] === $PASS){
		  system('echo "" > ./includes/logs/app_access.log');
		  echo "Done!";
	  }
  
  }
?>
