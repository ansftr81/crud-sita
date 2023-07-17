<?php
$conn = mysqli_connect("localhost", "root", "root",);

	
function query($sql) {
	global $conn;
	$result = mysqli_query($conn, $sql);

	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}


fuction cari($keyword){
    $query = "SELECT * FROM mahasiswa
    WHERE
    nama = '$keyword'
    ";
    return query($query);
}


?>