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
    $getapt = $_GET['apt'];
    ?>

    <div class="main-content" style="max-height:100vh;">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Edit Apartment No
                                <?= $getapt ?>
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
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

<?php

if (isset($_POST['addApt'])) {
    $owner = $_POST['ownerName'];
    $fair = $_POST['monthfair'];

    $insertaptsql = "UPDATE $apartment SET aptOwner = '$owner', aptFair = '$fair' WHERE apartmentName = '$getapt'";
    $mysqli->query($insertaptsql) or die($mysqli->error);

    echo "<script>
    alert('Apartment updated succesfully');
    window.location='apt-list.php';
    </script>";
}

?>
<?php
include ('includes/footer.php');
?>