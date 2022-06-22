<?php

include_once "../private/config.php";

function tambah($data, $keys, $nama_tabel)
{
	global $koneksi;
	$arrs = [];
	foreach ($keys as $key) {
		$arrs[] = htmlspecialchars($data[$key]);
	}

	$query = "INSERT INTO $nama_tabel VALUES ('$arrs[0]'";
	for ($i = 1; $i < count($arrs); $i++) {
		$query .= ", '$arrs[$i]'";
	}
	$query .= ")";

	mysqli_query($koneksi, $query);
	return mysqli_affected_rows($koneksi);
}

function ubah($data, $keys, $nama_tabel, $id)
{
	global $koneksi;
	$arrs = [];
	foreach ($keys as $key) {
		$arrs[] = htmlspecialchars($data[$key]);
	}

	$query = "UPDATE $nama_tabel SET $keys[1] = '$arrs[1]'";
	for ($i = 2; $i < count($arrs); $i++) {
		$query .= ", $keys[$i] = '$arrs[$i]'";
	}
	$query .= "WHERE $keys[0] = '$id';";

	mysqli_query($koneksi, $query);
	return mysqli_affected_rows($koneksi);
}

function hapus($id, $nama_tabel, $key_id)
{
	global $koneksi;
	$query = "DELETE FROM $nama_tabel WHERE $key_id='$id'";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function cari($keyword, $nama_tabel, $column_name)
{
	$query = "SELECT * FROM $nama_tabel WHERE $column_name LIKE '%$keyword%'";
	return $query;
}
