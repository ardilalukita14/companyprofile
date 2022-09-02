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
		echo "Anda berhasil login ";
		echo '<a href="adminDashboard.php">Admin</a>';
	}elseif ($fechResult['role']=='user') {
		echo "Anda berhasil login ";
		echo '<a href="userDashboard.php">User Dashboard</a>';
	}
	else {
		echo "Anda gagal login ";
		echo "<a href='loginForm.html'>Login Form</a>";
	}
mysqli_close($connect);
?>
