<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:/ams/admin.php");
}
error_reporting(0);
define('ROOT', 'C:/xampp/htdocs/ams');
include ('includes/db-config.php');

$bld = $_GET['bld'];

$apt = "SELECT * FROM apartment WHERE building = '$bld' AND tenantName IS NOT NULL";
$result = mysqli_query($mysqli, $apt) or die(mysqli_error($mysqli));

?>

<div class="row form-group">
    <div class="col col-md-3">
        <label for="select" class=" form-control-label">Select Apartment</label>
    </div>
    <div class="col-12 col-md-9">
        <select name="whichfloor" id="selectflr" class="form-control">
            <option disabled selected>Choose</option>
            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <option value="<?= $data['apartmentName'] ?>">
                    <?= $data['apartmentName'] ?>
                </option>
            <?php } ?>
        </select>
    </div>
</div>