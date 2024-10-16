<?php
// Include the connection file
include("connection.php");

// Check if ownerID is set and not empty
if(isset($_POST['ownerID']) && !empty($_POST['ownerID'])) {
    // Sanitize ownerID to prevent SQL injection
    $ownerID = mysqli_real_escape_string($con, $_POST['ownerID']);

    // Query to delete the owner with the specified ownerID
    $query = "DELETE FROM Owner WHERE OwnerID = '$ownerID'";

    // Execute the query
    if (mysqli_query($con, $query)) {
        echo "Owner with ID $ownerID has been removed successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Owner ID is not provided or empty.";
}

// Close the connection
mysqli_close($con);
?>
