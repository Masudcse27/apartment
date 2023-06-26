<?php

$_SESSION['apt'] = $_GET['apt'];
$_SESSION['month'] = $_GET['month'];
$_SESSION['year'] = $_GET['year'];

echo "<script>
window.location = 'print-old-invoice.php';
</script>";