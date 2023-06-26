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
    // $user = $_SESSION['usertype'];
// if (isset($user)) {
//     if ($user != 'admin') {
//         echo "<script>
//         alert('Youre not allowed to access this page.');
//         window.location='/apartment/manager/managerFeed.php';
//         </script>";
//     }
// }
    
    $sqlforstaff = "SELECT staff.staffName, staff.staffContact, staff.staffRole, staff.staffStart, payment.payMonth, payment.payAmount, payment.payDate FROM staff RIGHT JOIN payment ON payment.staffName = staff.staffName ORDER BY staff.staffName ASC;";
    $resultforstaff = mysqli_query($mysqli, $sqlforstaff) or die(mysqli_error($mysqli));

    $sqlallstaff = "SELECT * FROM $staff";
    $resultallstaff = mysqli_query($mysqli, $sqlallstaff) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-11">
                        <h2 class="building__header">All the Staff</h2>
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Staff Name</th>
                                        <th>Contact</th>
                                        <th>Role</th>
                                        <th>Starting Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($dataallstaff = $resultallstaff->fetch_assoc()) { ?>
                                        <tr>
                                            <td>
                                                <a href="staff-details.php?user=<?= $dataallstaff['staffName'] ?>"
                                                    class="custom__a"><?= $dataallstaff['staffName'] ?></a>
                                            </td>
                                            <td>
                                                <?= $dataallstaff['staffContact'] ?>
                                            </td>
                                            <td>
                                                <?= $dataallstaff['staffRole'] ?>
                                            </td>
                                            <td>
                                                <?= $dataallstaff['staffStart'] ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-11">
                        <h2 class="building__header">Payment Details</h2>
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>Staff Name</th>
                                        <th>Contact</th>
                                        <th>Role</th>
                                        <th>Starting Date</th>
                                        <th>Last Paid Month</th>
                                        <th>Last Paid Amount</th>
                                        <th>Last Payment Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($dataforstaff = $resultforstaff->fetch_assoc()) { ?>
                                        <tr>
                                            <td>
                                                <?= $dataforstaff['staffName'] ?>
                                            </td>
                                            <td>
                                                <?= $dataforstaff['staffContact'] ?>
                                            </td>
                                            <td>
                                                <?= $dataforstaff['staffRole'] ?>
                                            </td>
                                            <td>
                                                <?= $dataforstaff['staffStart'] ?>
                                            </td>
                                            <td>
                                                <?= $dataforstaff['payMonth'] ?>
                                            </td>
                                            <td>
                                                <?= $dataforstaff['payAmount'] ?>
                                            </td>
                                            <td>
                                                <?= $dataforstaff['payDate'] ?>
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