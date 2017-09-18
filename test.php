<?php
		require_once("config/config.php");
		
		
		try {
		    $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $stmt = $conn->prepare('INSERT INTO Users (first_name, last_name, email, pass) VALUES ("Jonny", "Doe", "johndoe2@google.com", "checkdispassword")');
			
		    $stmt->execute();
		    
	    }
		catch(PDOException $e) {
    	}
?>
