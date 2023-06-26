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

$fetchbldsql = "SELECT * FROM manager";
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
                                    <label for="text-input" class=" form-control-label">Manager Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="managerName" placeholder="Manager Name"
                                        class="form-control" required>
                                </div>
                            </div>

                            <?php break;

                        case 'email': ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="email" id="text-input" name="managerEmail" placeholder="Email"
                                        class="form-control" required>
                                </div>
                            </div>

                            <?php break;

                        case 'pass': ?>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label">Password</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="email-input" name="password" placeholder="Password"
                                        class="form-control" required>
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
            $managerName = $_POST['managerName'];

            $sql = "UPDATE manager SET 
            managerName = '$managerName' 
            WHERE managerID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);

            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'email':
            $managerEmail = $_POST['managerEmail'];

            $sql = "UPDATE manager SET 
            managerEmail = '$managerEmail' 
            WHERE managerID = '$user'";

            $mysqli->query($sql) or die($mysqli->error);
            echo "<script>
            alert('Updated Succesfully!');
            window.close();
            </script>";
            break;

        case 'pass':
            $managerPass = md5($_POST['password']);

            $sql = "UPDATE manager SET  
            managerPass = '$managerPass' 
            WHERE managerID = '$user'";

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