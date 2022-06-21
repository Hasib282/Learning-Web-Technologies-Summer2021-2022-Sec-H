<!DOCTYPE HTML>
<html>
<head>
	<title>Donor Login</title>
</head>
<body>



<?php 

session_start();
//variable decleration
$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

//If null
if($user == null || $pass == null){
		$error = "Null username or password...";
?>
	<form action="donor_log.php" method="post" enctype="">
		<fieldset>
			<legend align="center">Login</legend>
			<table align="center">
				<tr>
					<td>User Id <br><input type="text" name="id" value="" placeholder="ID"/></td>
				</tr>
				<tr>
					<td>Password<br><input type="password" name="pass" value="" placeholder="Password"/> </td>
				</tr>
				<tr>
					<hr>
					<td>
						<input type="submit" name="submit" value="Submit"/>
						<a href="registration.html"> Register </a>
					</td>
				</tr>
				<tr align="center">
					<td><?php echo "*".$error; ?></td>
				</tr>
			</table>
		</fieldset>
	</form>
	
<?php
	}
	
	
//read file
else{
	$file = fopen('user.txt', 'r');
	
	while (!feof($file)) {
		$data = fgets($file);
		$user = explode("|", $data); 
		if($id == trim($user[0]) && $pass == trim($user[1])) { //match id & pass
			$_SESSION['status'] = true;
			if($user[3]==Admin){
				header("location: adminhome.php");
			}
			else{
				header("location: userhome.html");
			}
			
		}
	}
	$error ="Invalid username or password";
?>

	<form action="donor_log.php" method="post" enctype="">
		<fieldset>
			<legend align="center">Login</legend>
			<table align="center">
				<tr>
					<td>User Id <br><input type="text" name="id" value="" placeholder="ID"/></td>
				</tr>
				<tr>
					<td>Password<br><input type="password" name="pass" value="" placeholder="Password"/> </td>
				</tr>
				<tr>
					<hr>
					<td>
						<input type="submit" name="submit" value="Submit"/>
						<a href="home.html"> Register </a>
					</td>
				</tr>
				<tr align="center">
					<td><?php echo "*".$error; ?></td>
				</tr>
			</table>
		</fieldset>
	</form>

<?php
}
?>
</body>
</html>
