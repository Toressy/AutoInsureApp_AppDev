<?php 

include_once 'dbconfig.php';

// Handle form submission for deleting car
if(isset($_POST['btn-del'])) {
    $CAR_ID = $_GET['delete_id'];
    $crud->deleteCar($CAR_ID);
    header("Location: delete-car.php?deleted"); 
    exit();
}
 
include_once 'header.php';
?>

<div class="container">
    <?php
    if(isset($_GET['deleted'])) {
        ?>
        <div class="alert alert-success">
        Car deleted successfully 
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger">
        Are you sure you want to delete?
        </div>
        <?php
    }
    ?>  
</div>

<div class="container">
    <?php
    if(isset($_GET['delete_id'])) {
        $CAR_ID = $_GET['delete_id'];
        $car = $crud->getCarById($CAR_ID);
        ?>
        <table class='table table-bordered'>
            <tr>
                <th>ID</th>
                <th>Driver ID</th>
                <th>Car Type</th>
                <th>Red Car</th>
                <th>Age</th>
            </tr>
            <tr>
                <td><?php echo $car['CAR_ID']; ?></td>
                <td><?php echo $car['DRIVER_ID']; ?></td>
                <td><?php echo $car['CAR_TYPE']; ?></td>
                <td><?php echo $car['RED_CAR']; ?></td>
                <td><?php echo $car['CAR_AGE']; ?></td>
            </tr>
        </table>
        <form method="post">
            <input type="hidden" name="CAR_ID" value="<?php echo $car['CAR_ID']; ?>" />
            <button class="btn btn-large btn-primary" type="submit" name="btn-del">
            <i class="glyphicon glyphicon-trash"></i> &nbsp; Yes</button>
            <a href="show-car.php?driver_id=<?php echo $car['DRIVER_ID']; ?>" class="btn btn-large btn-success">
            <i class="glyphicon glyphicon-backward"></i> &nbsp; No</a> <!-- Updated href attribute -->
        </form>
        <?php
    } else {
        ?>
        <a href="index.php" class="btn btn-large btn-success" style="float: right;">
            <i class="glyphicon glyphicon-backward"></i> &nbsp; Back to menu</a>
        <?php
    }
    ?>
    
</div>  

    

<?php include_once 'footer.php'; ?>
