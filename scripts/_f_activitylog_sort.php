<?php 

session_start();

$sortAmount = $_POST["sortAmount"]; 
$sortType = $_POST["sortType"];

$_SESSION["sortAmount"] = $sortAmount;
$_SESSION["sortType"] = $sortType;

?>