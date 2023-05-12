<?php // create_table.php
	require 'connect.php';
			
	$query = " CREATE TABLE IF NOT EXISTS books2 (
			   id  INT UNSIGNED NOT NULL PRIMARY KEY, 
			   title VARCHAR(100) NOT NULL,
               author VARCHAR(50) NOT NULL,
			   rating INT UNSIGNED NOT NULL,
			   date_added DATE NOT NULL
			   )";
	
	$result = $connection->query($query);
	
	if (!$result) 
	{
		die($connection->error);
        echo '<br>';
		echo 'DEBUG: The MySQL Query failed.';
	}
	else
	{
        //echo '<br>';
		//echo 'DEBUG: The table has been created / already exists. No errors.';
	}

	//$connection->close();	
?>
