<?php

include_once(__DIR__ . "/../../private/config.php");

$searchKey = $_GET["term"];

$query = "SELECT * FROM murid WHERE NAMA_MURID LIKE '%" . $searchKey . "%' ORDER BY NAMA_MURID LIMIT 0, 5";
$result = mysqli_query($koneksi, $query);

$data = [];

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row["NAMA_MURID"];
}
$data = array_unique($data);

echo json_encode($data);
