<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "mapel_baru";
$koneksi = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

function sqlquery($query)
{
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}
