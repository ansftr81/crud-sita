<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database

$strquery = "SELECT 
ta.id, ta.judul, m.nama as mahasiswa, d.nama as pembimbing

FROM
ta, dosen d, mahasiswa m

WHERE
ta.mahasiswa = m.id
AND
ta.pembimbing = d.id";

$result = mysqli_query($mysqli, $strquery);

?>
 
<html>
<head>    
    <title>Data TA</title>
</head>
 
<body>
<a href="index.php">Home</a>|<a href="ta_add.php">Tambah TA</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>ID</th>  <th>Judul</th> <th>Mahasiswa</th> <th>Pembimbing</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['judul']."</td>";
        echo "<td>".$user_data['mahasiswa']."</td>";
        echo "<td>".$user_data['pembimbing']."</td>";    
        echo "<td>
                    <a href='TA_edit.php?id=$user_data[id]'>Edit</a> | 
                    <a href='TA_delete.php?id=$user_data[id]'>Delete</a>
            </td></tr>";        
    }
    ?>
    </table>
</body>
</html>