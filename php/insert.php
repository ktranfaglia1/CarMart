<?php
include("connection.php");

// Collect all the information passed from the form using $_POST array variable.
$make = $_POST['make'];
$model = $_POST['model'];
$year = $_POST['year'];
$mileage = $_POST['mileage'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$postal = $_POST['postal'];
$regnumber = $_POST['regnumber'];
$price = $_POST['price'];

// Insert the contact information into the database
$query = "INSERT INTO Owner (FirstName, LastName, Email, Phone, Street, City, State, Postal)
VALUES ('$fname', '$lname', '$email', '$phone', '$street', '$city', '$state', '$postal')";
$result = mysqli_query($con, $query);

// If the vehicle information is inserted successfully, continue with contact and registration information
if ($result) {
    // Get the last inserted vehicle ID
    $lastOwnerID = mysqli_insert_id($con);

    // Insert the vehicle information into the database
    $query = "INSERT INTO Vehicle (Make, Model, Year, Mileage, OwnerID) VALUES ('$make', '$model', '$year', '$mileage', '$lastOwnerID')";
    $result = mysqli_query($con, $query);

    // If contact information is inserted successfully, insert registration information
    if ($result) {
        // Get the last inserted vehicle ID
        $lastVehicleID = mysqli_insert_id($con);

        // Insert the registration information into the database
        $query = "INSERT INTO Registration (Regnumber, SaleDate, SalePrice, VehicleID, OwnerID)
                    VALUES ('$regnumber', NOW(), '$price', '$lastVehicleID', '$lastOwnerID')";
        $result = mysqli_query($con, $query);

        // If all data is inserted successfully, display the information in a table
        if ($result) {
            // Retrieve the inserted data from the database
            $query = "SELECT Vehicle.*, Registration.Regnumber, Registration.SaleDate, Registration.SalePrice FROM Vehicle
                        JOIN Registration ON Vehicle.VehicleID = Registration.VehicleID";
            $result = mysqli_query($con, $query);

            // If data is retrieved successfully, display it in a table
            if ($result) {
                echo "<b><center>List of Vehicle Information</b><br><br>";
                echo "<table border='1'>";
                echo "<tr><th>Make</th><th>Model</th><th>Year</th><th>Mileage</th><th>Regnumber</th><th>SaleDate</th><th>SalePrice</th></tr>";

                // Display the retrieved information for all rows
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['Make']."</td>";
                    echo "<td>".$row['Model']."</td>";
                    echo "<td>".$row['Year']."</td>";
                    echo "<td>".$row['Mileage']."</td>";
                    echo "<td>".$row['Regnumber']."</td>";
                    echo "<td>".$row['SaleDate']."</td>";
                    echo "<td>".$row['SalePrice']."</td>";
                    echo "</tr>";
                }
                echo "</table></center>";
            } else {
                die("Cannot retrieve vehicle information");
            }
        } else {
            die("Cannot insert registration information");
        }
    } else {
        die("Cannot insert Owner information");
    }
} else {
    die("Cannot create new vehicle information");
}

mysqli_close($con);
?>
