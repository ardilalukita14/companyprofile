<!DOCTYPE html>
<html>
<head>
	<style>
		table {
			width:  100%;
			border-collapse: collapse;
		}

		table,
		td,
		th {
			border: 1px solid black;
			padding: 5px;
		}

		th {
			text-align: left;
		}
	</style>
</head>
<body>

	<?php
		$q = intval($_GET['q']);

		$con = mysqli_connect('localhost', 'root', '');
		if (!$con) {
			die('Could not connect: ' .mysqli_error($con));
		}

		mysqli_select_db($con, "tsa_web");
		$sql = "SELECT * FROM user WHERE id ='" . $q . "'";
		$result = mysqli_query($con, $sql);

		echo "<table>
			<tr>
				<th>Username</th>
				<th>Password</th>
				<th>Role</th>
			</tr>";

			while($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['username'] . "</td>";
				echo "<td>" . $row['password'] . "</td>";
				echo "<td>" . $row['role'] . "</td>";
				echo "</tr>";
			}
		echo "</table>";
		mysqli_close($con);
?>
</body>
</html>