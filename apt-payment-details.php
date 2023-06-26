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
    
    $apt = $_GET['apt'];
    $sqlformonth = "SELECT * FROM $rent WHERE rentApt LIKE '$apt' ORDER BY rentMonth ASC";
    $resultformonth = mysqli_query($mysqli, $sqlformonth) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive table--no-card m-b-30">
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
</div>

<?php
include ('includes/footer.php');
?>