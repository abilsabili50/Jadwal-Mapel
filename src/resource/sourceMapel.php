<?php

include_once(__DIR__ . "/../../private/config.php");

$searchKey = $_GET["term"];

$query = "SELECT * FROM mata_pelajaran WHERE NAMA_MAPEL LIKE '%" . $searchKey . "%' ORDER BY NAMA_MAPEL LIMIT 0, 5";
$result = mysqli_query($koneksi, $query);

$data = [];

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row["NAMA_MAPEL"];
}
$data = array_unique($data);

echo json_encode($data);
