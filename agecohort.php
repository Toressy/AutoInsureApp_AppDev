<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Cohort Analysis</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Age Cohort Analysis</h1>
        <div class="row">
            <div class="col-md-6">
                <canvas id="frequencyChart" width="400" height="200"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="amountChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Fetch data from the database
        <?php
        // Include the database configuration file
        include_once 'dbconfig.php';

        // Fetch data from the database
        $query = "SELECT d.AGE, c.CLM_FREQ, c.CLM_AMT 
        FROM Driver d 
        INNER JOIN Car car ON d.DRIVER_ID = car.DRIVER_ID 
        INNER JOIN Claim c ON car.CAR_ID = c.CAR_ID";
        $result = $mysqli->query($query);

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

        // Draw cohort analysis charts
        var frequencyCtx = document.getElementById('frequencyChart').getContext('2d');
        var frequencyChart = new Chart(frequencyCtx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($ageCohorts); ?>,
                datasets: [{
                    label: 'Total Claim Frequency',
                    data: <?php echo json_encode(array_values($claimFrequency)); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var amountCtx = document.getElementById('amountChart').getContext('2d');
        var amountChart = new Chart(amountCtx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($ageCohorts); ?>,
                datasets: [{
                    label: 'Total Claim Amount',
                    data: <?php echo json_encode(array_values($claimAmount)); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <div class="container">
    <a href="index.php" class="btn btn-large btn-success" style="float: right;">
<i class="glyphicon glyphicon-backward"></i> &nbsp; Back to menu</a>
  
    </div>
</body>
</html>
