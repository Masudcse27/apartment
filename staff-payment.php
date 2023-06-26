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
    $staffsql = "SELECT * FROM $staff";
    $staffresult = mysqli_query($mysqli, $staffsql) or die(mysqli_error($mysqli));

    $fetchbldsql = "SELECT * FROM $building";
    $result = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Staff Salary Form
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Staff Role</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="stafftype" id="select" class="form-control">
                                                <option value="security">Security</option>
                                                <option value="cleaner">Cleaner</option>
                                                <option value="caretaker">Care Taker</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">From which Building</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="bldname" id="select" class="form-control">
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
                                            <label for="select" class=" form-control-label">Salary of the month</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="paymentmonth" id="select" class="form-control">
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Staff Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="staffname" id="select" class="form-control">
                                                <?php while ($staffdata = $staffresult->fetch_assoc()) { ?>
                                                    <option value="<?= $staffdata['staffName'] ?>">
                                                        <?= $staffdata['staffName'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Amount</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" name="amount" placeholder="Staff Salary"
                                                class="form-control" required>
                                            <small class="help-block form-text">Salary of the staff</small>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="payBtn" value="Pay" class="btn btn-primary btn-sm">
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
include ('includes/footer.php');
?>