<?php 

include_once 'dbconfig.php';
include_once 'header.php';

?>




<div class="container"> 
    <?php
    if(isset($_GET['car_id'])) {
        $CAR_ID = $_GET['car_id'];
        $claim = $crud->getClaimByCarId($CAR_ID);
        if($claim) {
        ?>
        <table class='table table-bordered'>
            <tr>
                <th>Amount of old claims</th>
                <th>Total number of claims</th>
                <th>Claim amount</th>
                <th>Claim indicator</th>
                <th colspan="2" align="center">Actions</th>
                
            </tr>
            
            <tr>
                <td><?php echo $claim['OLDCLAIM']; ?></td>
                <td><?php echo $claim['CLM_FREQ']; ?></td>
                <td><?php echo $claim['CLM_AMT']; ?></td>
                <td><?php echo $claim['CLAIM_FLAG']; ?></td>
                
            
                <td align="center">
                    <a href="edit-claim.php?edit_id=<?php echo $claim['CAR_ID']; ?>" class="btn btn-warning">
                        <i class="glyphicon glyphicon-edit"></i> Edit
                    </a>
                </td>
                <td align="center">
                    <a href="delete-claim.php?delete_id=<?php echo $claim['CAR_ID']; ?>" class="btn btn-danger">
                        <i class="glyphicon glyphicon-remove-circle"></i> Delete
                    </a>
                </td>
                
            </tr>
                    
                
        </table>
        <?php
        } else {
        ?>
        <h2> There is no claim yet. Please add claim or go back to menu.</h2>
        <div class="container">
        <a href="add-claim.php?car_id=<?php echo $CAR_ID; ?>" class="btn btn-large btn-info">
            <i class="glyphicon glyphicon-plus"></i> &nbsp; Add claim
        </a>
        <?php
        }
        ?>
    </div>
    <?php
        
    } else {
        echo "<h2>Car ID is required.</h2>";
    }
    ?>

<a href="index.php" class="btn btn-large btn-success" style="float: right;">
<i class="glyphicon glyphicon-backward"></i> &nbsp; Back to menu</a>
    
</div>  
