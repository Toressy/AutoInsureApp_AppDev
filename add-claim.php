<?php
include_once 'dbconfig.php';
$car_id = isset($_GET['car_id']) ? $_GET['car_id'] : '';
if(isset($_POST['btn-save'])){
    $CAR_ID = $_POST['CAR_ID'];
    $OLDCLAIM = $_POST['OLDCLAIM'];
    $CLM_FREQ = $_POST['CLM_FREQ'];
    $CLM_AMT = $_POST['CLM_AMT'];
    $CLAIM_FLAG = $_POST['CLAIM_FLAG'];
    
    if($crud->createClaim($CAR_ID, $OLDCLAIM, $CLM_FREQ, $CLM_AMT, $CLAIM_FLAG)){
        header("Location: add-car.php?inserted&car_id=$CAR_ID");
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
       Claim added successfully!
       </div>
    </div>
    <?php
} elseif(isset($_GET['failure'])){
    ?>
    <div class="container">
       <div class="alert alert-warning">
       Failed to add claim!
       </div>
    </div>
    <?php
}
?>

<div class="container">
    <form method='post'>
        <table class='table table-bordered'>
            <tr>
                <td>Car ID</td>
                <td><input type='text' name='CAR_ID' class='form-control' value="<?php echo $car_id; ?>" required readonly></td>
            </tr>
            <tr>
                <td>Amount of old claims</td>
                <td><input type='text' name='OLDCLAIM' class='form-control' required></td>
            </tr>
            <tr>
                <td>Total number of claims</td>
                <td><input type='text' name='CLM_FREQ' class='form-control' required></td>
            </tr>
            <tr>
                <td>Claim amount</td>
                <td><input type='text' name='CLM_AMT' class='form-control' required></td>
            </tr>
            <tr>
                <td>Claim indicator</td>
                <td><input type='text' name='CLAIM_FLAG' class='form-control' required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="btn-save">
                    <span class="glyphicon glyphicon-plus"></span> Add claim</button>
                    <a href="show-claim.php?car_id=<?php echo $car_id; ?>" class="btn btn-large btn-success" style="float: right;">
                    <i class="glyphicon glyphicon-backward"></i> &nbsp; Back to claim</a>
                    
                </a>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php include_once 'footer.php'; ?>
