<?php 
	session_start();

	if(isset($_SESSION['status']))
	{
?>
<html>
<head>
	<title>Admin Home </title>
</head>
<body>
	<h1 align="center">Welcome home, <?php echo $_GET['id']."!";?></h1>
	<p align="center"><a href="profile.html">profile</a><br>
	<a href="changepass.html">Change password</a><br>
	<a href="view.html">View Users</a><br>
	<a href="logout.php">Log out</a></p>
</body>
</html>
<?php 
	}else{
		echo "invalid request!";
	} 
?>