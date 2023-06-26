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
    $totalbld = mysqli_num_rows($result);

    $fetchbldsql = "SELECT * FROM $apartment";
    $result = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));
    $totalapt = mysqli_num_rows($result);

    $fetchbldsql = "SELECT * FROM $staff";
    $result = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));
    $totalstaff = mysqli_num_rows($result);

    $fetchbldsql = "SELECT * FROM $tenant";
    $result = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));
    $totaltenant = mysqli_num_rows($result);
    ?>


    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">overview</h2>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-home"></i>
                                    </div>
                                    <div class="text">
                                        <h2>
                                            <?= $totalbld ?>
                                        </h2>
                                        <span>Buildings in total</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-city-alt"></i>
                                    </div>
                                    <div class="text">
                                        <h2>
                                            <?= $totalapt ?>
                                        </h2>
                                        <span>apartments in total</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-accounts"></i>
                                    </div>
                                    <div class="text">
                                        <h2>
                                            <?= $totaltenant ?>
                                        </h2>
                                        <span>tenants in total</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-accounts-outline"></i>
                                    </div>
                                    <div class="text">
                                        <h2>
                                            <?= $totalstaff ?>
                                        </h2>
                                        <span>staffs in total</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">
                            Recently Paid
                        </h2>
                        <?php
                        $sqlformonth = "SELECT * FROM $rent ORDER BY rentDate DESC";
                        $resultformonth = mysqli_query($mysqli, $sqlformonth) or die(mysqli_error($mysqli));
                        ?>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Received Date</th>
                                        <th>Apartment</th>
                                        <th>Received from</th>
                                        <th>Last Paid Month</th>
                                        <th>Last Paid <br>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($dataformonth = $resultformonth->fetch_assoc()) { ?>
                                        <tr>
                                            <td>
                                                <?= $dataformonth['rentDate'] ?>
                                            </td>
                                            <td>
                                                <?= $dataformonth['rentApt'] ?>
                                            </td>
                                            <td>
                                                <?= $dataformonth['rentReceived'] ?>
                                            </td>
                                            <td>
                                                <?= $dataformonth['rentMonth'] ?>
                                            </td>
                                            <td>
                                                <?= $dataformonth['rentAmount'] ?>
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
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>


<?php
include ('includes/footer.php');
?>