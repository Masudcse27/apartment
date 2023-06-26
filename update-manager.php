<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
error_reporting(0);
include ('includes/db-config.php');
include ('includes/header.php');
include ('functions.php');
include ('includes/header-mobile.php');
include ('includes/sidebar.php'); ?>
<div class="page-container">
    <?php
    include ('includes/header-desktop.php');
    ?>
    <?php
    $user = $_GET['user'];
    $usersql = "SELECT * FROM manager WHERE managerID = '$user'";
    $resultforupdate = mysqli_query($mysqli, $usersql) or die(mysqli_error($mysqli));
    $dataforupdate = $resultforupdate->fetch_assoc();
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Update Manager
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Manager Name
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['managerName'] ?>
                                                <a href="modal-for-manager.php?update=name&user=<?= $user ?>"
                                                    target="_blank"><input type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Manager Email
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['managerEmail'] ?>
                                                <a href="modal-for-manager.php?update=email&user=<?= $user ?>"
                                                    target="_blank"><input type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Password
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <a href="modal-for-manager.php?update=pass&user=<?= $user ?>"
                                                    target="_blank"><input type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
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
include ('includes/footer.php');
?>