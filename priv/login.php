<?php
	session_start();
	$_SESSION['logged'] = true;

	$conn = @mysql_connect("localhost","root","");
	$db   =mysql_select_db("signup",$conn);
?>



<?php

	$u_name = $_POST['email'];
	$pass =$_POST['pwd'];
	$sql ="SELECT * FROM signup WHERE(
	Email='".$u_name."' and Password='".$pass."')";
	
	$sql1 ="SELECT Phone FROM data WHERE username='".$u_name."'";
	
	//$querry = mysql_query($sql1);
	//$reslt = mysql_fetch_array($querry);
	

	$qury = mysql_query($sql);
	$result = mysql_fetch_array($qury);

	
	 if($result[0]=0)
	{
		header("Location:home.html");
		//echo "<script>click();</script>";
		//echo "Your Phone Number is :" . $reslt[0];
			$_SESSION["user_name"] = $u_name;
$_SESSION["password"] = $pass;
		

	}
	else
	{echo  "login failed";
	 echo	"<br>";
	 echo  "Invalid Username or Password<br>";
	 echo	"<a href='login.html'>Click here to go back</a>";
		
	}
?>

