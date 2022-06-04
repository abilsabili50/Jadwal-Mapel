<?php 

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "jadwal_mapel";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	function sqlquery($query){
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while($row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
		}
		return $rows;
	}
?>