<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $nidn=$_POST['nidn'];
    $nama=$_POST['nama'];
    $nohp=$_POST['nohp'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE dosen SET nidn='$nidn', nama='$nama', nohp='$nohp' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: dosen.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM dosen WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $nidn = $user_data['nidn'];
    $nama = $user_data['nama'];
    $nohp = $user_data['nohp'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="dosen.php">Data dosen</a> |  <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="dosen_edit.php">
        <table border="0">
            <tr> 
                <td>NIDN</td>
                <td><input type="text" name="nidn" value=<?php echo $nidn;?>></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>No. HP</td>
                <td><input type="text" name="nohp" value=<?php echo $nohp;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>