<?php
$user     = "";
$password = "";
$err      = "";
if(isset($_POST ['login'])){
    $user     = $_POST['user'];
    $password = $_POST['password'];
    if($user == '' or $password == ''){
        $err .= "<li>Silahkan Masukan Username dan Password</li>";
    }
    if(empty($err)){
        $sql1 = "select * from Admin where user = 'user'";
        $sq1  = mysqli_query($koneksi, $sql1);
        $r1   = mysqli_fetch_array($sq1);
        if($r1['password'] != md5($password)){
            $err .= "<li>Akun tidak ditemukan</li>";
        }
    } 
    if (empty($err)){
        $_SESSION['admin_user'] = $user;
        header("location:index.php");
        exit();
    }
}
?>
<html>
    <head><title>Halaman Login</title></head>
    <body>
        <center>
            <form position="center" method="post" action="index.php">
                username : <input type="text" name="user"><br />
                password : <input type="password" name="password"><br />
                <input type="submit" value="LOGIN">
              </form>
        </center>
    </body>
</html>