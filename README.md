# CarMart

**A sales-operations web app for a fictional pre-owned car dealership: list vehicles for sale, search by vehicle or seller, update or remove records, and view the full inventory, all backed by a relational MySQL database.**

<p align="center"><img src="images/Carmart_logo.png" alt="CarMart logo" width="180"></p>

CarMart began as the final project for COSC 386 (Database Design and Implementation) at Salisbury University. I later expanded it into a fuller internal tool. Dealership employees can manage owners, vehicles and sales through simple forms, without touching SQL.

## Features

| Page | What employees can do |
|---|---|
| **Sell** (`form.html`) | Record a sale in one form: the seller's contact details, the vehicle (make, model, year, mileage), and the registration (registration number, sale date, sale price) |
| **Search** (`search.html`) | Find a vehicle or look up a seller; display every vehicle with its owner and registration |
| **Modify** (`alter.html`) | Update a vehicle's or owner's details; unlist a vehicle or remove a seller |

Results come back as structured tables that are easy to scan and update.

## Database design

The schema has three tables, created by `php/createtable.php`:

```
Owner(OwnerID PK, FirstName, LastName, Email, Phone, Street, City, State, Postal)
Vehicle(VehicleID PK, Make, Model, Year, Mileage, OwnerID FK → Owner)
Registration(Regnumber PK, SaleDate, SalePrice, OwnerID FK → Owner, VehicleID FK → Vehicle)
```

- `Registration` links each sale to an owner and a vehicle.
- The inventory view joins all three tables (`INNER JOIN` on `OwnerID`) to show each vehicle with its owner and sale details.

## Tech stack

- **Front end:** HTML and CSS
- **Back end:** PHP with `mysqli`
- **Database:** MySQL

## Running locally

1. Install PHP and MySQL, or a bundle such as XAMPP or MAMP.
2. Create a database and user, then put those credentials in `php/connection.php`.
3. Serve the project folder from your web server's document root and open `php/createtable.php` once to create the tables.
4. Open `index.html`.

## Repository structure

```
├── index.html        # Home: links to Sell, Modify, Search
├── form.html         # Sell a vehicle
├── search.html       # Search vehicles and sellers; display inventory
├── alter.html        # Update or remove vehicles and sellers
├── php/              # connection, createtable, insert, search*, update*, remove*, display
├── styles/style.css
└── images/           # Logo and banner
```

## Notes

This is a course project, written to show relational design and full CRUD with PHP and MySQL. It builds queries by string concatenation instead of prepared statements and has no authentication. A production version would need parameterized queries, input validation and access control.

The app is no longer hosted.

## Author

**[Kyle Tranfaglia](https://github.com/ktranfaglia1)**, Salisbury University.
