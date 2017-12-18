<?php
session_start();
$famhist = $_SESSION['famhistse'];
$chd = $_SESSION['chdse'];
?>


<html>
	<head>
		<title>Heart Disease Prediction System- Logout</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/jquery-1.11.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/myScript.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	</head>
	<body>
	<br>
	<br>
		<table width="100%">
			<tr>
				
				<td>
					<ul class="nav nav-pills" style="float:right">
					<li><a href="index.html">Home</a></li>
					<li><a href="signup.html">Sign Up</a></li>
					<li><a href="login.html">Login</a></li>
					
					
					</ul>
				</td>
			</tr>
		</table>
		<br>
		<br>
		<div class="container">
			<div class="row vcenter">
				<div class="col-md-8 col-md-offset-2">
					<?php
					if($chd==0 && $famhist==1)
					{
						echo "<h1>You may suffer from Heart Disease</h1>";
					}
					elseif($chd==0 && $famhist==0)
					{
						echo "<h1>You dont't have any Heart Disease</h1>";
					}
					elseif($chd==1 && ($famhist==1 || $famhist==0))
					{
						echo "<h1>You are suffering from Heart Disease, attention is needed</h1>";
					}
					?>
				</div>				
			</div>			
		</div>
		</br>
		</br>
		</br>
		
	   
	</body>
</html>	