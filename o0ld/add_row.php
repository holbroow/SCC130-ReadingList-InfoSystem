<?php // add_row.php
    require 'connect.php';

	function assign_data($connection, $var)
	{
		return $connection->real_escape_string($_POST[$var]);
	}

	if (isset($_POST["id"]) &&
		isset($_POST["title"]) &&
		isset($_POST["author"]))
		{
			$id = assign_data($connection, 'id');
			$title = assign_data($connection, 'title');
			$author = assign_data($connection, 'author');
		}


    $query = " 	INSERT INTO books(id, title, author) 		# need to add message to indicate 
				VALUES ('$id', '$title', '$author')";		# that row already exists to avoid errors

    $result = $connection->query($query);

    if (!$result) 
	{
        echo '<br>';
		echo 'DEGBUG: The MySQL Query (adding a row) has failed.';
	}
	else
	{
		echo 'DEGBUG: Row added succesfully.';
	}
	

	$connection->close();
?>