<?php
	$user_name='root';
	$password="";
	$database="registration";

	$db = new PDO('mysql:host=localhost;dbname=' .$database .';charset=utf8', $user_name,$password);
	$db ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	



	$error="";

	if (isset($_POST['submit'])){ 
		$uname=$_POST['uname'];
		$pass1=$_POST['pass1'];
		$pass2=$_POST['pass2'];
		$email=$_POST['email'];


 
		
		$regex ='/^([a-zA-Z0-9]+@[a-z]+(\.)+[a-zA-Z]{2,3})$/';
		$uppercase = preg_match('@[A-Z]@', $email);
		$lowercase = preg_match('@[a-z]@', $email);
		$number    = preg_match('@[0-9]@', $email);
		$specialChars = preg_match('@[^\w]@', $pass1);
		$uppercase2 = preg_match('@[A-Z]@', $pass1);
		$lowercase2 = preg_match('@[a-z]@', $pass1);
		$number2    = preg_match('@[0-9]@', $pass1);



			if($uppercase || $lowercase || $number ||$specialChars|| strlen($uname)  >1) {

				if(preg_match($regex, $email)){
						
					if($uppercase2&&$lowercase2) 	{

						if( $number2 ){

							if($specialChars){

								if(strlen($pass1)  >8){

									if($pass1===$pass2){
					

										$sql="INSERT INTO users(username, email,password) values(?,?,?)";
										$stmtinsert= $db->prepare($sql);
										$result= $stmtinsert->execute([$uname,$email,$password]);

											header('location: welcome.html');
										exit();
										
									
									}else{$error="The two passwords do not match";}	
						 		
						 		}else{$error="Password length must be more than 8 ";}

						 	}else{$error="Password must contain special character";}

						}else{$error="Password must contain numbers";}

					}else{$error="Password must contain upper case and lowercase";}

				}else{$error="email must be in valid format";}

			}else{$error= "Invalid Username";}

			
		}						

										
	
?>






<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style1.css">

</head>
<body>
	<form method="POST">
		<h1>Sign Up</h1>
		<center><p id=qq><?php echo  $error;?> </p></center>
		
		<label>User Name</label>
		<center><input type="text" name="uname" required></center>
		<br>

		<label>Email</label><br>
		<center><input type="text" name="email" required> </center>

<br>
		<label>Password</label>
		<center><input type="Password" name="pass1" required></center>
		<br>

		<label>Confirm Password</label><br>
		<center><input type="Password" name="pass2" required></center>
		<br>

		<input ID="WW" type="submit" value="Register" class="btn" name="submit">

	</form>

</body>
</html>