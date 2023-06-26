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
    // $usertype = $_SESSION['usertype'];
// if ($usertype != 'manager') {
//     echo "<script>
//     alert('You cannot check complains. Only manager can check.');
//     window.location='/apartment/index.php';</script>";
// }
    ?>
    <?php
    $cmpsql = "SELECT * FROM $complain";
    $result = mysqli_query($mysqli, $cmpsql) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>Who Complained</th>
                                        <th>Complain Details</th>
                                        <th>Apartment</th>
                                        <th>Complain Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td>
                                                <?= $data['cmpEmail'] ?>
                                            </td>
                                            <td>
                                                <?= $data['cmpDetails'] ?>
                                            </td>
                                            <td>
                                                <?= $data['cmpApt'] ?>
                                            </td>
                                            <td>
                                                <?= $data['cmpTime'] ?>
                                            </td>
                                            <td>
                                                <div style="display:flex; gap:5px;">
                                                    <?php if ($data['action'] == 1) { ?>
                                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                                            disabled><i class="fa fa-check"></i></button>
                                                    <?php } else if ($data['action'] == 0) { ?>
                                                            <button type="button" class="btn btn-outline-primary btn-sm"
                                                                onclick="window.location='action-taken.php?cmp=<?= $data['cmpID'] ?>';"><i
                                                                    class="fa fa-check"></i></button>
                                                    <?php } ?>
                                                    <button type="button" class="btn btn-outline-primary btn-sm"
                                                        onclick="window.location='del-complain.php?cmp=<?= $data['cmpID'] ?>';"><i
                                                            class="fa fa-ban"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include ('includes/footer.php');
?>