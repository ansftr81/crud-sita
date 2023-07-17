<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM dosen");

// Tombol cari ditekan
if (isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];
    $result = cari($mysqli, $keyword);
}

// Fungsi untuk mencari data berdasarkan keyword
function cari($conn, $keyword) {
    $query = "SELECT * FROM dosen WHERE nidn LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR nohp LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);
    return $result;
}
?>

<html>
<head>    
    <title>Data Dosen</title>
</head>
 
<body>
<a href="index.php">Home</a> | <a href="dosen_add.php">Tambah Dosen</a><br/><br/>
 
    <form action="" method="post">
        <input type="text" name="keyword" autofocus placeholder="Search...">
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br><br>
 
    <table width='80%' border=1>
        <tr>
            <th>ID</th>
            <th>NIDN</th>
            <th>Nama</th>
            <th>No. HP</th>
            <th>Update</th>
        </tr>
        <?php  
        while ($user_data = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$user_data['id']."</td>";
            echo "<td>".$user_data['nidn']."</td>";
            echo "<td>".$user_data['nama']."</td>";
            echo "<td>".$user_data['nohp']."</td>";    
            echo "<td>
                    <a href='dosen_edit.php?id=".$user_data['id']."'>Edit</a> | 
                    <a href='dosen_delete.php?id=".$user_data['id']."'>Delete</a>
                </td>";
            echo "</tr>";        
        }
        ?>
    </table>
</body>
</html>
