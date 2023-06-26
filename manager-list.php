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
    
    $sqlformanager = "SELECT * FROM manager";
    $resultforman = mysqli_query($mysqli, $sqlformanager) or die(mysqli_error($mysqli));

    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-11">
                        <h2 class="building__header">All the Manager</h2>
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Manager Name</th>
                                        <th>Manager Email</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($dataforman = $resultforman->fetch_assoc()) { ?>
                                        <tr>
                                            <td>
                                                <?= $dataforman['managerName'] ?>
                                            </td>
                                            <td>
                                                <?= $dataforman['managerEmail'] ?>
                                            </td>
                                            <td>
                                                <a class="custom__a"
                                                    href="update-manager.php?user=<?= $dataforman['managerID'] ?>">
                                                    <button type="button"
                                                        class="btn btn-outline-success btn-sm">Edit</button></a>
                                            </td>
                                            <td>
                                                <a class="custom__a"
                                                    href="del-manager.php?user=<?= $dataforman['managerID'] ?>">
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-sm">Delete</button></a>
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