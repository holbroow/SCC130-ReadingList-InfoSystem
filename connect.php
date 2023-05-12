<?php // connect.php

$hostname = 'mysql';
$database = '23db158';
$username = '23usr158';
$password = 'kizAFZnfwBPX';

$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error)
		{ die($connection->connect_error);
		echo '<br>';
		echo 'DEGBUG: Unable to connect to the database, please check the credentials';
	}
	else 
	{	
		//echo '<br>';
		//echo 'DEGBUG: You have connected to the database successfully. No errors.<br><br>';
	};
?>
