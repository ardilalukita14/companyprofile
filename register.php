<?php
    if(isset($_POST['register']))
    {
        // Get data
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        if($username!='' && $password!='' && $role!='')
        {

        // SQL statement
        $sql = "INSERT INTO user(username, password, role) VALUES('$username', '$password', '$role')";

        // Membuat koneksi
        include_once('koneksi.php');

        // Membuat query
        $query = mysqli_query($connect, $sql) or die("Insert data gagal");

            if($query) {
                // echo "$username Berhasil register";
            }
        }
        // else {
        //     echo "Silakan lengkapi form terlebih dahulu"
        //     }
        }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Niagahoster Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email" name="register">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" name="username" class="form-control form-control-lg" id="username" placeholder="Username">
            </div>
            <div class="input-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password">
            </div>
           <!--  <div class="form-check" style="margin-left:10px">
                <input type="checkbox" name="administrator" class="form-control form-control-lg" id="administrator"> Administrator
                <br>
                 <input type="checkbox" name="user" class="form-control form-control-lg" id="user"> User
            </div> -->
            <div class="input-group">
             <select name="role" style="margin-left:15px; width:150px; background-color: white;">
                 <option value="admin">Admin</option>
                 <option value="user" selected="selected">User</option>
            </select>
        </div>
            <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="iagree" value="1" class="form-check-input">
                      Saya Setuju dengan syarat dan ketentuan berlaku
                    </label>
                  </div>
                </div>
                <br>
            <div class="input-group">
                <input type="submit" name="register" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="REGISTER"/>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="sessionLoginForm.html">Login </a></p>
        </form>
    </div>
</body>
</html>