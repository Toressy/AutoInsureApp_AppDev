<?php
include_once 'dbconfig.php';
$driver_id = isset($_GET['driver_id']) ? $_GET['driver_id'] : '';
if(isset($_POST['btn-save'])){
    $DRIVER_ID = $_POST['DRIVER_ID'];
    $CAR_TYPE = $_POST['CAR_TYPE'];
    $RED_CAR = $_POST['RED_CAR'];
    $CAR_AGE = $_POST['CAR_AGE'];
    
    if($crud->createCar($DRIVER_ID, $CAR_TYPE, $RED_CAR, $CAR_AGE)){
        header("Location: add-car.php?inserted&driver_id=$DRIVER_ID");
        exit();
    } else {
        header("Location: add-car.php?failure");
        exit();
    }
}

include_once 'header.php';

if(isset($_GET['inserted'])){
    ?>
    <div class="container">
       <div class="alert alert-info">
       Car added successfully!
       </div>
    </div>
    <?php
} elseif(isset($_GET['failure'])){
    ?>
    <div class="container">
       <div class="alert alert-warning">
       Failed to add car!
       </div>
    </div>
    <?php
}
?>

<div class="container">
    <form method='post'>
        <table class='table table-bordered'>
            <tr>
                <td>Driver ID</td>
                <td><input type='number' name='DRIVER_ID' class='form-control' value="<?php echo isset($_GET['driver_id']) ? $_GET['driver_id'] : ''; ?>" required readonly></td>
            </tr>
            <tr>
                <td>Car Type</td>
                <td><input type='text' name='CAR_TYPE' class='form-control' required></td>
            </tr>
            <tr>
                <td>Red?</td>
                <td>
                    <label><input type='radio' name='RED_CAR' value='yes' required> yes</label>
                    <label><input type='radio' name='RED_CAR' value='no' required> no</label>
                </td>
            </tr>
            
            <tr>
                <td>Car Age</td>
                <td><input type='number' name='CAR_AGE' class='form-control' required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="btn-save">
                    <span class="glyphicon glyphicon-plus"></span> Add car</button>
                    <a href="show-car.php?driver_id=<?php echo isset($_GET['driver_id']) ? $_GET['driver_id'] : ''; ?>" class="btn btn-large btn-success" style="float: right;">
                    <i class="glyphicon glyphicon-backward"></i> &nbsp; Back to driver's car's</a>
                    
                </a>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php include_once 'footer.php'; ?>
