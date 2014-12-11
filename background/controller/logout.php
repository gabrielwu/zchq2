<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
$_SESSION['mark'] = 'logout';
unset($_SESSION['ad_account']);
Header("Location: ../login.html"); 
?>