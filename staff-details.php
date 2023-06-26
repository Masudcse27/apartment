<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
include ('includes/db-config.php');
include ('includes/header.php');
include ('includes/header-mobile.php');
include ('includes/sidebar.php'); ?>
<div class="page-container">
    <?php
    include ('includes/header-desktop.php');
    ?>
    <?php
    $user = $_GET['user'];
    $usersql = "SELECT * FROM $staff WHERE staffName = '$user'";
    $resultforb01 = mysqli_query($mysqli, $usersql) or die(mysqli_error($mysqli));
    $dataforb01 = $resultforb01->fetch_assoc();
    $dataforb01['staffNidFront'];
    $dataforb01['staffNidBack'];
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header custom__div">
                                <strong class="card-title">Staff Information</strong>
                                <a href="delete-user.php?name=<?= $dataforb01['staffName'] ?>"><input type="submit"
                                        value="Delete" class="btn btn-danger card-title"></a>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" style="width:20vh;"
                                        src="<?= $dataforb01['staffPicture'] ?>" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1" style="height:5vh">
                                        <?= $dataforb01['staffName'] ?>
                                    </h5>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <div>
                                        Role: <span>
                                            <?= $dataforb01['staffRole'] ?>
                                        </span>
                                    </div>
                                    <div>
                                        Contact: <span>
                                            <?= $dataforb01['staffContact'] ?>
                                        </span>
                                    </div>
                                    <div>
                                        <a href="<?= $dataforb01['staffNidFront'] ?>" target="_blank"><img
                                                src="<?= $dataforb01['staffNidFront'] ?>" alt=""
                                                style="width:50%; padding: 2vh 0 0 2vh;"></a>
                                        <a href="<?= $dataforb01['staffNidBack'] ?>" target="_blank"><img
                                                src="<?= $dataforb01['staffNidBack'] ?>" alt=""
                                                style="width:50%; padding: 2vh 0 0 2vh;"></a>
                                    </div>
                                </div>
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