<?php 
	session_start(); 
	include "db_conn.php";	

		
			

			if(isset($_POST['submit1'])){

				date_default_timezone_set('Asia/Manila');
        		$date =date("m-d-Y");
     			$time =date("h:i:s");

				$_SESSION['echotime1']=$intTime=strtotime($time);
				$_SESSION['echotime2']=$decTime=date('h.i.s', $intTime);




				$minutes_to_add=5;
				$time2=new DateTime();
				$time2->add(new DateInterval('PT' .$minutes_to_add .'M'));
				$timeexp =$time2->format("h:i:s");


				$vartime=$_SESSION['transtime'];
				$varcode=$_SESSION['transcode'];
				$verify=$_POST['verify'];

				$sql = "SELECT * from authentication WHERE Code='".$verify."'";
				$sql2 = "SELECT Expired from authentication WHERE Code='".$verify."'";

				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);

				$result2 = mysqli_query($conn, $sql2);
				$row2 = mysqli_fetch_assoc($result2);

				$_SESSION['echotime3']=$intTime2=strtotime($row2['Expired']);//convert time exp to integer
				$_SESSION['echotime4']=$decTime2=date('h.i.s', $intTime2);

				if($row['Code']===$_POST['verify']){

					if($decTime>$decTime2){

						echo'<script>alert("EXPIRED");</script>';


						


					}else{
						HEADER("Location: home.php");
					}


				}else{
						echo'<script>alert("CODE INVALID");</script>';
				}
			
			}


	 ?>




<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>
		verify login 
	</title>
</head>
<body>
		<form action="" method="post">
		<label><h1>Verify login here</h1></label><br>

     	  <input type="text" name="verify" placeholder="Enter code here:">
     	  <br>
          <br>
          <button type="submit" name="submit1">Login</button>
         </form>


</body>


</html>
