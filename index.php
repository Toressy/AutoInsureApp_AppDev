
<?php include_once 'dbconfig.php'; ?> 
<?php include_once 'header.php'; ?> 

<div class="container">
    <div class="row">
        <div class="col-md-6"> <!-- Adjust the column width as needed -->
            <a href="add-data.php" class="btn btn-large btn-info">
                <i class="glyphicon glyphicon-plus"></i> &nbsp; Add user
            </a>
        </div>
        <div class="col-md-6 text-right"> <!-- Adjust the column width as needed -->
            <a href="agecohort.php" class="btn btn-large btn-warning"> <!-- Changed btn-info to btn-warning -->
                <i class="glyphicon glyphicon-plus"></i> &nbsp; Age Cohort Analysis
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