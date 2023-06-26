<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
error_reporting(0);
include ('includes/db-config.php');
?>

<?php

// Start the session
session_start();

// Loop through the $_SESSION array
foreach ($_SESSION as $key => $value) {
    // Print the session ID and the key-value pair
    echo "Session ID: " . session_id() . " - " . $key . " = " . $value . "<br>";
}

?>

<?php
include ('includes/footer.php');
?>