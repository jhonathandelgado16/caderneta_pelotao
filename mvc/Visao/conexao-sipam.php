<?php

	function executeQuery($query){
		$host = "localhost";
		$db   = "parametrizacao";
		$user = "root";
		$pass = "160315";
		$con = mysqli_connect($host, $user, $pass, $db);
		return mysqli_query($con, $query);
	}

?>