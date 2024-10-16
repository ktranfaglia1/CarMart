<?php
// Include the connection file
include("connection.php");

// Check if the form is submitted and the 'lastName' field is set
if(isset($_POST['lastName']) && !empty($_POST['lastName'])) {
    // Sanitize input to prevent SQL injection
    $lastName = mysqli_real_escape_string($con, $_POST['lastName']);

    // Query to search for owners by last name (similar)
    $query = "SELECT * FROM Owner WHERE LastName LIKE '%$lastName%'";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Display header
    echo "<b><center>Search Results for Owner</center></b><br><br>";

    // Check if there are any records
    if (mysqli_num_rows($result) > 0) {
        // Display table header
        echo "<center><table border='1'>";
        echo "<tr>";
        echo "<th>Last Name</th>";
        echo "<th>First Name</th>";
        echo "<th>Email</th>";
        echo "<th>Phone</th>";
        echo "<th>Street</th>";
        echo "<th>City</th>";
        echo "<th>State</th>";
        echo "<th>Postal</th>";
        echo "</tr>";

        // Fetch and display each record
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['LastName'] . "</td>";
            echo "<td>" . $row['FirstName'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Phone'] . "</td>";
            echo "<td>" . $row['Street'] . "</td>";
            echo "<td>" . $row['City'] . "</td>";
            echo "<td>" . $row['State'] . "</td>";
            echo "<td>" . $row['Postal'] . "</td>";
            echo "</tr>";
        }

        echo "</table></center>";
    } else {
        echo "No sellers found for the specified last name.";
    }
} else {
    echo "Please enter a seller's last name to search.";
}

// Close the connection
mysqli_close($con);
?>
