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

    <div class="main-content" style="max-height:100vh;">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Add Manager
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Manager Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="managerName"
                                                placeholder="Enter Manager Name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Manager Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="text-input" name="managerEmail"
                                                placeholder="Manager email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Manager Password</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="text-input" name="managerPass"
                                                placeholder="Password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="addMng" value="Add" class="btn btn-primary btn-sm">
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

if (isset($_POST['addMng'])) {
    $mngName = $_POST['managerName'];
    $mngEm = $_POST['managerEmail'];
    $mngPass = md5($_POST['managerPass']);

    $checkmng = "SELECT * FROM manager WHERE managerName = '$mngName'";
    $checkmngrun = mysqli_query($mysqli, $checkmng) or die(mysqli_error($mysqli));
    $checkdata = mysqli_num_rows($checkmngrun);

    if ($checkdata >= 1) {
        echo "<script>alert('Manager already exist.')
        window.location = 'add-manager.php'</script>";
    } else {
        $addmngsql = "INSERT IGNORE INTO manager(managerName, managerEmail, managerPass) VALUES('$mngName', '$mngEm', '$mngPass')";
        $mysqli->query($addmngsql) or die($mysqli->error);
        echo "<script>alert('Manager added succesfully')
        window.location = 'add-manager.php'</script>";
    }
}
?>

<?php
include ('includes/footer.php');
?>