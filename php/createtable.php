<?php
include("connection.php");

// Create OWNER table
$ownerTable = "CREATE TABLE Owner (
    OwnerID int(6) NOT NULL AUTO_INCREMENT,
    FirstName varchar(30),
    LastName varchar(30),
    Email varchar(30),
    Phone varchar(10),
    Street varchar(30),
    City varchar(30),
    State varchar(2),
    Postal varchar(5),
    PRIMARY KEY(OwnerID)
)";
$resultOwnerTable = mysqli_query($con, $ownerTable);

// Create VEHICLE table
$vehicleTable = "CREATE TABLE Vehicle (
    VehicleID int(6) NOT NULL AUTO_INCREMENT,
    Make varchar(30),
    Model varchar(30),
    Year int(4),
    Mileage int(7),
    OwnerID int(6),
    PRIMARY KEY(VehicleID),
    FOREIGN KEY (OwnerID) REFERENCES Owner(OwnerID)
)";
$resultVehicleTable = mysqli_query($con, $vehicleTable);

// Create REGISTRATION table
$registrationTable = "CREATE TABLE Registration (
    Regnumber int(10) NOT NULL,
    SaleDate DATE,
    SalePrice DECIMAL(10,2),
    OwnerID int(6),
    VehicleID int(6),
    PRIMARY KEY(Regnumber),
    FOREIGN KEY (OwnerID) REFERENCES Owner(OwnerID),
    FOREIGN KEY (VehicleID) REFERENCES Vehicle(VehicleID)
)";
$resultRegistrationTable = mysqli_query($con, $registrationTable);

// Check if tables are created successfully
if ($resultOwnerTable && $resultVehicleTable && $resultRegistrationTable) {
    echo "Tables have been created successfully<br/>";
} else {
    echo "Error creating tables: " . mysqli_error($con);
}

mysqli_close($con);
?>
