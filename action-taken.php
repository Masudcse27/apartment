<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
//define('ROOT', 'C:/xampp/htdocs/ams');
include ('includes/db-config.php');

$cmp = $_GET['cmp'];

$sql = "UPDATE $complain SET action='1' WHERE cmpID = $cmp";
$mysqli->query($sql) or die($mysqli->error);

echo "<script>
alert('Action recorded.');
window.location='check-complain.php';</script>";