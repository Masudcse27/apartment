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
    $fetchbldsql = "SELECT * FROM $building";
    $resultbld = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Add Tenant Form
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tenant Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="tenantName"
                                                placeholder="Tenant Name" class="form-control" required>
                                            <small class="form-text text-muted">Full Name of the Tenant (As in
                                                NID)</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Father's Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="fatherName"
                                                placeholder="Father's Name" class="form-control" required>
                                            <small class="form-text text-muted">Full Name of the Father of the Tenant
                                                (As in
                                                NID)</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Tenant Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="email-input" name="tenantEmail"
                                                placeholder="Tenant Email" class="form-control" required>
                                            <small class="help-block form-text">Valid email address of the
                                                tenant</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Tenant Mobile</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="tel" name="tenantContact" placeholder="Tenant Contact Number"
                                                class="form-control" required>
                                            <small class="help-block form-text">Valid Mobile Number of the
                                                tenant</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Permanent
                                                Address</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="prmntadr"
                                                placeholder="Full Address" class="form-control" required>
                                            <small class="form-text text-muted">Permanent Address of the Tenant</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Village</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="village" placeholder="Village"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">P. O.</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="po" placeholder="Post Office"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">P. S.</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="ps" placeholder="Police Station"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">District</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="district" id="select" class="form-control">
                                                <option value="Dhaka">Dhaka</option>
                                                <option value="Rajshahi">Rajshahi</option>
                                                <option value="Khulna">Khulna</option>
                                                <option value="Barisal">Barisal</option>
                                                <option value="Sylhet">Sylhet</option>
                                                <option value="Chittagong">Chittagong</option>
                                                <option value="Rangpur">Rangpur</option>
                                                <option value="Mymensingh">Mymensingh</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Monthly Rent</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" name="monRent" class="form-control"
                                                placeholder="Monthly rent Amount" required>
                                        </div>
                                    </div> -->
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Tenant Start
                                                Date</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" name="startDate" class="form-control" required>
                                            <small class="help-block form-text">Pick the date</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Building</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="whichbuilding" id="selectbld" class="form-control">
                                                <option disabled selected>Choose</option>
                                                <?php while ($databld = $resultbld->fetch_assoc()) { ?>
                                                    <option value="<?= $databld['buildingName'] ?>">
                                                        <?= $databld['buildingName'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="blankdBld"></div>
                                    <div id="pred"></div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">NID Number</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="nidno" placeholder="NID Number"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Upload Front side of the
                                                NID</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="tenantNIDfront" accept="image/*"
                                                class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Upload Back side of the
                                                NID</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="tenantNIDback" accept="image/*"
                                                class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Upload Picture of the
                                                tenant</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="tenantpicture" accept="image/*"
                                                class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="submitBtn" value="Add"
                                            class="btn btn-primary btn-sm">
                                        <button type="reset" class="btn btn-danger btn-sm" onclick="resetform()">
                                            Reset
                                        </button>
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

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var selectedBld = '';
        var selectedFlr = '';

        $("#selectbld").change(function () {
            selectedBld = $(this).val();

            $.ajax({
                method: "GET",
                url: "show-blank-bld.php",
                data: "bld=" + selectedBld,
                success: function (response) {
                    $("#blankdBld").html(response);
                }
            })
        });
        $("#info-form").on('change', '#selectflr', function () {
            selectedFlr = $(this).val();
            $.ajax({
                method: "GET",
                url: "apt-fair-backend.php",
                data: "flr=" + selectedFlr,
                success: function (response) {
                    $("#pred").html(response);
                }
            })
        });
    });
</script>

