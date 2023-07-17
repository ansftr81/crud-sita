<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM dosen");
// tombol cari ditekan
if( isset($_POST["cari"]) ){
    $dosen = cari($_POST["keyword"]);
}
?>
 
<html>
<head>    
    <title>Data Dosen</title>
</head>
 
<body>
<a href="index.php">Home</a>|<a href="dosen_add.php">Tambah Dosen</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>ID</th>  <th>NIDN</th> <th>Nama</th> <th>No. HP</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['nidn']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['nohp']."</td>";    
        echo "<td>
                    <a href='dosen_edit.php?id=$user_data[id]'>Edit</a> | 
                    <a href='dosen_delete.php?id=$user_data[id]'>Delete</a>
            </td></tr>";        
    }
    ?>
    </table>
</body>
</html>