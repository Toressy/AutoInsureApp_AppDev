<?php

// Include the database connection and CRUD class
include_once 'dbconfig.php';
include_once 'class.crud.php';

// Create an instance of the CRUD class
$crud = new Crud($mysqli);

// Check if the car ID is provided via POST
if(isset($_POST['car_id'])) {
    // Get the car ID from the POST data
    $carId = $_POST['car_id'];

    // Call the method to fetch claims by car ID from the CRUD class
    $claims = $crud->getClaimByCarId($carId);

    // Check if there are claims
    if ($claims) {
        // Output the claims data in JSON format
        header('Content-Type: application/json');
        echo json_encode($claims);
    } else {
        // If no claims found, return a message
        echo "No claims found for this car.";
    }
} else {
    // If car ID is not provided, return an error message
    echo "Car ID is not provided.";
}
?>
