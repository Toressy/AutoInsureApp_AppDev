<?php 

include_once 'dbconfig.php';



include_once 'header.php';
?>

<div class="container">
    <a href="add-car.php?driver_id=<?php echo isset($_GET['driver_id']) ? $_GET['driver_id'] : ''; ?>" class="btn btn-large btn-info">
        <i class="glyphicon glyphicon-plus"></i> &nbsp; Add car
    </a>
</div>
<br />

<div class="container">
    <?php
    if(isset($_GET['driver_id'])) {
        $DRIVER_ID = $_GET['driver_id'];
        $cars = $crud->getCarByDriverId($DRIVER_ID);
        ?>
        <table class='table table-bordered'>
            <tr>
                <th>ID</th>
                <th>Driver</th>
                <th>Car type</th>
                <th>Red?</th>
                <th>Age</th>
                <th colspan="2" align="center">Actions</th>
                
            </tr>
            <?php
                foreach($cars as $car) { // Loop through each car
                    ?>
            <tr>
                <td><?php echo $car['CAR_ID']; ?></td>
                <td><?php echo $car['DRIVER_ID']; ?></td>
                <td><?php echo $car['CAR_TYPE']; ?></td>
                <td><?php echo $car['RED_CAR']; ?></td>
                <td><?php echo $car['CAR_AGE']; ?></td>
                <td align="center">
                    <a href="edit-car.php?edit_id=<?php echo $car['CAR_ID']; ?>" class="btn btn-warning">
                        <i class="glyphicon glyphicon-edit"></i> Edit
                    </a>
                </td>
                <td align="center">
                    <a href="delete-car.php?delete_id=<?php echo $car['CAR_ID']; ?>" class="btn btn-danger">
                        <i class="glyphicon glyphicon-remove-circle"></i> Delete
                    </a>
                </td>
                <td align="center">
                    <a href="show-claims.php?car_id=<?php echo $car['CAR_ID']; ?>" class="btn btn-info">
                        <i class="glyphicon glyphicon-eye-open"></i> Show Claims
                    </a>
                </td>
                
            </tr>
            
                <?php
                }
                ?>
                
        </table>
        <?php
        
    } else {
    }
    ?>

<a href="index.php" class="btn btn-large btn-success" style="float: right;">
<i class="glyphicon glyphicon-backward"></i> &nbsp; Back to menu</a>
    
</div>  


<?php include_once 'footer.php'; ?>
