<?php 

include_once 'dbconfig.php';

if(isset($_POST['btn-del'])) {
    $DRIVER_ID = $_GET['delete_id'];
    $crud->delete($DRIVER_ID);
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
        Driver deleted successfully 
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
        $DRIVER_ID = $_GET['delete_id'];
        $driver = $crud->getID($DRIVER_ID);
        ?>
        <table class='table table-bordered'>
            <tr>
                <th>Id</th>
                <th>Kids drive</th>
                <th>Age</th>
                <th>MStatus</th>
                <th>Gender</th>
                <th>Education</th>
                <th>Occupation</th>
            </tr>
            <tr>
                <td><?php echo $driver['DRIVER_ID']; ?></td>
                <td><?php echo $driver['KIDSDRIV']; ?></td>
                <td><?php echo $driver['AGE']; ?></td>
                <td><?php echo $driver['MSTATUS']; ?></td>
                <td><?php echo $driver['GENDER']; ?></td>
                <td><?php echo $driver['EDUCATION']; ?></td>
                <td><?php echo $driver['OCCUPATION']; ?></td>
            </tr>
        </table>
        <form method="post">
            <input type="hidden" name="DRIVER_ID" value="<?php echo $driver['DRIVER_ID']; ?>" />
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
