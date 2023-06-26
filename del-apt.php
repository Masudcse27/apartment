<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
include ('includes/db-config.php');


$apt = $_GET['apt'];

$selsqlapt = "SELECT * FROM apartment WHERE apartmentName = '$apt'";
$resultapt = mysqli_query($mysqli, $selsqlapt) or die(mysqli_error($mysqli));
if (mysqli_num_rows($resultapt) > 0) {

    $delsqlapt = "DELETE FROM apartment WHERE apartmentName = '$apt'";
    mysqli_query($mysqli, $delsqlapt) or die(mysqli_error($mysqli));

}

$selsqldues = "SELECT * FROM dues WHERE dueApt = '$apt'";
$resultdues = mysqli_query($mysqli, $selsqldues) or die(mysqli_error($mysqli));
if (mysqli_num_rows($resultdues) > 0) {

    $delsqldues = "DELETE FROM dues WHERE dueApt = '$apt'";
    mysqli_query($mysqli, $delsqldues) or die(mysqli_error($mysqli));

}

$selsqlrent = "SELECT * FROM rent WHERE rentApt = '$apt'";
$resultrent = mysqli_query($mysqli, $selsqlrent) or die(mysqli_error($mysqli));
if (mysqli_num_rows($resultrent) > 0) {

    $delsqlrent = "DELETE FROM rent WHERE rentApt = '$apt'";
    mysqli_query($mysqli, $delsqlrent) or die(mysqli_error($mysqli));

}

$selsqltenant = "SELECT * FROM tenant WHERE apartmentName = '$apt'";
$resulttenant = mysqli_query($mysqli, $selsqltenant) or die(mysqli_error($mysqli));
if (mysqli_num_rows($resulttenant) > 0) {

    $delsqltenant = "DELETE FROM tenant WHERE apartmentName = '$apt'";
    mysqli_query($mysqli, $delsqltenant) or die(mysqli_error($mysqli));

}

echo "<script>
alert('Apartment Deleted Succesfully');
window.location = 'apt-list.php';
</script>";