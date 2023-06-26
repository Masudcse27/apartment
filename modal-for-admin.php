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

$fetchbldsql = "SELECT * FROM admin";
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
                                    <label for="text-input" class=" form-control-label">Admin Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="adminName" placeholder="Admin Name"
                                        class="form-control" required>
                                </div>
                            </div>

                            <?php break;

                        case 'email': ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label">Tenant Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="email" id="email-input" name="adminEmail" placeholder="Admin Email"
                                        class="form-control" required>
                                </div>
                            </div>

                            <?php break;

                        case 'password': ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label">Enter new password</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="password" name="adminPass" placeholder="New Password" class="form-control"
                                        required>
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
                <form action="#" method="POST">
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
            $adminName = $_POST['adminName'];

            $sql = "UPDATE admin SET 
            adminName = '$adminName'";

            $mysqli->query($sql) or die($mysqli->error);

            $_SESSION['username'] = $adminName;

            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'email':
            $adminEmail = $_POST['adminEmail'];

            $sql = "UPDATE admin SET  
            adminEmail = '$adminEmail'";

            $mysqli->query($sql) or die($mysqli->error);
            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'password':
            $adminPass = md5($_POST['adminPass']);

            $sql = "UPDATE admin SET  
            adminPass = '$adminPass'";

            $mysqli->query($sql) or die($mysqli->error);

            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
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