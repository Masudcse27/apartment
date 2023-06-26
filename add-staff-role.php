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
    $fetchbldsql = "SELECT * FROM $role";
    $result = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h2 style="padding-bottom: 20px;">Currently Available Roles</h2>
                            </div>
                            <div class="card-body card-block">
                                <?php while ($data = $result->fetch_assoc()) { ?>
                                    <div style="padding-top: 5px;">
                                        <i class="fas fa-chevron-right"></i>
                                        <?= $data['roleName'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h2>Add New Role</h2>
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Role Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="roleName"
                                                placeholder="What kind of work the staff will do" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="submitBtn" class="btn btn-primary btn-sm"
                                            value="Add">
                                        <button type="reset" class="btn btn-danger btn-sm"
                                            onclick="resetform()">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h2>Delete Role</h2>
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col-12 col-md-9">
                                            <select name="whichrole" id="select" class="form-control">
                                                <?php
                                                $fetchbldsql2 = "SELECT * FROM $role";
                                                $result2 = mysqli_query($mysqli, $fetchbldsql2) or die(mysqli_error($mysqli));
                                                while ($data2 = $result2->fetch_assoc()) { ?>
                                                    <option value="<?= $data2['roleName'] ?>">
                                                        <?= $data2['roleName'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="delBtn" class="btn btn-danger btn-sm" value="Delete">
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
if (isset($_POST['submitBtn'])) {
    $roleName = $_POST['roleName'];

    $sql = "INSERT IGNORE INTO $role (roleName) VALUES ('$roleName')";

    $mysqli->query($sql) or die($mysqli->error);

    echo "<script>
    alert('New role added succesfully');
    window.location='add-role.php';
    </script>";
}

if (isset($_POST['delBtn'])) {
    $roleName = $_POST['whichrole'];

    $sql = "DELETE FROM $role WHERE roleName LIKE '$roleName'";

    $mysqli->query($sql) or die($mysqli->error);

    echo "<script>
    alert('Role deleted succesfully');
    window.location='add-role.php';
    </script>";
}
?>
<?php
include ('includes/footer.php');
?>