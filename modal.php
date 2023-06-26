<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
include ('includes/header.php');

?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("#staticBackdrop").modal('show');
    });
</script>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Print Invoice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you want to print invoice? If No, then press Close.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    onclick="gotoMain()">Close</button>
                <button type="button" class="btn btn-primary" onclick="gotoPrint()">Print</button>
            </div>
        </div>
    </div>
</div>
<script>
    function gotoPrint() {
        window.location = "printinvoice.php";
    }
    function gotoMain() {
        window.location = "rent-collect.php";
    }
</script>
<?php
include ('includes/footer.php');
?>