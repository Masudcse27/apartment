<?php
session_start();
error_reporting(0);
include ('includes/db-config.php');

$email = $_GET['email'];

$fetchbldsql = "SELECT * FROM $building";
$resultbld = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));

$sql = "SELECT * FROM tenant WHERE tenantEmail = '$email'";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
$data = mysqli_num_rows($result);

if ($data > 0) { ?>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="textarea-input" class=" form-control-label">Complain
                Details</label>
        </div>
        <div class="col-12 col-md-9">
            <textarea name="details" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="select" class=" form-control-label">Select Building of the
                Apartment</label>
        </div>
        <div class="col-12 col-md-9">
            <select name="whichbuilding" id="select" class="form-control">
                <?php while ($databld = $resultbld->fetch_assoc()) { ?>
                    <option value="<?= $databld['buildingName'] ?>">
                        <?= $databld['buildingName'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="select" class=" form-control-label">Select Floor</label>
        </div>
        <div class="col-12 col-md-9">
            <select name="whichfloor" id="select" class="form-control">
                <?php for ($af = 0; $af < 15; $af++) { ?>
                    <option value="<?= $af ?>">
                        <?= $af ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="select" class=" form-control-label">Select Side</label>
        </div>
        <div class="col-12 col-md-9">
            <select name="whichwing" id="select" class="form-control">
                <?php for ($cnt = 1; $cnt < 2; $cnt++) {
                    foreach (range('A', 'Z') as $sideapt) { ?>
                        <option value="<?= $sideapt ?>">
                            <?= $sideapt ?>
                        </option>
                    <?php }
                } ?>
            </select>
        </div>
    </div>
    <div class="card-footer">
        <input type="submit" name="complainBtn" value="Drop" class="btn btn-primary btn-sm">
        <button type="reset" class="btn btn-danger btn-sm" onclick="resetform()">
            Reset
        </button>
    </div>
<?php } else {
    echo "This email is not verified as a tenant. Please use a valid email address.";
} ?>