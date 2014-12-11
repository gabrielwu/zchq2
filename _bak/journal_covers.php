<?php
    header('Content-Type:text/html;charset=utf-8');
	require("../config/publications.php");
    require("../db/conn.php");
	require("../util/util.php");
    $index = $_POST["index"];