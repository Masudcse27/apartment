<?php
session_start();
error_reporting(0);
include ('includes/db-config.php');
include ('includes/header.php');
include ('includes/header-mobile.php');

if ($_SESSION['username']) {
    echo "<script>window.location='dashboard.php';</script>";
}
?>



<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Drop your Complain
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Your email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="email" name="useremail"
                                                placeholder="Drop your valid email" class="form-control" required>
                                            <small class="help-block form-text">Remember, you have to be a member of the
                                                building to
                                                drop a complain</small>
                                        </div>
                                    </div>
                                    <div id="pred"></div>
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
    $("#info-form").on('change', '#email', function () {
        email = $(this).val();
        $.ajax({
            method: "GET",
            url: "complain-backend.php",
            data: "email=" + email,
            success: function (response) {
                $("#pred").html(response);
            }
        })
    });
</script>
<?php
if (isset($_POST['complainBtn'])) {
    $cmpEmail = $_POST['useremail'];
    $cmpDetails = $_POST['details'];
    $selectBuilding = $_POST['whichbuilding'];
    $floor = $_POST['whichfloor'];
    $side = $_POST['whichwing'];
    $cmpApt = "B" . $selectBuilding . "AP" . $floor . $side;

    $cmpsql = "INSERT IGNORE INTO $complain(cmpEmail, cmpDetails, cmpApt) VALUES ('$cmpEmail', '$cmpDetails', '$cmpApt')";
    $mysqli->query($cmpsql) or die($mysqli->error);
    echo "<script>
    alert('Your complaint is submitted.');
    window.location='index.php';</script>";

}
?>
<?php
include ('includes/footer.php');
?>