<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$strquery = "SELECT 
    ta.id, ta.judul, m.nama as mahasiswa, d.nama as pembimbing
    FROM
    ta
    INNER JOIN dosen d ON ta.pembimbing = d.id
    INNER JOIN mahasiswa m ON ta.mahasiswa = m.id";
$result = mysqli_query($mysqli, $strquery);
?>

<html>
<head>    
    <title>Data TA</title>
</head>
 
<body>
    <a href="index.php">Home</a> | <a href="ta_add.php">Tambah TA</a><br/><br/>
 
    <table width='80%' border=1>
        <tr>
            <th>ID</th>  
            <th>Judul</th> 
            <th>Mahasiswa</th> 
            <th>Pembimbing</th> 
            <th>Update</th>
        </tr>
        <?php  
        while ($row = mysqli_fetch_array($result)) {
            echo $row['id'];
            echo $row['judul'];
            echo $row['mahasiswa'];
            echo $row['pembimbing'];
        
        }
        ?>
    </table>
</body>
</html>
