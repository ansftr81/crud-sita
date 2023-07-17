<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
<a href="index.php">Home</a>| <a href="ta.php">Data TA</a>
    <br/><br/>
 
    <form action="ta_add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Judul</td>
                <td><input type="text" name="judul"></td>
            </tr>
            <tr> 
                <td>Mahasiswa</td>
                <td>
                <?php
                include_once("config.php");
 
                $result = mysqli_query($mysqli, "SELECT id, nim, nama FROM mahasiswa ORDER BY nama DESC");
                ?>
                    <select name="mahasiswa">
                        <option value="">Pilih Mahasiswa</option>
                <?php
                while($user_data = mysqli_fetch_array($result)) {
                   echo  "<option value='".$user_data['id']."'>".$user_data['nama']."</option>";
                }
                
                ?>
                </select>
                </td>
            </tr>
            <tr> 
                <td>Pembimbing</td>
                <td>
                <?php
                include_once("config.php");
 
                $result = mysqli_query($mysqli, "SELECT id, nidn, nama FROM dosen ORDER BY nama DESC");
                ?>
                    <select name="pembimbing">
                        <option value="">Pilih Dosen</option>
                <?php
                while($user_data = mysqli_fetch_array($result)) {
                   echo  "<option value='".$user_data['id']."'>".$user_data['nama']."</option>";
                }
                
                ?>
                </select>
                </td>
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
        $judul = $_POST['judul'];
        $mahasiswa = $_POST['mahasiswa'];
        $pembimbing = $_POST['pembimbing'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO ta(judul, mahasiswa, pembimbing) VALUES('$judul', '$mahasiswa','$pembimbing')");
        
        // Show message when user added
        echo "TA sudah ditambahkan. <a href='ta.php'>Lihat</a>";
    }
    ?>
</body>
</html>