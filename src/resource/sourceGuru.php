<?php

include_once(__DIR__ . "/../../private/config.php");

$searchKey = $_GET["term"];

$query = "SELECT * FROM guru_pengajar WHERE NAMAGURU LIKE '%" . $searchKey . "%' ORDER BY NAMAGURU LIMIT 0, 5";
$result = mysqli_query($koneksi, $query);

$data = [];

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row["NAMAGURU"];
}
$data = array_unique($data);

echo json_encode($data);
