<?php
include_once 'dbconfig.php';

// Handle form submission for updating car details
if(isset($_POST['btn-update'])) {
    $CAR_ID = $_GET['edit_id'];
    $DRIVER_ID = $_POST['DRIVER_ID'];
    $CAR_TYPE = $_POST['CAR_TYPE'];
    $RED_CAR = $_POST['RED_CAR'];
    $CAR_AGE = $_POST['CAR_AGE'];

    if($crud->updateCar($CAR_ID, $DRIVER_ID, $CAR_TYPE, $RED_CAR, $CAR_AGE)) {
        $msg = "<div class='alert alert-info'>
                Car details updated successfully
                </div>";
    } else {
        $msg = "<div class='alert alert-warning'>
                Error updating car details
                </div>";
    }
}

// Fetch car details for editing
if(isset($_GET['edit_id'])) {
    $CAR_ID = $_GET['edit_id'];
    $car = $crud->getCarById($CAR_ID);
    $DRIVER_ID = $car['DRIVER_ID'];
    $CAR_TYPE = $car['CAR_TYPE'];
    $RED_CAR = $car['RED_CAR'];
    $CAR_AGE = $car['CAR_AGE'];
}

include_once 'header.php';
?>

<div class="container">
    <?php
    if(isset($msg)) {
        echo $msg;
    }
    ?>
</div>

<div class="container">    
    <form method='post'>
        <table class='table table-bordered'>
            <tr>
                <td>Driver ID</td>
                <td>
                    <select name="DRIVER_ID" class="form-control">
                        <?php
                        // Fetch all drivers from the database to populate the dropdown
                        $drivers = $crud->getAllDrivers();
                        foreach ($drivers as $driver) {
                            echo "<option value='".$driver['DRIVER_ID']."' ".($driver['DRIVER_ID'] == $DRIVER_ID ? 'selected' : '').">".$driver['DRIVER_ID']."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
    
            <tr>
                <td>Car Type</td>
                <td><input type='text' name='CAR_TYPE' class='form-control' value="<?php echo $CAR_TYPE; ?>" required></td>
            </tr>
    
            <tr>
                <td>Red Car</td>
                <td><input type='text' name='RED_CAR' class='form-control' value="<?php echo $RED_CAR; ?>" required></td>
            </tr>
    
            <tr>
                <td>Car Age</td>
                <td><input type='text' name='CAR_AGE' class='form-control' value="<?php echo $CAR_AGE; ?>" required></td>
            </tr>
    
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="btn-update">
                    <span class="glyphicon glyphicon-edit"></span>  Edit Car
                    </button>
                    <a href="index.php" class="btn btn-large btn-success" style="float: right;"><i class="glyphicon glyphicon-backward"></i> &nbsp; Cancel </a>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php include_once 'footer.php'; ?>
