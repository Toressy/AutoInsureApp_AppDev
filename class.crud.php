<?php

class crud // la class des operations avec la base de données.
{
	private $db;
	
	function __construct($mysqli)
	{
		$this->db = $mysqli;
	}
	
	public function create($fname,$lname,$email,$contact) // methode d'insertion des données.
	{
		$stmt = $this->db->prepare("INSERT INTO tbl_users(first_name,last_name,email_id,contact_no) 
		VALUES(?, ?, ?, ?)");
$stmt->bind_param("ssss", $fname, $lname, $email, $contact);
return $stmt->execute();
	}
	
	public function getID($id)  // return les informations de l'utilisateur qui est équivalant à l'id entré aux paramétre. 
	{
		$stmt = $this->db->prepare("SELECT * FROM Driver WHERE DRIVER_ID=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
	}

	// modification d'un utilisateur avec tous les champs.
	public function update($DRIVER_ID,$AGE,$INCOME,$MSTATUS,$GENDER, $EDUCATION, $OCCUPATION)
	{
		$stmt = $this->db->prepare("UPDATE Driver SET KIDSDRIV=?, 
                                                        AGE=?, 
                                                        INCOME=?, 
                                                        MSTATUS=?
														GENDER=?
														EDUCATION=?
														OCCUPATION=?
                                    WHERE DRIVER_ID=?");
        $stmt->bind_param("ssssi", $AGE, $INCOME, $MSTATUS, $GENDER, $EDUCATION, $OCCUPATION, $DRIVER_ID);
        return $stmt->execute();
	}
	
	public function delete($id) // suppression d'un utilisateur par l'id.
	{
		$stmt = $this->db->prepare("DELETE FROM Driver WHERE DRIVER_ID=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
	}                
	
		
	public function dataview($query) 
	{
		$result = $this->db->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['DRIVER_ID']; ?></td>
                    <td><?php echo $row['KIDSDRIV']; ?></td>
                    <td><?php echo $row['AGE']; ?></td>
                    <td><?php echo $row['INCOME']; ?></td>
                    <td><?php echo $row['MSTATUS']; ?></td>
					<td><?php echo $row['GENDER']; ?></td>
					<td><?php echo htmlspecialchars($row['EDUCATION']); ?></td>
					<td><?php echo $row['OCCUPATION']; ?></td>
                    <td align="center">
						<a href="edit-data.php?edit_id=<?php echo $row['DRIVER_ID']; ?>" class="btn btn-warning">
							<i class="glyphicon glyphicon-edit"></i> Edit
						</a>
					</td>
					<td align="center">
						<a href="delete.php?delete_id=<?php echo $row['DRIVER_ID']; ?>" class="btn btn-danger">
							<i class="glyphicon glyphicon-remove-circle"></i> Delete
						</a>
					</td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="7">No users found...</td>
            </tr>
            <?php
        }
	}	
}
?>