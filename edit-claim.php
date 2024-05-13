<?php
include_once 'dbconfig.php';

// Handle form submission for updating claim details
if(isset($_POST['btn-update'])) {
    $CAR_ID = $_GET['edit_id'];
    $OLDCLAIM = $_POST['OLDCLAIM'];
    $CLM_FREQ = $_POST['CLM_FREQ'];
    $CLM_AMT = $_POST['CLM_AMT'];
    $CLAIM_FLAG = $_POST['CLAIM_FLAG'];
    
    if($crud->updateClaim($CAR_ID, $OLDCLAIM, $CLM_FREQ, $CLM_AMT, $CLAIM_FLAG)) {
        $msg = "<div class='alert alert-info'>
                Claim details updated successfully
                </div>";
    } else {
        $msg = "<div class='alert alert-warning'>
                Error updating claim details
                </div>";
    }
}

// Fetch car details for editing
if(isset($_GET['edit_id'])) {
    $CAR_ID = $_GET['edit_id'];
    $claim = $crud->getClaimByCarId($CAR_ID);
    $OLDCLAIM = $claim['OLDCLAIM'];
    $CLM_FREQ = $claim['CLM_FREQ'];
    $CLM_AMT = $claim['CLM_AMT'];
    $CLAIM_FLAG = $claim['CLAIM_FLAG'];
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
                <td>Car ID</td>
                <td><input type='text' name='CAR_TYPE' class='form-control' value="<?php echo $CAR_ID; ?>" required disabled></td>
            </tr>
    
            <tr>
                <td>Amount of old claims</td>
                <td><input type='text' name='OLDCLAIM' class='form-control' value="<?php echo $OLDCLAIM; ?>" required></td>
            </tr>
    
            <tr>
                <td> Total number of claims</td>
                <td><input type='text' name='CLM_FREQ' class='form-control' value="<?php echo $CLM_FREQ; ?>" required></td>
            </tr>
    
            <tr>
                <td>Claim amount</td>
                <td><input type='text' name='CLM_AMT' class='form-control' value="<?php echo $CLM_AMT; ?>" required></td>
            </tr>

            <tr>
                <td>Claim indicator</td>
                <td><input type='text' name='CLAIM_FLAG' class='form-control' value="<?php echo $CLAIM_FLAG; ?>" required></td>
            </tr>
    
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="btn-update">
                    <span class="glyphicon glyphicon-edit"></span>  Edit Claim
                    </button>
                    <a href="show-claim.php?car_id=<?php echo $CAR_ID; ?>" class="btn btn-large btn-success" style="float: right;">
                        <i class="glyphicon glyphicon-backward"></i> &nbsp; Cancel
                    </a>

                </td>
            </tr>
        </table>
    </form>
</div>

<?php include_once 'footer.php'; ?>
