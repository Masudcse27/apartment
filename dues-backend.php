<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
error_reporting(0);
include ('includes/db-config.php');

date_default_timezone_set('Asia/Dhaka');

$flr = $_GET['flr'];
$monthNumber=["January"=>"1","February"=>"2","March"=>"3","April"=>"4","May"=>"5","June"=>"6","July"=>"6","August"=>"8","September"=>"9","October"=>"10","November"=>"11","December"=>"12"];
$monthName=["January","February","March","April","May","June","July","August","September","October","November","December"];
$sqlfort = "SELECT * FROM $tenant WHERE apartmentName = '$flr'";
$resultfort = mysqli_query($mysqli, $sqlfort) or die(mysqli_error($mysqli));
$datafort = $resultfort->fetch_assoc();

$sqlfora = "SELECT * FROM $apartment WHERE apartmentName = '$flr'";
$resultfora = mysqli_query($mysqli, $sqlfora) or die(mysqli_error($mysqli));
$datafora = $resultfora->fetch_assoc();

$sqlfordue = "SELECT * FROM $dues WHERE dueApt = '$flr'";
$resultfordue = mysqli_query($mysqli, $sqlfordue) or die(mysqli_error($mysqli));
$datafordue = $resultfordue->fetch_assoc();

$lastPaidMonth=$monthNumber[$datafort['lastPaid']];
$currentMonth = date('m', time());
// $totalDueMonth=$currentMonth-$lastPaidMonth;
// if($currentMonth<$totalDueMonth){
//     $totalDueMonth=(12-$totalDueMonth)+$currentMonth;
// }
// if($totalDueMonth<0)$totalDueMonth=0;
// $totalDue=($totalDueMonth*$datafora['aptFair'])+$datafordue['dueAmount'];

$_SESSION['fastm']=$datafort['fstmont'];
$_SESSION['prevdues'] = $datafordue['dueAmount'];
// $_SESSION['prevdues'] = $datafordue['dueAmount'];
$_SESSION['monfair'] = $datafora['aptFair'];
unset($_SESSION['rentstart']);
$_SESSION['rentstart'] = $datafort['tenantStart'];
$_SESSION['rentConMonth'] = $lastPaidMonth;
?>

<div class="row form-group" id="due">
    <div class="col col-md-3">
        <label for="text-input" class="form-control-label">Previous Due</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="prevdue" name="predue" placeholder="<?= $datafordue['dueAmount'] ?>"
            class="form-control" disabled>
    </div>
</div>
<div class="row form-group" id="due">
    <div class="col col-md-3">
        <label for="text-input" class="form-control-label">Monthly Fair</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="number" id="monthly" name="monthlyrent" placeholder="<?= $datafora['aptFair'] ?>"
            class="form-control" disabled>
    </div>
</div>

<div class="row form-group" id="due">
    <div class="col col-md-3">
        <label for="text-input" class="form-control-label">Tenant Name</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="TenantName" name="receivedfrom" placeholder="<?= $datafort['tenantName'] ?>"
            class="form-control" disabled>
    </div>
</div>
<?php
if($lastPaidMonth>$currentMonth){ 
?>
<div class="row form-group">
    <div class="col col-md-3">
        <label for="select" class=" form-control-label">Rent of the month</label>
    </div>
    <div class="col-12 col-md-9">
        <select name="paymentmonth" id="selectmonth" class="form-control">
            <option disabled selected>Choose</option>
            <?php for ($af = $lastPaidMonth-1; $af < 12; $af++) { ?>
                <option value="<?php echo $monthName[$af] ?>">
                    <?php echo $monthName[$af] ?>
                </option>
            <?php } 
                for ($af = 0; $af < $currentMonth; $af++){
            ?>   
                <option value="<?php echo $monthName[$af] ?>">
                    <?php echo $monthName[$af] ?>
                </option>
            <?php } ?>
        </select>
    </div>
</div>
<?php
}
else{
?>
<div class="row form-group">
    <div class="col col-md-3">
        <label for="select" class=" form-control-label">Rent of the month</label>
    </div>
    <div class="col-12 col-md-9">
        <select name="paymentmonth" id="selectmonth" class="form-control">
            <option disabled selected>Choose</option>
            <?php 
                for ($af = $lastPaidMonth-1; $af < $currentMonth; $af++){
            ?>   
                <option value="<?php echo $monthName[$af] ?>">
                    <?php echo $monthName[$af] ?>
                </option>
            <?php } ?>
        </select>
    </div>
</div>
<?php
}
?>