<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
include ('includes/db-config.php');


$cmp = $_GET['cmp'];

$sql = "DELETE FROM $complain WHERE cmpID = $cmp";
$mysqli->query($sql) or die($mysqli->error);

echo "<script>
alert('Complain Deleted.');
window.location='check-complain.php';</script>";