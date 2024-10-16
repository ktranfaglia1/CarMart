<?php
// Include the connection file
include("connection.php");

// Check if vehicleID is set and not empty
if(isset($_POST['vehicleID']) && !empty($_POST['vehicleID'])) {
    // Sanitize vehicleID to prevent SQL injection
    $vehicleID = mysqli_real_escape_string($con, $_POST['vehicleID']);

    // Start a transaction to ensure data consistency
    mysqli_begin_transaction($con);

    // Query to delete the registration associated with the vehicle
    $delete_registration_query = "DELETE FROM Registration WHERE VehicleID = '$vehicleID'";

    // Execute the registration deletion query
    if(mysqli_query($con, $delete_registration_query)) {
        // Query to delete the vehicle
        $delete_vehicle_query = "DELETE FROM Vehicle WHERE VehicleID = '$vehicleID'";
        
        // Execute the vehicle deletion query
        if(mysqli_query($con, $delete_vehicle_query)) {
            // Commit the transaction if both queries succeed
            mysqli_commit($con);
            echo "Vehicle with ID $vehicleID and its registration have been removed successfully.";
        } else {
            // Rollback the transaction if vehicle deletion fails
            mysqli_rollback($con);
            echo "Error removing vehicle: " . mysqli_error($con);
        }
    } else {
        // Rollback the transaction if registration deletion fails
        mysqli_rollback($con);
        echo "Error removing registration: " . mysqli_error($con);
    }
} else {
    echo "Vehicle ID is not provided or empty.";
}

// Close the connection
mysqli_close($con);
?>
