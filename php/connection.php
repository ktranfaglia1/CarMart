<?php
// Set database connection information
$server = "localhost";
$user = "TranfagliaK";
$pass = "Salisbury060503$";
$dbname = "TranfagliaK";

$con = mysqli_connect($server, $user, $pass, $dbname); // Establish connection
// Check connection status
if (!$con) {
        echo "Error: ". mysqli_connect_error();
        exit();
}
echo "<b>Connection is successful</b><br/>";
?>
