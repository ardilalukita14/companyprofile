<?php
    include "koneksi.php";
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $file = 'userDashboard.php';
    
    $query = "select * from user where username ='$username' and
    password='$password'";
    $result = mysqli_query($connect,$query);
    $fechResult = mysqli_fetch_assoc($result);
    $rowcount = mysqli_num_rows($result);


    if ($rowcount>0) {
        session_start();
        // $_SESSION['id'] = $fechResult['id'];
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        }
    if ($fechResult['role']=='admin') {
      header("Location: indexadmin.php");
    }elseif ($fechResult['role']=='user') {
        // echo "Anda berhasil login ";
        header("Location: index.php");
    }
    else {
        header("Location: login.php");
    }

    if(isset($_COOKIE['username']))
{
  $database->relogin($_COOKIE['username']);
  if ($fechResult['role']=='admin') {
      header("Location: indexadmin.php");
    }elseif ($fechResult['role']=='user') {
        // echo "Anda berhasil login ";
        header("Location: index.php");
    }
    else {
        header("Location: login.php");
    }
}
 
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(isset($_POST['remember']))
    {
      $remember = TRUE;
    }
    else
    {
      $remember = FALSE;
    }
 
    if($database->login($username,$password,$remember))
    {
      if ($fechResult['role']=='admin') {
      header("Location: indexadmin.php");
    }elseif ($fechResult['role']=='user') {
        // echo "Anda berhasil login ";
        header("Location: index.php");
    }
    else {
        header("Location: login.php");
    }
    }
}
mysqli_close($connect);
?>
