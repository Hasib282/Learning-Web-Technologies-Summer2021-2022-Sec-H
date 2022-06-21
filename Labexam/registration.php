<!DOCTYPE HTML>
<html>
<head>
	<title>Registration</title>
</head>
<body>


<?php
	//variable defines
	$id = $_REQUEST["id"];
	$pass = $_REQUEST["pass"];
	$cpass = $_REQUEST["cpass"];
	$name = $_REQUEST["name"];
	$user = $_REQUEST["user"];
	
	
	$error_name=$error_id=$error_pass=$error_user="";
	
	
	
	
	
	//Name validation
	if($name == null){ //null check
		$error_name = "*Name is required<br>";
	}
	else if(strlen($name)<2){ //if less than two charecter
		$error_name = "*Name must contain two words<br>";
	}
	else if((!preg_match("/^[a-zA-Z][a-zA-Z_\.\s]*$/",$name))){
		$error_name = "*Only contain letter '_' and '.' also need to be start with a letter<br>";
	}
	
	
	
	
	//id validation
	if($id == null){
		$error_id = "*ID is required<br>";
	}
	else if(!preg_match("/^[a-zA-Z0-9_\.\s]*$/",$id)){
		$error_id = "*Only contain letter '_' and '.' also need to be start with a letter<br>";
	}
	else{
		//Chech if id is already exist or not
		$file = fopen('user.txt', 'r');
		
		while (!feof($file)) {
			$data = fgets($file);
			$user = explode("|", $data); 
			if(trim($user[0])== $id){
				$error_id = "*ID already taken.";
			}
		}
	}
	
	
	//password
	if($pass == null || $cpass == null){
		$error_pass = "*Password is required<br>";
	}
	else if(strlen($pass) != 6){
		$error_pass = "*6 digit only <br>";
	}
	else if($pass != $cpass){
		$error_pass = "*Password not matched<br>";
	}
	
	
	
	
	//user type validation
	if($user == null){
		$error_user = "*User type is required<br>";
	}
	
	
	
	//if no error than go to login page
	if ($error_name=="" && $error_id=="" && $error_user==""  $error_pass==""){
		
		$user = $id."|".$pass."|".$name."|".$user."\r\n";
		
		//write a file
		$file = fopen('user.txt', 'a');
		fwrite($file, $user);
		fclose($file);
		header('location: login.html');
	}
	else{
?>

	<?php //form notice show ?>
	<form action="registration.php" method="post" >
		<fieldset>
			<legend>Registration</legend>
			<table>
				<tr>
					<td>ID<br><input type="text" name="id" value="<?php echo $id; ?>" placeholder="ID"></td>
					<td><?php echo $error_id; ?></td>
				</tr>
				<tr>
					<td>Password<br><input type="password" name="pass" value="<?php echo $pass; ?>" placeholder="Password"></td>
					<td><?php echo $error_pass; ?></td>
				</tr>
				<tr>
					<td>Confirm Password<br><input type="password" name="cpass" value="<?php echo $cpass; ?>" placeholder="Confirm Password"></td>
					<td><?php echo $error_pass; ?></td>
				</tr>
				<tr>
					<td>
						Name<br><input type="text" name="name" value="<?php echo $name; ?>" Placeholder="Name">
					</td>
					<td><?php echo $error_name; ?></td>
				</tr>
				<tr>
					<td>User Type<br><hr></td>
				</tr>
				
				<tr>
					<td>
						<input type="radio" name="user" value="Admin" checked> Admin
						<input type="radio" name="user" value="User" > User<br>
						<hr>
					</td>
					<td><?php echo $error_user; ?></td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit" value="Sign Up">
						<a href="login.html">Sign in</a>
						
					</td>
				</tr>
				<tr>
					
				</tr>
			</table>
			
		</fieldset>
	</form>




<?php
	}
?>
</body>
</html>