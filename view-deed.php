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
    $uid = $_GET['id'];
    $get = "SELECT * FROM deed WHERE tenantID = '$uid'";
    $result = mysqli_query($mysqli, $get) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-11">
                        <h2 class="building__header">All the Tenants</h2>
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Tenant Name</th>
                                        <th>Deed File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data = $result->fetch_assoc()) {
                                        $tid = $data['tenantID'];
                                        $tget = "SELECT tenantName FROM tenant WHERE tenantID = '$tid'";
                                        $trun = mysqli_query($mysqli, $tget) or die(mysqli_error($mysqli));
                                        $tdata = mysqli_fetch_assoc($trun);
                                        ?>
                                        <tr>
                                            <td>
                                                <a class="custom__a"
                                                    href="user-details.php?user=<?= $data['tenantID'] ?>">
                                                    <?= $tdata['tenantName'] ?></a>
                                            </td>
                                            <td>
                                                <?php if ($data['ext'] == 'jpg' or $data['ext'] == 'jpeg' or $data['ext'] == 'png') { ?>
                                                    <div style="display:flex; flex-direction:column; gap:1vh;">
                                                        <img src="<?= $data['deedPath'] ?>" alt="deed" class="deedimg">
                                                        <a href="<?= $data['deedPath'] ?>" Download><button type="button"
                                                                class="btn btn-outline-success btn-sm">Download</button></a>
                                                    </div>
                                                <?php } else { ?>
                                                    <embed src="<?= $data['deedPath'] ?>" type="application/pdf" width="600"
                                                        height="600" />
                                                <?php } ?>
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

<?php
include ('includes/footer.php');
?>