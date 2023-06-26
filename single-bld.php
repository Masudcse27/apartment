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
    
    $bld = $_GET['bld'];
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="building__header">
                            <h2>
                                <?php
                                $sqlforb01 = "SELECT * FROM apartment WHERE building = '$bld'";
                                $resultforb01 = mysqli_query($mysqli, $sqlforb01) or die(mysqli_error($mysqli));

                                $checkbld = "SELECT * FROM $building WHERE buildingName = '$bld'";
                                $checkbldrun = mysqli_query($mysqli, $checkbld) or die(mysqli_error($mysqli));
                                $checkdata = mysqli_fetch_assoc($checkbldrun);
                                echo $bld ?>
                            </h2>
                            <div>
                                <button type="button" class="btn btn-outline-danger btn-sm"
                                    onclick="window.location='del-bld.php?bld=<?= $bld ?>';">Delete</button>
                            </div>
                        </div>
                        <h4 style="padding-bottom: 2vh;">
                            Location:
                            <?= $checkdata['buildingLoc']; ?> ,
                            <?= $checkdata['buildingStor']; ?> storied building
                        </h4>
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>Apartment Name</th>
                                        <th>Apartment Owner</th>
                                        <th>Tenant Name</th>
                                        <th>Apartment Rent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($dataforb01 = $resultforb01->fetch_assoc()) {
                                        $chk = $dataforb01['apartmentName'];
                                        $chksql = "SELECT * FROM $tenant WHERE apartmentName = '$chk'";
                                        $chkrun = mysqli_query($mysqli, $chksql) or die(mysqli_error($mysqli));
                                        $chkrow = mysqli_num_rows($chkrun);
                                        $chkdata = mysqli_fetch_assoc($chkrun);
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $dataforb01['apartmentName'] ?>
                                            </td>
                                            <td>
                                                <?= $dataforb01['aptOwner'] ?>
                                            </td>
                                            <td>
                                                <?php if ($chkrow > 0) {
                                                    $tid = $chkdata['tenantID'];
                                                    ?>
                                                    <a href="user-details.php?user=<?= $tid ?>" class="custom__a">
                                                        <?= $chkdata['tenantName']; ?>
                                                    </a>
                                                <?php } else {
                                                    echo "Not Rented Yet";
                                                } ?>
                                            </td>
                                            <td>
                                                <?= $dataforb01['aptFair'] ?>
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