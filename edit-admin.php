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
    $usersql = "SELECT * FROM admin";
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
                                Update Admin
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Admin Name
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['adminName'] ?>
                                                <a href="modal-for-admin.php?update=name" target="_blank"><input
                                                        type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Admin Email
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <?= $dataforupdate['adminEmail'] ?>
                                                <a href="modal-for-admin.php?update=email" target="_blank"><input
                                                        type="button" name="submitBtn" value="Update"
                                                        class="btn btn-primary btn-sm"></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Admin password
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <h4 class="form-text text-muted">
                                                <a href="modal-for-admin.php?update=password"
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