<?php

include_once(__DIR__ . "/../../private/config.php");

$searchKey = $_GET["term"];

$query = "SELECT * FROM jadwal_pelajaran WHERE IDJADWAL LIKE '%" . $searchKey . "%' ORDER BY IDJADWAL LIMIT 0, 5";
$result = mysqli_query($koneksi, $query);

$data = [];

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row["IDJADWAL"];
}
$data = array_unique($data);

echo json_encode($data);
