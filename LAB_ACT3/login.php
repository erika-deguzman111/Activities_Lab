

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN </title>
</head>
<body>


<?php 

session_start(); 
include "db_conn.php";


if (isset($_POST['submit'])){
if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    //exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    //exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['id'] = $row['ID'];
            	
 			


				

            	$_SESSION['transcode']=$code =rand(111111,999999);

          		date_default_timezone_set('Asia/Manila');
          		$date =date("m-d-Y");
          		$_SESSION['transtime'] =$time =date("h:i:s");


          		$minutes_to_add=5;
          		$time2=new DateTime();
          		$time2->add(new DateInterval('PT' .$minutes_to_add .'M'));
          		$_SESSION['transexp'] =$timeexp =$time2->format("h:i:s");

          		$_SESSION['transcode']=$code =rand(111111,999999);
          		echo '<script> window.open("authentication.php"); </script>';

          		


          		$sql="INSERT INTO authentication (Code,Created,Expired) values('$code','$time','$timeexp')";
          		$stmt=mysqli_query($conn,$sql);

          		echo '<script> window.open("verify.php"); </script>';
          		
          	
          		


            		

            	
            }else{
				header("Location: index.php?error=Incorect User name or password");
		   
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	     
		}
	}
	
}else{
	header("Location: index.php");

}

}





?>
</body>
</html>