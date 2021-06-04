
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color:pink;">
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<center><p class="error"><?php echo $_GET['error']; ?></p></center>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="ADMIN"><br>
          <br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="ADMIN123"><br>
          <br>

     	<button type="submit" name="submit">Login</button>



     </form>



</body>
</html>

