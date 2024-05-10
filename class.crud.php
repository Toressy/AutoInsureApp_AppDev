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

	public function createCar($DRIVER_ID, $CAR_TYPE ,$RED_CAR, $CAR_AGE) 
	{
		$stmt = $this->db->prepare("INSERT INTO Car (DRIVER_ID, CAR_TYPE, RED_CAR, CAR_AGE) 
		VALUES(?, ?, ?, ?)");
		$stmt->bind_param("issi", $DRIVER_ID, $CAR_TYPE, $RED_CAR, $CAR_AGE);
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

	public function getCarById($CAR_ID) {
	
		$stmt = $this->db->prepare("SELECT * FROM Car WHERE CAR_ID=?");
        $stmt->bind_param("i", $CAR_ID);
        $stmt->execute();
		$result = $stmt->get_result();
		
		return $result->fetch_assoc();
		

	}

	public function getCarByDriverId($DRIVER_ID) {
	
		$stmt = $this->db->prepare("SELECT * FROM Car WHERE DRIVER_ID=?");
        $stmt->bind_param("i", $DRIVER_ID);
        $stmt->execute();
		$result = $stmt->get_result();
		
		$cars = array(); // Initialize an array to store all cars
		
		while ($row = $result->fetch_assoc()) {
			$cars[] = $row; // Add each car to the array
		}
		
		return $cars;
	}

	public function getAllDrivers() {
		$query = "SELECT * FROM Driver";
		$result = $this->db->query($query);
		
		$drivers = array(); // Initialize an array to store all drivers
		
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$drivers[] = $row; // Add each driver to the array
			}
		}
		
		return $drivers;
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

	public function updateCar($CAR_ID, $DRIVER_ID, $CAR_TYPE,$RED_CAR,$CAR_AGE)
	{
		$stmt = $this->db->prepare("UPDATE CAR SET DRIVER_ID=?, 
                                                        CAR_TYPE=?, 
                                                        RED_CAR=?, 
                                                        CAR_AGE=?
														
                                    WHERE CAR_ID=?");
        $stmt->bind_param("issii", $DRIVER_ID, $CAR_TYPE, $RED_CAR, $CAR_AGE, $CAR_ID);
        return $stmt->execute();
	}
	
	public function delete($DRIVER_ID) 
	{
		$stmt = $this->db->prepare("DELETE FROM Driver WHERE DRIVER_ID=?");
        $stmt->bind_param("i", $DRIVER_ID);
        return $stmt->execute();
	}      
	
	public function deleteCar($CAR_ID) 
	{
		// First, delete entries from the claim table related to the specified car
		$stmt1 = $this->db->prepare("DELETE FROM Claim WHERE CAR_ID=?");
		$stmt1->bind_param("i", $CAR_ID);
		$stmt1->execute();
		$stmt1->close();
	
		// Then, delete the car entry from the Car table
		$stmt2 = $this->db->prepare("DELETE FROM Car WHERE CAR_ID=?");
		$stmt2->bind_param("i", $CAR_ID);
		$result = $stmt2->execute();
		$stmt2->close();
	
		return $result; // Return the result of the deletion operation
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

					<td align="center">
						<a href="show-car.php?driver_id=<?php echo $row['DRIVER_ID']; ?>" class="btn btn-info">
							Show Cars
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