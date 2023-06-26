<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
error_reporting(0);
include ('includes/db-config.php');
$monthNumber=["January"=>"1","February"=>"2","March"=>"3","April"=>"4","May"=>"5","June"=>"6","July"=>"6","August"=>"8","September"=>"9","October"=>"10","November"=>"11","December"=>"12"];
$month = $monthNumber[$_GET['Month']];
$startMonth=$_SESSION['rentConMonth'];
$totalmonth=$month-$startMonth;
if($startMonth>$month){
    $totalmonth=(12-$startMonth)+$month;
}

$totalRent=($totalmonth*$_SESSION['monfair'])+$_SESSION['prevdues'];

$_SESSION['rentToMonth']=$month;
if($month==$startMonth)$totalRent=$_SESSION['prevdues'];
if($_SESSION['fastm'])$totalRent+=$_SESSION['monfair'];
$_SESSION['Rent']=$totalRent;
?>
<div class="row form-group" id="due">
    <div class="col col-md-3">
        <label for="text-input" class="form-control-label">Total Rent</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="prevdue" name="predue" placeholder="<?= $totalRent ?>"
            class="form-control" disabled>
    </div>
</div>