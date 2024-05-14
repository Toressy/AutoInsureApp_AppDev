<?php 

include_once 'dbconfig.php';

// Handle form submission for deleting car
if(isset($_POST['btn-del'])) {
    $CAR_ID = $_GET['delete_id'];
    $crud->deleteClaim($CAR_ID);
    header("Location: delete-claim.php?deleted"); 
    exit();
}
 
include_once 'header.php';
?>

<div class="container">
    <?php
    if(isset($_GET['deleted'])) {
        ?>
        <div class="alert alert-success">
        Claim deleted successfully 
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
        $claim = $crud->getClaimByCarId($CAR_ID);
        ?>
        <table class='table table-bordered'>
            <tr>
                <th>ID</th>
                <th>Amount of old claims</th>
                <th>Total number of claims</th>
                <th>Claim amount</th>
                <th>Claim indicator</th>
            </tr>
            <tr>
                <td><?php echo $claim['CAR_ID']; ?></td>
                <td><?php echo $claim['OLDCLAIM']; ?></td>
                <td><?php echo $claim['CLM_FREQ']; ?></td>
                <td><?php echo $claim['CLM_AMT']; ?></td>
                <td><?php echo $claim['CLAIM_FLAG']; ?></td>
            </tr>
        </table>
        <form method="post">
            <input type="hidden" name="CAR_ID" value="<?php echo $claim['CAR_ID']; ?>" />
            <button class="btn btn-large btn-primary" type="submit" name="btn-del">
            <i class="glyphicon glyphicon-trash"></i> &nbsp; Yes</button>
            <a href="show-claim.php?car_id=<?php echo $claim['CAR_ID']; ?>" class="btn btn-large btn-success">
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
