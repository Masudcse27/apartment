<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
error_reporting(0);
include ('includes/db-config.php');

$bId = $_POST['bld'];

$apt = "SELECT * FROM building WHERE buildingName  = '$bId'";
$result = mysqli_query($mysqli, $apt) or die(mysqli_error($mysqli));
$res=mysqli_fetch_assoc($result);
$range=$res['buildingStor'];
?>

<div class="row form-group">
    <div class="col col-md-3">
        <label for="select" class=" form-control-label">Select Floor</label>
    </div>
    <div class="col-12 col-md-9">
        <select name="whichfloor" id="select" class="form-control">
            <?php for ($af = 0; $af < $range; $af++) { ?>
                <option value="<?php echo $af ?>">
                    <?php echo $af ?>
                </option>
            <?php } ?>
        </select>
    </div>
</div>