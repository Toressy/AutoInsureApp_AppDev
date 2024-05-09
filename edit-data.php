<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-update'])) {
    $id = $_GET['edit_id'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email_id'];
    $contact = $_POST['contact_no'];

    if($crud->update($id, $fname, $lname, $email, $contact)) {
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
    $id = $_GET['edit_id'];
    $user = $crud->getID($id);
    $first_name = $user['first_name'];
    $last_name = $user['last_name'];
    $email_id = $user['email_id'];
    $contact_no = $user['contact_no'];
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
