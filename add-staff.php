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

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Add Staff Form
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Staff Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="staffName"
                                                placeholder="Enter Staff Name" class="form-control" required>
                                            <small class="form-text text-muted">Full Name of the Staff (As in
                                                NID)</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Staff Mobile</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="tel" name="staffContact" placeholder="Staff Contact Number"
                                                class="form-control" required>
                                            <small class="help-block form-text">Valid Mobile Number of the staff</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Staff Father's
                                                Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="staffFather" placeholder="Staff Father's Name"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Staff's Permanent
                                                Address</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="staffAddr" placeholder="Full Address"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Staff Start
                                                Date</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" name="startDate" class="form-control" required>
                                            <small class="help-block form-text">Pick the date</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Role</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="selectRole" id="select" class="form-control">
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
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Building of the
                                                Apartment</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="whichbuilding" id="select" class="form-control">
                                                <?php while ($data = $result->fetch_assoc()) { ?>
                                                    <option value="<?= $data['buildingName'] ?>">
                                                        <?= $data['buildingName'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Upload Front side of the
                                                NID</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="staffNIDfront"
                                                class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Upload Back side of the
                                                NID</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="staffNIDback"
                                                class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Upload Picture of the
                                                staff</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="staffpicture"
                                                class="form-control-file">
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
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submitBtn'])) {
    $staffName = $_POST['staffName'];
    $staffContact = $_POST['staffContact'];
    $staffFather = $_POST['staffFather'];
    $staffAddr = $_POST['staffAddr'];
    $selectRole = $_POST['selectRole'];
    $startDate = $_POST['startDate'];
    $selectBuilding = $_POST['whichbuilding'];
    $nidFront = $_FILES['staffNIDfront']['name'];
    $nidFrontTemp = $_FILES['staffNIDfront']['tmp_name'];
    $nidFrontDir = 'users/staffs/staffsNID/' . $nidFront;
    $nidBack = $_FILES['staffNIDback']['name'];
    $nidBackTemp = $_FILES['staffNIDback']['tmp_name'];
    $nidBackDir = 'users/staffs/staffsNID/' . $nidBack;
    $picture = $_FILES['staffpicture']['name'];
    $pictureTemp = $_FILES['staffpicture']['tmp_name'];
    $pictureDir = 'users/staff/staffsNID/' . $picture;
    $pathnidfront ='users/staff/staffsNID/' . $nidFront;
    $pathnidback ='users/staff/staffsNID/' . $nidBack;
    $pathpicture ='users/staff/staffsNID/' . $picture;

    move_uploaded_file($nidFrontTemp, $pathnidfront);
    move_uploaded_file($nidBackTemp, $pathnidback);
    move_uploaded_file($pictureTemp, $pathpicture);

    $sql = "INSERT IGNORE INTO staff (staffName, staffContact, staffRole, staffStart, staffNidFront, staffNidBack, staffPicture, staffBuilding, staffFather, staffAddr) 
    VALUES ('$staffName', '$staffContact', '$selectRole', '$startDate', '$nidFrontDir', '$nidBackDir', '$pictureDir', '$selectBuilding', '$staffFather', '$staffAddr')";

    $mysqli->query($sql) or die($mysqli->error);

    echo "<script>
    alert('New staff added succesfully');
    window.location='add-staff.php';
    </script>";
}
?>

<?php
include ('includes/footer.php');
?>