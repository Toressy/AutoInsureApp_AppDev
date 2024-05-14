
<?php include_once 'dbconfig.php'; ?> 
<?php include_once 'header.php'; ?> 

<div class="container">
    <div class="row">
        <div class="col-md-4 mb-3"> <!-- Adjust the column width and margin as needed -->
            <a href="add-data.php" class="btn btn-large btn-info btn-block"> <!-- Added btn-block class -->
                <i class="glyphicon glyphicon-plus"></i> &nbsp; Add User
            </a>
        </div>
        <div class="col-md-4 mb-3"> <!-- Adjust the column width and margin as needed -->
            <a href="agecohort.php" class="btn btn-large btn-warning btn-block"> <!-- Changed btn-info to btn-warning, added btn-block class -->
                <i class="glyphicon glyphicon-stats"></i> &nbsp; Age Cohort Analysis
            </a>
        </div>
        <div class="col-md-4 mb-3"> <!-- Adjust the column width and margin as needed -->
            <a href="piediagrams.php" class="btn btn-large btn-danger btn-block"> <!-- Changed btn-warning to btn-danger, added btn-block class -->
                <i class="glyphicon glyphicon-road"></i> &nbsp; Claim Amount by Driver Gender and Red Car
            </a>
        </div>
    </div>
</div>

<br />
<div class="container"> 
	<table class='table table-bordered table-responsive'> 
        <tr>
            <th>ID</th>
            <th>Kids drive </th>
            <th>Age</th>
            <th>Income</th>
            <th>MSTATUS</th>
            <th>Gender</th>
            <th>Education</th>
            <th>Occupation</th>
            <th colspan="2" align="center">Actions</th>
            <th>Car</th>
        </tr>
        <?php    
		  $crud->dataview("SELECT * FROM Driver LIMIT 10"); 
	    ?>
    </table> 

</div>
<?php include_once 'footer.php'; ?> 