<?php
if (isset($_POST['submitBtn'])) {
    $tenantName = $_POST['tenantName'];
    $fName = $_POST['fatherName'];
    $tenantEmail = $_POST['tenantEmail'];
    $tenantContact = $_POST['tenantContact'];
    $pAdd = $_POST['prmntadr'];
    $vill = $_POST['village'];
    $po = $_POST['po'];
    $ps = $_POST['ps'];
    $district = $_POST['district'];
    $monRent = $_SESSION['apt_fair_for_tenant'];
    $startDate = $_POST['startDate'];
    $selectBuilding = $_POST['whichbuilding'];
    $apartment = $_POST['whichfloor'];
    // $side = $_POST['whichwing'];
    $nidno = $_POST['nidno'];
    // $apartment = "B" . $selectBuilding . "AP" . $floor . $side;
    $nidFront = $_FILES['tenantNIDfront']['name'];
    $nidFrontTemp = $_FILES['tenantNIDfront']['tmp_name'];
    $nidFrontDir = 'users/tenants/tenantsNID/' . $nidFront;
    $nidBack = $_FILES['tenantNIDback']['name'];
    $nidBackTemp = $_FILES['tenantNIDback']['tmp_name'];
    $nidBackDir = 'users/tenants/tenantsNID/' . $nidBack;
    $picture = $_FILES['tenantpicture']['name'];
    $pictureTemp = $_FILES['tenantpicture']['tmp_name'];
    $pictureDir = 'users/tenants/tenantsNID/' . $picture;
    $pathnidfront ='users/tenants/tenantsNID/' . $nidFront;
    $pathnidback ='users/tenants/tenantsNID/' . $nidBack;
    $pathpicture ='users/tenants/tenantsNID/' . $picture;

    $updateapt = "UPDATE apartment SET 
    tenantName = '$tenantName',
    aptFair = '$monRent'
    WHERE apartmentName = '$apartment'";

    if ($mysqli->query($updateapt)) {

        move_uploaded_file($nidFrontTemp, $pathnidfront);
        move_uploaded_file($nidBackTemp, $pathnidback);
        move_uploaded_file($pictureTemp, $pathpicture);
        $monthName=["January","February","March","April","May","June","July","August","September","October","November","December"];
        $currentMonth =$startDate[5];
        $currentMonth=($currentMonth*10)+$startDate[6];
        $currentMonth=$monthName[$currentMonth-1];
        $sql = "INSERT IGNORE INTO 
        tenant (tenantName, apartmentName, tenantContact, monRent, tenantStart, tenantEmail, nidFrontDir, nidBackDir, profilepic, building, fatherName, 	pAddress, po, ps, district, village, nidNumber,lastPaid,fstmont)
        VALUES ('$tenantName', '$apartment', '$tenantContact', '$monRent', '$startDate','$tenantEmail', '$nidFrontDir', '$nidBackDir', '$pictureDir', '$selectBuilding', '$fName', '$pAdd', '$po', '$ps', '$district', '$vill', '$nidno','$currentMonth',1)";

        $mysqli->query($sql) or die($mysqli->error);


        // Session Variables
        $_SESSION['tenantName'] = $_POST['tenantName'];
        $_SESSION['fName'] = $_POST['fatherName'];
        $_SESSION['tenantEmail'] = $_POST['tenantEmail'];
        $_SESSION['tenantContact'] = $_POST['tenantContact'];
        $_SESSION['pAdd'] = $_POST['prmntadr'];
        $_SESSION['vill'] = $_POST['village'];
        $_SESSION['po'] = $_POST['po'];
        $_SESSION['ps'] = $_POST['ps'];
        $_SESSION['district'] = $_POST['district'];
        // $_SESSION['monRent'] = $_POST['monRent'];
        $_SESSION['monRentWords'] = convertNumber($_POST['monRent']);
        $_SESSION['startDate'] = $_POST['startDate'];
        $_SESSION['nidno'] = $_POST['nidno'];
        $_SESSION['apartment'] = $floor . $side;
        $_SESSION['picture'] = 'users/tenants/tenantsNID/' . $picture;

        echo "<script>
    alert('New tenant added succesfully');
    window.location='add-tenant.php';
    </script>";
    } else {
        echo "<script>
        alert('Add this apartment first');
        window.location='add-apt.php';
        </script>";
    }
}
?>
<?php
include ('includes/footer.php');
?>