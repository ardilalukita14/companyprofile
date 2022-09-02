<?php 
 
include 'koneksi.php';
 
error_reporting(0);
 
session_start();

$remember   = "";

 if(isset($_COOKIE['cookie_email'])){
    $cookie_email = $_COOKIE['cookie_email'];
    $cookie_password = $_COOKIE['cookie_password'];

    $sql = "select * from login where email = '$cookie_email'";
    $q1   = mysqli_query($connect,$sql);
    $r1   = mysqli_fetch_array($q1);
    if($r1['password'] == $cookie_password){
        $_SESSION['session_email'] = $cookie_email;
        $_SESSION['session_password'] = $cookie_password;
    }
}
if (isset($_SESSION['email'])) {
    header("Location: index.php");
     exit();
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $remember   = $_POST['remember'];
 
    if($email == '' or $password == ''){
        $err .= "<li>Silakan masukkan email dan juga password.</li>";
    }else{
        $sql = "select * from login where email = '$email'";
        $q1   = mysqli_query($connect,$sql);
        $r1   = mysqli_fetch_array($q1);

        if($r1['email'] == ''){
            $err .= "<li>Email <b>$email</b> tidak tersedia.</li>";
        }elseif($r1['password'] != md5($password)){
            $err .= "<li>Password yang dimasukkan tidak sesuai.</li>";
        }  

        if(empty($err)){
            $_SESSION['session_email'] = $email; //server
            $_SESSION['session_password'] = md5($password);

               if($ingataku == 1){
                $cookie_name = "cookie_email";
                $cookie_value = $email;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");

                $cookie_name = "cookie_password";
                $cookie_value = md5($password);
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");
            }
            header("location:index.php");
        }
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Niagahoster Tutorial</title>
</head>
<body>
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error']?>
    </div>
 
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                        <input id="login-remember" type="checkbox" name="ingataku" value="1" 
                        <?php if($remember == '1') echo "checked"?>> Remember
                        </label>
                </div>
            </div>
            <br>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>