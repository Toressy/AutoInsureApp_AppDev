<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Cohort Analysis</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add custom CSS stylesheets here if needed -->
    <style>
        /* Add custom CSS styles here */
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Age Cohort Analysis</h1>
        <div class="row">
            <?php
            // Include the database configuration file
            include_once 'dbconfig.php';

            // Fetch data from the database
            $query = "SELECT d.AGE, c.CLM_FREQ, c.CLM_AMT 
            FROM Driver d 
            INNER JOIN Car car ON d.DRIVER_ID = car.DRIVER_ID 
            INNER JOIN Claim c ON car.CAR_ID = c.CAR_ID";
            $result = $mysqli->query($query);

            if (!$result) {
                // Query execution failed
                echo "<div class='alert alert-danger'>Error: " . $mysqli->error . "</div>";
            } else {
                // Define age cohorts and initialize arrays to store claim statistics
                $ageCohorts = array('18-25', '26-35', '36-45', '46-55', '56-65', '66+');
                $claimFrequency = array_fill_keys($ageCohorts, 0);
                $claimAmount = array_fill_keys($ageCohorts, 0);

                // Process the data and calculate claim statistics for each age cohort
                while ($row = $result->fetch_assoc()) {
                    $age = $row['AGE'];
                    $claimFreq = $row['CLM_FREQ'];
                    $claimAmt = parseClaimAmount($row['CLM_AMT']);

                    // Determine the age cohort
                    $cohort = getAgeCohort($age);

                    // Aggregate claim statistics for the corresponding age cohort
                    $claimFrequency[$cohort] += $claimFreq;
                    $claimAmount[$cohort] += $claimAmt;
                }

                // Output the claim statistics for each age cohort
                foreach ($ageCohorts as $cohort) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='card mb-4'>";
                    echo "<div class='card-header'>Age Cohort: $cohort</div>";
                    echo "<div class='card-body'>";
                    echo "<p class='card-text'>Total Claim Frequency: " . $claimFrequency[$cohort] . "</p>";
                    echo "<p class='card-text'>Total Claim Amount: $" . number_format($claimAmount[$cohort], 2) . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }

            // Close the database connection
            $mysqli->close();

            function parseClaimAmount($amount) {
                // Remove dollar sign and commas
                $amount = str_replace(['$', ','], '', $amount);
                // Convert to numeric value
                return floatval($amount);
            }

            // Function to determine the age cohort based on age
            function getAgeCohort($age) {
                if ($age >= 18 && $age <= 25) {
                    return '18-25';
                } elseif ($age >= 26 && $age <= 35) {
                    return '26-35';
                } elseif ($age >= 36 && $age <= 45) {
                    return '36-45';
                } elseif ($age >= 46 && $age <= 55) {
                    return '46-55';
                } elseif ($age >= 56 && $age <= 65) {
                    return '56-65';
                } else {
                    return '66+';
                }
            }
            ?>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add custom JavaScript scripts here if needed -->
    <script>
        // Add custom JavaScript scripts here
    </script>
</body>
</html>
