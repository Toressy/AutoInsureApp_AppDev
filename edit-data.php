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
    $KIDSDRIVE = $crud->getID($id);
    $AGE = $user['AGE'];
    $INCOME = $user['INCOME'];
    $MSTATUS = $user['MSTATUS'];
    $GENDER = $user['GENDER'];
    $EDUCATION = $user['EDUCATION'];
    $OCCUPATION = $user['OCCUPATION'];
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
                <td>Nom</td>
                <td><input type='text' name='first_name' class='form-control' value="<?php echo $first_name; ?>" required></td>
            </tr>
    
            <tr>
                <td>Prénom</td>
                <td><input type='text' name='last_name' class='form-control' value="<?php echo $last_name; ?>" required></td>
            </tr>
    
            <tr>
                <td>E-mail</td>
                <td><input type='text' name='email_id' class='form-control' value="<?php echo $email_id; ?>" required></td>
            </tr>
    
            <tr>
                <td>Tél</td>
                <td><input type='text' name='contact_no' class='form-control' value="<?php echo $contact_no; ?>" required></td>
            </tr>
    
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="btn-update">
                    <span class="glyphicon glyphicon-edit"></span>  Edit user
                    </button>
                    <a href="index.php" class="btn btn-large btn-success" style="float: right;"><i class="glyphicon glyphicon-backward"></i> &nbsp; Cancel </a>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php include_once 'footer.php'; ?>
