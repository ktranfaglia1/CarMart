<?php
// Include the connection file
include("connection.php");

// Query to select all owner, vehicle, and registration information
$query = "SELECT Owner.*, Vehicle.*, Registration.* FROM Owner 
        INNER JOIN Vehicle ON Owner.OwnerID = Vehicle.OwnerID 
        INNER JOIN Registration ON Owner.OwnerID = Registration.OwnerID";

// Execute the query
$result = mysqli_query($con, $query);

// Display header
echo "<center><b>All Owner and Vehicle Information</b></center><br><br>";

// Check if there are any records
if (mysqli_num_rows($result) > 0) {
    // Fetch and display each record
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<center><table border='1'>";
        echo "<tr>";
        echo "<td colspan='4' class='header'>Vehicle Information</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><label>Vehicle ID:</label></td>";
        echo "<td>" . $row['VehicleID'] . "</td>";
        echo "<td><label>Make:</label></td>";
        echo "<td>" . $row['Make'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><label>Model:</label></td>";
        echo "<td>" . $row['Model'] . "</td>";
        echo "<td><label>Year:</label></td>";
        echo "<td>" . $row['Year'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><label>Mileage:</label></td>";
        echo "<td>" . $row['Mileage'] . "</td>";
        echo "<td><label>Registration ID:</label></td>";
        echo "<td>" . $row['Regnumber'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><label>Sale Date:</label></td>";
        echo "<td>" . $row['SaleDate'] . "</td>";
        echo "<td><label>Sale Price:</label></td>";
        echo "<td>" . $row['SalePrice'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='4' class='header'>Seller Information</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><label>Owner ID:</label></td>";
        echo "<td>" . $row['OwnerID'] . "</td>";
        echo "<td><label>First Name:</label></td>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><label>Last Name:</label></td>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "<td><label>Email:</label></td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><label>Phone:</label></td>";
        echo "<td>" . $row['Phone'] . "</td>";
        echo "<td colspan='2'></td>"; // Empty cells to align columns
        echo "</tr>";
        echo "<tr>";
        echo "<td><label>Street:</label></td>";
        echo "<td>" . $row['Street'] . "</td>";
        echo "<td><label>City:</label></td>";
        echo "<td>" . $row['City'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><label>State:</label></td>";
        echo "<td>" . $row['State'] . "</td>";
        echo "<td><label>Postal:</label></td>";
        echo "<td>" . $row['Postal'] . "</td>";
        echo "</tr>";
        echo "</table></center>";
        echo "<br><br><br>"; 
    }
} else {
    echo "No owner and vehicle information found.";
}

// Close the connection
mysqli_close($con);
?>
