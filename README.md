# AutoInsureApp

AutoInsureApp is a PHP and MySQL-based web application designed to manage car insurance data. It allows users to perform CRUD operations on car and claim records, generate reports, and visualize data using simple diagrams.

## 📁 Project Structure

- `index.php`: Homepage/dashboard
- `add-car.php`, `edit-car.php`, `delete-car.php`: Manage car records
- `add-claim.php`, `edit-claim.php`, `delete-claim.php`: Manage insurance claims
- `show-car.php`, `show-claim.php`: Display records
- `dbconfig.php`: Database configuration
- `class.crud.php`: Contains CRUD logic
- `piediagrams.php`, `agecohort.php`, `qualificationclaim.php`: Data analysis views
- `CarInsurance.sql`: SQL script to set up the database

## 🔧 Features

- Add, view, edit, and delete car and claim records
- Basic user data handling and analysis
- Visual reporting via pie charts and cohort analysis
- Modular PHP structure using CRUD classes

## 🛠 Requirements

- PHP 7.x or higher
- MySQL or MariaDB
- Web server (e.g., XAMPP, WAMP, LAMP)

## 🚀 Getting Started

1. Import `CarInsurance.sql` into your MySQL database.
2. Update `dbconfig.php` with your database credentials.
3. Deploy the project to a PHP-enabled web server.
4. Open `index.php` in your browser to begin.

## 🎓 Educational Use

This project was developed for learning application development, focusing on full-stack web concepts with backend data handling.

## 📄 License

This project is intended for academic and educational purposes.

---

*Built to manage and analyze car insurance information using PHP and SQL.*
