<?php
// Include the connection file
include("connection.php");

// Check if the form is submitted and the 'make' field is set
if(isset($_POST['make']) && !empty($_POST['make'])) {
    // Sanitize input to prevent SQL injection
    $make = mysqli_real_escape_string($con, $_POST['make']);

    // Query to search for vehicles by make
    $query = "SELECT Vehicle.*, Registration.* FROM Vehicle 
          INNER JOIN Registration ON Vehicle.VehicleID = Registration.VehicleID 
          WHERE Vehicle.Make LIKE '%$make%'";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Display header
    echo "<b><center>Search Results for Vehicle</center></b><br><br>";

    // Check if there are any records
    if (mysqli_num_rows($result) > 0) {
        // Display table header
        echo "<center><table border='1'>";
        echo "<tr>";
        echo "<th>Make</th>";
        echo "<th>Model</th>";
        echo "<th>Year</th>";
        echo "<th>Mileage</th>";
        echo "<th>Registration ID</th>";
        echo "<th>Sales Date</th>";
        echo "<th>Sales Price</th>";
        echo "</tr>";

        // Fetch and display each record
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Make'] . "</td>";
            echo "<td>" . $row['Model'] . "</td>";
            echo "<td>" . $row['Year'] . "</td>";
            echo "<td>" . $row['Mileage'] . "</td>";
            echo "<td>" . $row['Regnumber'] . "</td>";
            echo "<td>" . $row['SaleDate'] . "</td>";
            echo "<td>" . $row['SalePrice'] . "</td>";
            echo "</tr></center>";
        }

        echo "</table>";
    } else {
        echo "No vehicles found for the specified make.";
    }
} else {
    echo "Please enter a vehicle make to search.";
}

// Close the connection
mysqli_close($con);
?>
