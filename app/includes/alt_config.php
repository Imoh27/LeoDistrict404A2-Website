<?php

try {
	$con = new PDO('mysql:host=localhost; dbname=ld404a2','root','');
	
	}catch(PDOException $e){
		echo "Invalid Credentials ".$e->getMessage();	
	}
