<?php
// Include the database configuration file and the CRUD class
include_once 'dbconfig.php';
include_once 'class.crud.php';

// Create an instance of the CRUD class
$crud = new crud($mysqli);

// Get data for age cohorts from the database
$data = $crud->getDataForAgeCohorts();

// Initialize arrays to store claim statistics for each qualification
$educationStats = array(
    'High School' => array('freq' => 0, 'amt' => 0),
    'Bachelors' => array('freq' => 0, 'amt' => 0),
    'Masters' => array('freq' => 0, 'amt' => 0),
    'PhD' => array('freq' => 0, 'amt' => 0)
);

// Process the data and calculate claim statistics for each qualification
foreach ($data as $row) {
    $education = $row['EDUCATION'];
    $claimFreq = $row['CLM_FREQ'];
    $claimAmt = $row['CLM_AMT'];

    // Update claim statistics based on education level
    switch ($education) {
        case 'High School':
            $educationStats['High School']['freq'] += $claimFreq;
            $educationStats['High School']['amt'] += $claimAmt;
            break;
        case 'Bachelors':
            $educationStats['Bachelors']['freq'] += $claimFreq;
            $educationStats['Bachelors']['amt'] += $claimAmt;
            break;
        case 'Masters':
            $educationStats['Masters']['freq'] += $claimFreq;
            $educationStats['Masters']['amt'] += $claimAmt;
            break;
        case 'PhD':
            $educationStats['PhD']['freq'] += $claimFreq;
            $educationStats['PhD']['amt'] += $claimAmt;
            break;
        default:
            // Handle other cases if necessary
            break;
    }
}

// Perform statistical analysis or data mining on $educationStats to identify associations
// For example, you can calculate correlation coefficients or perform hypothesis testing

// Display the results
foreach ($educationStats as $education => $stats) {
    echo "<h2>Education: $education</h2>";
    echo "<p>Total Claim Frequency: " . $stats['freq'] . "</p>";
    echo "<p>Total Claim Amount: $" . $stats['amt'] . "</p>";
    echo "<hr>";
}

// Close the database connection
$mysqli->close();
?>
