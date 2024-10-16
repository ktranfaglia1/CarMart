<?php
// Include the connection file
include("connection.php");

// Check if the owner ID is set and not empty
if (isset($_POST['ownerID']) && !empty($_POST['ownerID'])) {
    // Sanitize input to prevent SQL injection
    $ownerID = mysqli_real_escape_string($con, $_POST['ownerID']);
    
    // Retrieve data from the form
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $street = mysqli_real_escape_string($con, $_POST['street']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $postal = mysqli_real_escape_string($con, $_POST['postal']);

    // Query to update the owner
    $query = "UPDATE Owner SET FirstName='$fname', LastName='$lname', Email='$email', Phone='$phone', Street='$street', City='$city', State='$state', Postal='$postal' WHERE OwnerID=$ownerID";

    // Execute the query
    if (mysqli_query($con, $query)) {
        echo "Owner updated successfully";
    } else {
        echo "Error updating owner: " . mysqli_error($con);
    }
} else {
    echo "Owner ID is required";
}

// Close the connection
mysqli_close($con);
?>
