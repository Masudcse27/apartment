<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
include ('includes/db-config.php');


$del = $_GET['id'];

$fetch = "SELECT * FROM $tenant WHERE tenantID = $del";
$resultfetch = $mysqli->query($fetch) or die($mysqli->error);
$datafetch = $resultfetch->fetch_assoc();

$name = $datafetch['tenantName'];

$updapt = "UPDATE apartment SET TenantName = NULL WHERE TenantName = '$name'";
$mysqli->query($updapt) or die($mysqli->error);

$sql = "DELETE FROM $tenant WHERE tenantID = $del";
$mysqli->query($sql) or die($mysqli->error);


echo "<script>
alert('Tenant Deleted Succesfully.');
window.location='dashboard.php';</script>";