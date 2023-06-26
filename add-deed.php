<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
error_reporting(0);
include ('includes/db-config.php');
include ('includes/header.php');
include ('includes/header-mobile.php');
// include ('includes/sidebar.php'); 
// include ROOT . '/includes/sidebar.php'; ?>
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
                                Add Deed
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Files</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" name="deedfile[]" id="deed" accept=".pdf, image/*"
                                                multiple>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="adddeed" class="btn btn-primary btn-sm">
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

if (isset($_POST['adddeed'])) {
    $uid = $_GET['id'];

    foreach ($_FILES['deedfile']['tmp_name'] as $key => $tmp_name) {

        $file = $_FILES['deedfile']['name'][$key];
        $fileTemp = $_FILES['deedfile']['tmp_name'][$key];
        $fileDir = 'users/tenants/deed/' . $file;
        $pathfile = 'users/tenants/deed/' . $file;
        $fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        $insertdeedsql = "INSERT IGNORE INTO deed(tenantID, deedPath, ext) VALUES ('$uid','$fileDir', '$fileExtension')";
        if ($mysqli->query($insertdeedsql)) {
            move_uploaded_file($fileTemp, $pathfile);
            echo "<script>
            alert('Deed Uploaded Succesfully');
            window.location='deed-list.php';
            </script>";
        } else {
            echo "<script>
            alert('Something Went Wrong! Please try again.');
            window.location='add-deed.php';
            </script>";
        }
    }
}

?>
<?php
include ('includes/footer.php');
?>