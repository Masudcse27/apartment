<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
error_reporting(0);
include ('includes/db-config.php');

$flr = $_GET['flr'];

$sqlfora = "SELECT * FROM $apartment WHERE apartmentName = '$flr'";
$resultfora = mysqli_query($mysqli, $sqlfora) or die(mysqli_error($mysqli));
$datafora = $resultfora->fetch_assoc();

$_SESSION['apt_fair_for_tenant'] = $datafora['aptFair'];

?>
<div class="row form-group" id="due">
    <div class="col col-md-3">
        <label for="text-input" class="form-control-label">Monthly Fair</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="number" id="monthly" name="monthlyrent" placeholder="<?= $datafora['aptFair'] ?>"
            class="form-control" disabled>
    </div>
</div>