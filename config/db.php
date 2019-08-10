<?php
ob_start();
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);    
date_default_timezone_set('Asia/Manila');

$db_server = "127.0.0.1"; // server 127.0.0.1
$db_user = "root"; // rkzdgoxn_system
$db_pass = "";//madz1234
$db_name = "dcsquare"; //rkzdgoxn_sample

$dbcon = new mysqli($db_server,$db_user,$db_pass,$db_name);
if ($dbcon->connect_error) 
{
    die("Connection failed: " . $dbcon->connect_error);
}

?>
