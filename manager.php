<?php
session_start();
error_reporting(0);
include ('includes/db-config.php');
include ('includes/header.php');


if ($_SESSION['username']) {
    echo "<script>window.location='dashboard.php';</script>";
}
?>
<div class="main-content" style="display:flex; justify-content:center; align-items:center;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Manager Login</div>
                        <div class="card-body card-block">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input type="email" id="email" name="useremail" placeholder="Manager Email"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-asterisk"></i>
                                        </div>
                                        <input type="password" id="password" name="userpassword"
                                            placeholder="Manager Password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <input type="submit" name="loginBtn" value="Login" class="btn btn-success btn-sm">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['loginBtn'])) {
    $useremail = $_POST['useremail'];
    $userpassword = md5($_POST['userpassword']);

    $sql = "SELECT * FROM $manager WHERE managerEmail = '$useremail' AND managerPass = '$userpassword'";

    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    $numrows = mysqli_num_rows($result);

    if ($numrows == 0) {
        echo "<script>
        alert('Wrong email or password');
        window.location='manager.php';
        </script>";
    } else {

        $data = $result->fetch_assoc();

        $_SESSION['username'] = $data['managerName'];
        $_SESSION['usertype'] = "manager";
        echo "<script>window.location='dashboard.php'</script>";
    }
}
?>
<?php
include ('includes/footer.php');
?>