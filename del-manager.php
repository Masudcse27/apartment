<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
include ('includes/db-config.php');


$del = $_GET['user'];

$sql = "DELETE FROM manager WHERE managerID = $del";
$mysqli->query($sql) or die($mysqli->error);


echo "<script>
alert('Manager Deleted Succesfully.');
window.location='manager-list.php';</script>";