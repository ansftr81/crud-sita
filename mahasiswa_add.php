<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
<a href="index.php">Home</a>| <a href="mahasiswa.php">Data Mahasiswa</a>
    <br/><br/>
 
    <form action="mahasiswa_add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>NIM</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email"></td>
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
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO mahasiswa(nim, nama, email) VALUES('$nim', '$nama','$email')");
        
        // Show message when user added
        echo "Mahasiswa sudah ditambahkan. <a href='mahasiswa.php'>Lihat</a>";
    
        fuction cari($keyword){
            $query = "SELECT * FROM mahasiswa.php
            WHERE
            nama = '$keyword'
            ";
            return query($query);
        }
    }
    ?>
</body>

</html>
