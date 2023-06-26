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
    
    $sqlfortenant = "SELECT * FROM $tenant ORDER by tenantName ASC";
    $resultfortenant = mysqli_query($mysqli, $sqlfortenant) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Search Tenants
                                </label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="myInput" onkeyup="myFunction()" name="search"
                                    placeholder="Search..." class="form-control">
                            </div>
                        </div>
                        <h2 class="building__header">All the Tenants</h2>
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Tenant Name</th>
                                        <th>Apartment</th>
                                        <th>Building</th>
                                        <th>Show Deed</th>
                                        <th>Upload</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($datafortenant = $resultfortenant->fetch_assoc()) { ?>
                                        <tr>
                                            <td>
                                                <a class="custom__a"
                                                    href="user-details.php?user=<?= $datafortenant['tenantID'] ?>">
                                                    <?= $datafortenant['tenantName'] ?></a>
                                            </td>
                                            <td>
                                                <?= $datafortenant['apartmentName'] ?>
                                            </td>
                                            <td>
                                                <?= $datafortenant['building'] ?>
                                            </td>
                                            <td>
                                                <a class="custom__a"
                                                    href="view-deed.php?id=<?= $datafortenant['tenantID'] ?>">
                                                    <button type="button"
                                                        class="btn btn-outline-success btn-sm">Show</button></a>
                                            </td>
                                            <td>
                                                <a class="custom__a"
                                                    href="add-deed.php?id=<?= $datafortenant['tenantID'] ?>">
                                                    <button type="button"
                                                        class="btn btn-outline-info btn-sm">Upload</button></a>
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
<script>
    function myFunction() {

        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<?php
include ('includes/footer.php');
?>