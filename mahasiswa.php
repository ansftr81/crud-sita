<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa ORDER BY id");

// Tombol cari ditekan
if (isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];
    $result = cari($mysqli, $keyword);
}

// Fungsi untuk mencari data berdasarkan keyword
function cari($conn, $keyword) {
    $query = "SELECT * FROM mahasiswa WHERE nim LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR email LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);
    return $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Home</a> :: <a href="mahasiswa_add.php">Tambah Mahasiswa</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" autofocus placeholder="Search...">
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br><br>

    <table width='80%' border=1>
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Update</th>
        </tr>
        <?php  
        while ($user_data = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$user_data['id']."</td>";
            echo "<td>".$user_data['nim']."</td>";
            echo "<td>".$user_data['nama']."</td>";
            echo "<td>".$user_data['email']."</td>";    
            echo "<td>
            <a href='mahasiswa_edit.php?id=".$user_data['id']."'>Edit</a> |
            <a href='mahasiswa_delete.php?id=".$user_data['id']."'>Delete</a></td>";
            echo "</tr>";   
        }
        ?>
    </table>
</body>
</html>
