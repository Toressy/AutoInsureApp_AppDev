<?php

class crud 
{
	private $db;
	
	function __construct($mysqli)
	{
		$this->db = $mysqli;
	}
	
	public function create($DRIVER_ID, $KIDSDRIV,$AGE,$INCOME,$MSTATUS, $GENDER, $EDUCATION, $OCCUPATION) 
	{
		$stmt = $this->db->prepare("INSERT INTO Driver(DRIVER_ID, KIDSDRIV, AGE, INCOME, MSTATUS, GENDER, EDUCATION, OCCUPATION) 
		VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iiisssss", $DRIVER_ID, $KIDSDRIV, $AGE, $INCOME, $MSTATUS, $GENDER, $EDUCATION, $OCCUPATION);
return $stmt->execute();
	}
	
	public function getID($DRIVER_ID)  
	{
		$stmt = $this->db->prepare("SELECT * FROM Driver WHERE DRIVER_ID=?");
        $stmt->bind_param("i", $DRIVER_ID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
	}

	
	public function update($DRIVER_ID,$KIDSDRIV, $AGE,$INCOME,$MSTATUS,$GENDER, $EDUCATION, $OCCUPATION)
	{
		$stmt = $this->db->prepare("UPDATE Driver SET KIDSDRIV=?, 
                                                        AGE=?, 
                                                        INCOME=?, 
                                                        MSTATUS=?,
														GENDER=?,
														EDUCATION=?,
														OCCUPATION=?
                                    WHERE DRIVER_ID=?");
        $stmt->bind_param("iisssssi", $KIDSDRIV, $AGE, $INCOME, $MSTATUS, $GENDER, $EDUCATION, $OCCUPATION, $DRIVER_ID);
        return $stmt->execute();
	}
	
	public function delete($DRIVER_ID) 
	{
		$stmt = $this->db->prepare("DELETE FROM Driver WHERE DRIVER_ID=?");
        $stmt->bind_param("i", $DRIVER_ID);
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
                <td colspan="7">No driver found...</td>
            </tr>
            <?php
        }
	}	
}
?>