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
    $resultbld = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));

    $invoicesql = "SELECT * FROM invoice ORDER BY invoiceID DESC";
    $invoiceresult = mysqli_query($mysqli, $invoicesql) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Print old invoices
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Building of
                                                the
                                                Apartment</label>
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
                                    <div id="apted"></div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Rent of the month</label>
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
                                            <label for="select" class=" form-control-label">Rent of the month</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="paymentyear" id="select" class="form-control">
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                                <option value="2031">2031</option>
                                                <option value="2032">2032</option>
                                                <option value="2033">2033</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="collectBtn" value="Print"
                                            class="btn btn-primary btn-sm">
                                        <button type="reset" class="btn btn-danger btn-sm"
                                            onclick="resetform()">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="table-responsive m-b-30">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>Apartment</th>
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th>Monthly Fair</th>
                                        <th>Gas Bill</th>
                                        <th>Elc Bill</th>
                                        <th>Others Bill</th>
                                        <th>Due Rent</th>
                                        <th>Total</th>
                                        <th>Received</th>
                                        <th>New Due</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($invoicedata = mysqli_fetch_assoc($invoiceresult)) { ?>
                                        <tr>
                                            <td>
                                                <?= $invoicedata['apartment'] ?>
                                            </td>
                                            <td>
                                                <?= $invoicedata['month'] ?>
                                            </td>
                                            <td>
                                                <?= $invoicedata['year'] ?>
                                            </td>
                                            <td>
                                                <?= $invoicedata['monthlyRent'] ?>
                                            </td>
                                            <td>
                                                <?= $invoicedata['gasBill'] ?>
                                            </td>
                                            <td>
                                                <?= $invoicedata['elcBill'] ?>
                                            </td>
                                            <td>
                                                <?= $invoicedata['otherBill'] ?>
                                            </td>
                                            <td>
                                                <?= $invoicedata['rentDue'] ?>
                                            </td>
                                            <td>
                                                <?= $invoicedata['total'] ?>
                                            </td>
                                            <td>
                                                <?= $invoicedata['amount'] ?>
                                            </td>
                                            <td>
                                                <?= $invoicedata['newDue'] ?>
                                            </td>
                                            <td>
                                                <div style="display:flex; gap:5px;">
                                                    <button type="button" class="btn btn-outline-primary btn-sm"
                                                        onclick="window.location='print-old-invoice.php?apt=<?= $invoicedata['apartment'] ?>&month=<?= $invoicedata['month'] ?>&year=<?= $invoicedata['year'] ?>';"><i
                                                            class="fa fa-print"></i></button>
                                                    <!-- <button type="button" class="btn btn-outline-primary btn-sm"
                                                        onclick="window.location='/ams/del-invoice.php?apt=<?= $invoicedata['apartment'] ?>&month=<?= $invoicedata['month'] ?>&year=<?= $invoicedata['year'] ?>';"><i
                                                            class="fa fa-ban"></i></button> -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
                url: "rent-show-apt.php",
                data: "bld=" + selectedBld,
                success: function (response) {
                    $("#apted").html(response);
                }
            })
        });
        $("#info-form").on('change', '#selectflr', function () {
            selectedFlr = $(this).val();
        });
    });
</script>

<?php
if (isset($_POST['collectBtn'])) {
    $floor = $_POST['whichfloor'];
    $month = $_POST['paymentmonth'];
    $year = $_POST['paymentyear'];

    echo "<script>
    window.location='print-old-invoice.php?apt=$floor&month=$month&year=$year';
    </script>";
}
?>

<?php
include ('includes/footer.php');
?>