<?php
session_start();
$_SESSION['login'] = false;
unset($_SESSION['username']);
unset($_SESSION['m_id']);
?>