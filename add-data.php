<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-save'])){
    $DRIVER_ID = $_POST['DRIVER_ID'];
    $KIDSDRIV = $_POST['KIDSDRIV'];
    $AGE = $_POST['AGE'];
	$INCOME = $_POST['INCOME'];
	$MSTATUS = $_POST['MSTATUS'];
	$GENDER = $_POST['GENDER'];
	$EDUCATION = $_POST['EDUCATION'];
    $OCCUPATION = $_POST['OCCUPATION'];
	if($crud->create($DRIVER_ID, $KIDSDRIV, $AGE, $INCOME, $MSTATUS, $GENDER, $EDUCATION, $OCCUPATION)){
		header("Location: add-data.php?inserted");
		exit();
	} else {
		header("Location: add-data.php?failure");
		exit();
	}
}

include_once 'header.php';

if(isset($_GET['inserted'])){
	?>
    <div class="container">
	   <div class="alert alert-info">
       Successful!
	   </div>
	</div>
    <?php
} elseif(isset($_GET['failure'])){
    ?>
    <div class="container">
	   <div class="alert alert-warning">
       Insertion failed!
	   </div>
	</div>
    <?php
}

?>

<div class="container">
	<form method='post'>
    <table class='table table-bordered'>
        <tr>
            <td>ID</td><td><input type='text' name='DRIVER_ID' class='form-control' required></td>
        </tr>
        <tr>
            <td>KIDSDRIV</td><td><input type='text' name='KIDSDRIV' class='form-control' required></td>
        </tr>

        <tr>
            <td>AGE</td><td><input type='text' name='AGE' class='form-control' required></td>
        </tr>
        <tr>
            <td>INCOME</td><td><input type='text' name='INCOME' class='form-control' required></td>
        </tr>
        <tr>
            <td>MSTATUS</td><td><input type='text' name='MSTATUS' class='form-control' required></td>
        </tr>

        <tr>
            <td>GENDER</td><td><input type='text' name='GENDER' class='form-control' required></td>
        </tr>
        <tr>
            <td>EDUCATION</td><td><input type='text' name='EDUCATION' class='form-control' required></td>
        </tr>
        <tr>
            <td>OCCUPATION</td><td><input type='text' name='OCCUPATION' class='form-control' required></td>
        </tr>
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save">
            <span class="glyphicon glyphicon-plus"></span> Add driver</button>
            <a href="index.php" class="btn btn-large btn-success" style="float: right;">
            <i class="glyphicon glyphicon-backward"></i> &nbsp; Back to menu</a>
            </td>
        </tr>
    </table>
</form>
</div>

<?php include_once 'footer.php'; ?>
