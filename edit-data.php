<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-update'])) {
    $DRIVER_ID = $_GET['edit_id'];
    $KIDSDRIV = $_POST['KIDSDRIV'];
    $AGE = $_POST['AGE'];
    $INCOME = $_POST['INCOME'];
    $MSTATUS = $_POST['MSTATUS'];
    $GENDER = $_POST['GENDER'];
    $EDUCATION = $_POST['EDUCATION'];
    $OCCUPATION = $_POST['OCCUPATION'];

    if($crud->update($DRIVER_ID, $KIDSDRIV, $AGE, $INCOME, $MSTATUS, $GENDER, $EDUCATION, $OCCUPATION)) {
        $msg = "<div class='alert alert-info'>
                Modification successful
                </div>";
    } else {
        $msg = "<div class='alert alert-warning'>
                Editing error
                </div>";
    }
}

if(isset($_GET['edit_id'])) {
    $DRIVER_ID = $_GET['edit_id'];
    $driver = $crud->getID($DRIVER_ID);
    $KIDSDRIV = $driver['KIDSDRIV'];
    $AGE = $driver['AGE'];
    $INCOME = $driver['INCOME'];
    $MSTATUS = $driver['MSTATUS'];
    $GENDER = $driver['GENDER'];
    $EDUCATION = $driver['EDUCATION'];
    $OCCUPATION = $driver['OCCUPATION'];
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
                <td>KIDSDRIVE</td>
                <td><input type='number' name='KIDSDRIV' class='form-control' value="<?php echo $KIDSDRIV; ?>" required></td>
            </tr>
    
            <tr>
                <td>AGE</td>
                <td><input type='number' name='AGE' class='form-control' value="<?php echo $AGE; ?>" required></td>
            </tr>
    
            <tr>
                <td>INCOME</td>
                <td><input type='text' name='INCOME' class='form-control' value="<?php echo $INCOME; ?>" required></td>
            </tr>
    
            <tr>
                <td>MSTATUS</td>
                <td>
                    <select name='MSTATUS' class='form-control' required>
                        <option value='Yes' <?php if($MSTATUS == 'Yes') echo 'selected'; ?>>Yes</option>
                        <option value='No' <?php if($MSTATUS == 'No') echo 'selected'; ?>>No</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>GENDER</td>
                <td>
                    <select name='GENDER' class='form-control' required>
                        <option value='F' <?php if($GENDER == 'F') echo 'selected'; ?>>F</option>
                        <option value='M' <?php if($GENDER == 'M') echo 'selected'; ?>>M</option>
                    </select>
                </td>
            </tr>



            <tr>
                <td>EDUCATION</td>
                <td><input type='text' name='EDUCATION' class='form-control' value="<?php echo $EDUCATION; ?>" required></td>
            </tr>

            <tr>
                <td>OCCUPATION</td>
                <td><input type='text' name='OCCUPATION' class='form-control' value="<?php echo $OCCUPATION; ?>" required></td>
            </tr>
    
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="btn-update">
                    <span class="glyphicon glyphicon-edit"></span>  Edit driver
                    </button>
                    <a href="index.php" class="btn btn-large btn-success" style="float: right;"><i class="glyphicon glyphicon-backward"></i> &nbsp; Cancel </a>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php include_once 'footer.php'; ?>
