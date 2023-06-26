<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
error_reporting(0);
include ('includes/db-config.php');
include ('includes/header.php');
include ('includes/header-mobile.php');
include ('includes/sidebar.php'); ?>
<div class="page-container">
    <?php
    include ('includes/header-desktop.php');
    ?>
    <?php
    $fetchbldsql = "SELECT * FROM $building";
    $result = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content" style="max-height:100vh;">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Add Apartment
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Building</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="whichbuilding" id="selectbld" class="bldsec form-control">
                                                <option disabled selected>Choose</option>
                                                <?php while ($data = $result->fetch_assoc()) { ?>
                                                    <option value="<?= $data['buildingName'] ?>">
                                                        <?= $data['buildingName'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="aptfl">
                                        
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
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Enter Owner Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="ownerName"
                                                placeholder="Owner of this apartment" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Enter Monthly Rent</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="text-input" name="monthfair"
                                                placeholder="Monthly Fair of this apartment" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="addApt" class="btn btn-primary btn-sm">
                                        <button type="reset" class="btn btn-danger btn-sm"
                                            onclick="resetform()">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $(".bldsec").change(function(){
            var bld_Id=$(this).val();
            $.ajax({
                url:"show-floor.php",
                method:"POST",
                data:"bld="+bld_Id,
                success:function(data) {
                    $(".aptfl").html(data);
                }
            });
        });
    });
</script>

<?php

if (isset($_POST['addApt'])) {
    $aptBld = $_POST['whichbuilding'];
    $aptflr = $_POST['whichfloor'];
    $aptside = $_POST['whichwing'];
    $aptName = "B" . $aptBld . "AP" . $aptflr . $aptside;
    $owner = $_POST['ownerName'];
    $fair = $_POST['monthfair'];

    $aptcheck = "SELECT * FROM $apartment WHERE apartmentName = '$aptName'";
    $result = $mysqli->query($aptcheck) or die($mysqli->error);
    $numrows = mysqli_num_rows($result);

    if ($numrows > 0) {
        echo "<script>
        alert('This apartment is already added.');
        window.location='add-apt.php';
        </script>";
    } else {
        $insertaptsql = "INSERT IGNORE INTO $apartment(apartmentName, building, aptOwner, aptFair) VALUES ('$aptName','$aptBld','$owner', '$fair')";
        $mysqli->query($insertaptsql) or die($mysqli->error);

        echo "<script>
    alert('Apartment added succesfully');
    window.location='add-apt.php';
    </script>";
    }
}

?>

<?php
include ('includes/footer.php');
?>