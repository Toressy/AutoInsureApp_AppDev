<?php 

include_once 'dbconfig.php';

if(isset($_POST['btn-del'])) {
    $id = $_GET['delete_id'];
    $crud->delete($id);
    header("Location: delete.php?deleted"); 
    exit();
}

include_once 'header.php';
?>

<div class="container">
    <?php
    if(isset($_GET['deleted'])) {
        ?>
        <div class="alert alert-success">
        User deleted successfully 
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
        $id = $_GET['delete_id'];
        $user = $crud->getID($id);
        ?>
        <table class='table table-bordered'>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>E-mail</th>
                <th>Tél</th>
            </tr>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['first_name']; ?></td>
                <td><?php echo $user['last_name']; ?></td>
                <td><?php echo $user['email_id']; ?></td>
                <td><?php echo $user['contact_no']; ?></td>
            </tr>
        </table>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
            <button class="btn btn-large btn-primary" type="submit" name="btn-del">
            <i class="glyphicon glyphicon-trash"></i> &nbsp; Yes</button>
            <a href="index.php" class="btn btn-large btn-success">
            <i class="glyphicon glyphicon-backward"></i> &nbsp; No</a>
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
