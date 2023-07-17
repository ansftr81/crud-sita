<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    <a href="index.php">Home</a>|<a href="dosen.php">Data Dosen</a>
    <br/>
 
    <form action="dosen_add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>NIDN</td>
                <td><input type="text" name="nidn"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>No. HP</td>
                <td><input type="text" name="nohp"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nidn = $_POST['nidn'];
        $nama = $_POST['nama'];
        $nohp = $_POST['nohp'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO dosen(nidn, nama, nohp) VALUES('$nidn', '$nama','$nohp')");
        
        // Show message when user added
        echo "dosen sudah ditambahkan. <a href='dosen.php'>Lihat</a>";
    }
    ?>
</body>
</html>