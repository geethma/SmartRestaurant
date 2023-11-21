<?php
 session_start(); 

 session_unset();
 
 unset($_SESSION['UserRoleID']);
 
 header("Location: index.php");
?>