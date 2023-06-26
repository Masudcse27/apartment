<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
include ('includes/db-config.php');
include ('includes/header.php');

?>
<?php
$update = $_GET['update'];
$user = $_GET['user'];

$fetchbldsql = "SELECT * FROM $building";
$resultbld = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("#staticBackdrop").modal('show');
    });
</script>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal" id="info-form">
                    <?php
                    switch ($update) {
                        case 'name': ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tenant Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="tenantName" placeholder="Tenant Name"
                                        class="form-control" required>
                                    <small class="form-text text-muted">Full Name of the Tenant (As in
                                        NID)</small>
                                </div>
                            </div>

                            <?php break;

                        case 'fname': ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Father's Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="fatherName" placeholder="Father's Name"
                                        class="form-control" required>
                                    <small class="form-text text-muted">Full Name of the Father of the Tenant
                                        (As in
                                        NID)</small>
                                </div>
                            </div>

                            <?php break;

                        case 'email': ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label">Tenant Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="email" id="email-input" name="tenantEmail" placeholder="Tenant Email"
                                        class="form-control" required>
                                    <small class="help-block form-text">Valid email address of the
                                        tenant</small>
                                </div>
                            </div>

                            <?php break;

                        case 'mobile': ?>
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

                            <?php break;

                        case 'address': ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Permanent
                                        Address</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="prmntadr" placeholder="Full Address"
                                        class="form-control" required>
                                    <small class="form-text text-muted">Permanent Address of the Tenant</small>
                                </div>
                            </div>

                            <?php break;

                        case 'village': ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Village</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="village" placeholder="Village" class="form-control"
                                        required>
                                </div>
                            </div>

                            <?php break;

                        case 'po': ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">P. O.</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="po" placeholder="Post Office" class="form-control"
                                        required>
                                </div>
                            </div>

                            <?php break;

                        case 'ps': ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">P. S.</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="ps" placeholder="Police Station"
                                        class="form-control" required>
                                </div>
                            </div>

                            <?php break;

                        case 'district': ?>
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

                            <?php break;

                        case 'rent': ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label">Monthly Rent</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" name="monRent" class="form-control" placeholder="Monthly rent Amount"
                                        required>
                                </div>
                            </div>

                            <?php break;

                        case 'date': ?>
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

                            <?php break;

                        case 'building': ?>
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

                            <?php break;

                        case 'nid': ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">NID Number</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="nidno" placeholder="NID Number"
                                        class="form-control" required>
                                </div>
                            </div>

                            <?php break;

                        case 'nidf': ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file-input" class="form-control-label">Upload Front side of the NID</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="file-input" name="tenantNIDfront" accept="image/*"
                                        class="form-control-file">
                                </div>
                            </div>

                            <?php break;

                        case 'nidb': ?>
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

                            <?php break;

                        case 'picture': ?>
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

                            <?php break;
                        default:
                            echo "<script>window.close();</script>";
                            break;
                    }
                    ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    onclick="gotoMain()">Close</button>
                <input type="submit" value="Update" name="updateBtn" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function gotoMain() {
        window.close();
    }
</script>

<?php
if (isset($_POST['updateBtn'])) {

    switch ($update) {
        case 'name':
            $tenantName = $_POST['tenantName'];

            $sql = "UPDATE $tenant SET 
            tenantName = '$tenantName' 
            WHERE tenantID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);

            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'fname':
            $fName = $_POST['fatherName'];

            $sql = "UPDATE $tenant SET 
            fatherName = '$fName' 
            WHERE tenantID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);
            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'email':
            $tenantEmail = $_POST['tenantEmail'];

            $sql = "UPDATE $tenant SET  
            tenantEmail = '$tenantEmail' 
            WHERE tenantID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);
            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'mobile':
            $tenantContact = $_POST['tenantContact'];

            $sql = "UPDATE $tenant SET  
            tenantContact = '$tenantContact' 
            WHERE tenantID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);
            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'address':
            $pAdd = $_POST['prmntadr'];

            $sql = "UPDATE $tenant SET  	
            pAddress = '$pAdd' 
            WHERE tenantID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);
            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'village':
            $vill = $_POST['village'];

            $sql = "UPDATE $tenant SET  
            village = '$vill'
            WHERE tenantID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);
            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'po':
            $po = $_POST['po'];

            $sql = "UPDATE $tenant SET  
            po = '$po'
            WHERE tenantID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);
            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'ps':
            $ps = $_POST['ps'];

            $sql = "UPDATE $tenant SET  
            ps = '$ps'
            WHERE tenantID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);
            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'district':
            $district = $_POST['district'];

            $sql = "UPDATE $tenant SET  
            district = '$district' 
            WHERE tenantID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);
            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'rent':
            $monRent = $_POST['monRent'];

            $sql = "UPDATE $tenant SET  
            monRent = '$monRent' 
            WHERE tenantID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);
            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'date':
            $startDate = $_POST['startDate'];

            $sql = "UPDATE $tenant SET  
            tenantStart = '$startDate' 
            WHERE tenantID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);
            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'building':
            $selectBuilding = $_POST['whichbuilding'];
            $floor = $_POST['whichfloor'];
            $side = $_POST['whichwing'];
            $apartment = "B" . $selectBuilding . "AP" . $floor . $side;

            $sql = "UPDATE $tenant SET  
            building = '$selectBuilding',
            apartmentName = '$apartment' 
            WHERE tenantID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);
            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'nid':
            $nidno = $_POST['nidno'];

            $sql = "UPDATE $tenant SET 
            nidNumber = '$nidno' 
            WHERE tenantID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);
            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'nidf':
            $nidFront = $_FILES['tenantNIDfront']['name'];
            $nidFrontTemp = $_FILES['tenantNIDfront']['tmp_name'];
            $nidFrontDir = 'users/tenants/tenantsNID/' . $nidFront;
            $pathnidfront = 'users/tenants/tenantsNID/' . $nidFront;

            // Check if file was uploaded successfully
            if ($_FILES['tenantNIDfront']['error'] === UPLOAD_ERR_OK) {
                // Move uploaded file to its final destination
                if (move_uploaded_file($nidFrontTemp, $pathnidfront)) {
                    $sql = "UPDATE $tenant SET nidFrontDir = '$nidFrontDir' WHERE tenantID = '$user'";
                    $mysqli->query($sql) or die($mysqli->error);
                    echo "<script>alert('Updated Successfully!'); window.close();</script>";
                } else {
                    echo "Error: Failed to move uploaded file.";
                }
            } else {
                echo "Error: " . $_FILES['tenantNIDfront']['error'];
            }

            break;

        case 'nidb':
            $nidback = $_FILES['tenantNIDback']['name'];
            $nidbackTemp = $_FILES['tenantNIDback']['tmp_name'];
            $nidbackDir = 'users/tenants/tenantsNID/' . $nidback;
            $pathnidback = 'users/tenants/tenantsNID/' . $nidback;

            // Check if file was uploaded successfully
            if ($_FILES['tenantNIDback']['error'] === UPLOAD_ERR_OK) {
                // Move uploaded file to its final destination
                if (move_uploaded_file($nidbackTemp, $pathnidback)) {
                    $sql = "UPDATE $tenant SET nidBackDir = '$nidbackDir' WHERE tenantID = '$user'";
                    $mysqli->query($sql) or die($mysqli->error);
                    echo "<script>alert('Updated Successfully!'); window.close();</script>";
                } else {
                    echo "Error: Failed to move uploaded file.";
                }
            } else {
                echo "Error: " . $_FILES['tenantNIDback']['error'];
            }
            break;

        case 'picture':
            $picture = $_FILES['tenantpicture']['name'];
            $pictureTemp = $_FILES['tenantpicture']['tmp_name'];
            $pictureDir = 'users/tenants/tenantsNID/' . $picture;
            $pathpicture ='users/tenants/tenantsNID/' . $picture;

            // Check if file was uploaded successfully
            if ($_FILES['tenantpicture']['error'] === UPLOAD_ERR_OK) {
                // Move uploaded file to its final destination
                if (move_uploaded_file($pictureTemp, $pathpicture)) {
                    $sql = "UPDATE $tenant SET profilepic = '$pictureDir' WHERE tenantID = '$user'";
                    $mysqli->query($sql) or die($mysqli->error);
                    echo "<script>alert('Updated Successfully!'); window.close();</script>";
                } else {
                    echo "Error: Failed to move uploaded file.";
                }
            } else {
                echo "Error: " . $_FILES['tenantpicture']['error'];
            }
            break;
        default:
            echo "<script>window.close();</script>";
            break;
    }
}
?>
<?php
include ('includes/footer.php');
?>