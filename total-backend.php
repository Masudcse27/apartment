<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
error_reporting(0);
include ('includes/db-config.php');

$month = $_GET['month'];
$elc = $_GET['elc'];
$gas = $_GET['gas'];
$other = $_GET['other'];
$prev = $_GET['prev'];
$recamount = $_GET['rec'];
$totaltobereceived = $elc + $gas + $other+$_SESSION['Rent'];
$totalnewdue = $totaltobereceived - $recamount;

$_SESSION['userduepayment'] = $totalnewdue;
$_SESSION['totalrec'] = $totaltobereceived;
?>

<div class="row form-group" id="due">
    <div class="col col-md-3">
        <label for="text-input" class="form-control-label">Total New Due <?= $numberOfmonthpayment ?></label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="prevdue" name="prevdue" placeholder="<?= $totalnewdue ?>" class="form-control" disabled>
    </div>
</div>