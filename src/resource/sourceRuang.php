<?php

include_once(__DIR__ . "/../../private/config.php");

$searchKey = $_GET["term"];

$query = "SELECT * FROM ruang_kelas WHERE NAMA_RUANG LIKE '%" . $searchKey . "%' ORDER BY NAMA_RUANG LIMIT 0, 5";
$result = mysqli_query($koneksi, $query);

$data = [];

while ($row = mysqli_fetch_array($result)) {
	$data[] = $row["NAMA_RUANG"];
}
$data = array_unique($data);

echo json_encode($data);
