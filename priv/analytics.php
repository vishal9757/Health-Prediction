<?php
	session_start();
	
	if(!isset($_SESSION['agese'])){
		$age = 0;
	}
	else{
		$age = $_SESSION['agese'];
	}
		if(!isset($_SESSION['tobaccose'])){
		$tobacco= 0;
	}
	else{
		$tobacco = $_SESSION['tobaccose'];
	}
		if(!isset($_SESSION['alcoholse'])){
		$alcohol = 0;
	}
	else{
		$alcohol = $_SESSION['alcoholse'];
	}
		if(!isset($_SESSION['famhistse'])){
		$famhist = 0;
	}
	else{
		$famhist = $_SESSION['famhistse'];
	}
		if(!isset($_SESSION['obesityse'])){
		$obesity = 0;
	}
	else{
		$obesity = $_SESSION['obesityse'];
	}
		if(!isset($_SESSION['sbpse'])){
		$sbp = 0;
	}
	else{
		$sbp = $_SESSION['sbpse'];
	}
		if(!isset($_SESSION['typease'])){
		$typea = 0;
	}
	else{
		$typea = $_SESSION['typease'];
	}
		if(!isset($_SESSION['idlse'])){
		$idl = 0;
	}
	else{
		$idl = $_SESSION['idlse'];
	}
		if(!isset($_SESSION['adiposityse'])){
		$adiposity = 0;
	}
	else{
		$adiposity = $_SESSION['adiposityse'];
	}
		if(!isset($_SESSION['chdse'])){
		$chd = 0;
	}
	else{
		$chd = $_SESSION['chdse'];
	}
?>



<html>
	<head>
		<title>Heart Disease Analytics</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/jquery-1.11.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/myScript.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
		<script src="js/ajaxGetPost.js" type="text/javascript"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	
		
	</head>
	<body>
	<br>
	
		<table width="100%">
			
				<td width="900px">
					<ul class="nav nav-pills" style="float:right">
					<li ><a href="home.html">Home</a></li>
					<li ><a href="user_form.html">User form</a></li>
					<li class="active"><a href="analytics.html">Analytics</a></li>
					<li><a href="logout.php">Log Out</a></li>
					
					</ul>
				</td>
			</tr>
		</table>
		</br>
		
		<!-- Navigation to sections -->
		<?php

    /*
        Include the `fusioncharts.php` file that contains functions to embed the charts.
    */
    include("fusioncharts.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>FusionCharts XT - Pie 2D Chart</title>
        <!--  Include the `fusioncharts.js` file. This file is needed to render the chart. Ensure that the path to this JS file is correct. Otherwise, it may lead to JavaScript errors. -->
        <script src="fusioncharts.js"></script>
    </head>
	<style>
	.over{
		text-decoration: underline;
		color: red;
	}
	.over1{
		color: red;
	}
	</style
    <body>
        <?php
            /* `$arrData` is the associative array that is initialized to store the chart attributes. */
            $arrData = array(
                "chart" => array(
                   
                    "xaxisname"=> "Parameters",
					"yaxisname"=> "Value",
                    "theme"=> "zune"
                )
            );
            /*
                The data to be plotted on the chart is stored in the `$actualData` array in the key-value form.
            */
            $actualData = array(
                "SBP" => $sbp,
                "Tobacco" => $tobacco,
                "IDL" => $idl,
                "Adiposity" => $adiposity,
				"Type-A" => $typea,
				"Obesity" => $obesity,
				"Alcohol" => $alcohol,
            );
            /*
                Convert the data in the `$actualData` array into a format that can be consumed by FusionCharts. The data for the chart should be in an array wherein each element of the array is a JSON object having the "label" and “value” as keys.
            */
            $arrData['data'] = array();
            // Iterate through the data in `$actualData` and insert in to the `$arrData` array.
            foreach ($actualData as $key => $value) {
                array_push($arrData['data'],
                    array(
                        'label' => $key,
                        'value' => $value
                    )
                );
            }

            /*
                JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
            */
            $jsonEncodedData = json_encode($arrData);
            /*
                Create an object for the pie chart  using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.
            */
            $mscombi2dChart = new FusionCharts("column2d", "ex3", "70%", 400, "chart-1", "json", $jsonEncodedData);
            // Render the chart
            $mscombi2dChart->render();
			
			
        ?>
        <div id="chart-1" style="padding-left: 20%">Fusion Charts will render here</div>
 

		




		
		
		
		</br>
		</br>
		
			<div class="container">
			
				<div class="col-md-8 col-md-offset-3">
					<?php
					
					if($chd==1 && $famhist==0)
					{
						echo"<h1>70%-80% chances of having Heart Disease</h1>";
					}
					if($chd==0 && $famhist==1)
					{
						echo "<h1>60%-70% chances of having Heart Disease</h1>";
					}
					elseif($chd==0 && $famhist==0)
					{
						echo "<h1>You don't have any Heart Disease</h1>";
					}
					elseif($chd==1 && $famhist==1)
					{
						echo "<h1>85%-90% chances of having Heart Disease</h1>";
					}
					
					
					?>
				</div>				
					
		</div>
		<br>
		<br>
		
		
<!--parameters table-->
		<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		<table class="table table-bordered">
		<tr>
		<td style="font-weight: bold;">Parameters</td>
		<td style="font-weight: bold;">Value</td>
		<td style="font-weight: bold;">Status</td>
		</tr>
		<tr>
		<td>Standard Blood Pressure</td>
		<?php 
		
		if($sbp>=138)
			{
				
			echo '<td class="over">'. $sbp .'</td>';
			echo '<td class="over1">Above Normal</td>';
			}
		else
			{
			echo '<td>'. $sbp .'</td>';
			echo '<td>Normal</td>';
			}
		?>
		</tr>
		
		<tr>
		<td>Tobacco</td>
		<?php 
		if($tobacco>=5)
			{
				
			echo '<td class="over">'. $tobacco .'</td>';
			echo '<td class="over1">Above Normal</td>';
			}
		else
			{
			echo '<td>'. $tobacco .'</td>';
			echo '<td>Normal</td>';
			}
		?>
		</tr>
		
		<tr>
		<td>IDL</td>
		<?php 
		if($idl>=4)
			{
				
			echo '<td class="over">'. $idl .'</td>';
			echo '<td class="over1">Above Normal</td>';
			}
		else
			{
			echo '<td>'. $idl .'</td>';
			echo '<td>Normal</td>';
			}
		?>
		</tr>
		
		<tr>
		<td>Adiposity</td>
		<?php 
		if($adiposity>=24)
			{
				
			echo '<td class="over">'. $adiposity .'</td>';
			echo '<td class="over1">Above Normal</td>';
			}
		else
			{
			echo '<td>'. $adiposity .'</td>';
			echo '<td>Normal</td>';
			}
		?>
		</tr>
		
		<tr>
		<td>Type-A</td>
		<?php 
		if($typea>=50)
			{
				
			echo '<td class="over">'. $typea .'</td>';
			echo '<td class="over1">Above Normal</td>';
			}
		else
			{
			echo '<td>'. $typea .'</td>';
			echo '<td>Normal</td>';
			}
		?>
		</tr>
		
		<tr>
		<td>Obesity</td>
		<?php 
		if($obesity>=26)
			{
				
			echo '<td class="over">'. $obesity .'</td>';
			echo '<td class="over1">Above Normal</td>';
			}
		else
			{
			echo '<td>'. $obesity .'</td>';
			echo '<td>Normal</td>';
			}
		?>
		</tr>
		
		<tr>
		<td>Alcohol</td>
		<?php 
		if($alcohol>=16)
			{	
			echo '<td class="over">'. $alcohol .'</td>';
			echo '<td class="over1">Above Normal</td>';
			}
		else
			{
			echo '<td>'. $alcohol .'</td>';
			echo '<td>Normal</td>';
			}
		?>
		</tr>
		
		</table>
		</div>
		<div class="col-md-4"></div>
		</div>
		
		<div class="container">
		<?php
		if($sbp>=138)
		{	
			echo"<h1>High blood pressure</h1><br>";
			echo"<h4>Eat a healthy diet. Eating a diet that is rich in whole grains, fruits, vegetables and low-fat dairy
			products and skimps on saturated fat and cholesterol can lower your blood pressure by up to 14 mm Hg. 
			This eating plan is known as the Dietary Approaches to Stop Hypertension (DASH) diet.</h4><br>";
		}
		
		if($tobacco>=5)
		{
			echo"<h1>Tobacco</h1><br>";
			echo"<h4>1.Avoid white flour, sugar, and dairy products.</h4><br>";
			echo"<h4>2.Try to stay away from smokers!</h4><br>";
			echo"<h4>If you are one that likes to smoke more when you drink, try avoiding alcohol until you feel you are comfortable to drink and not smoke.</h4><br>";
		}
		
		if($idl>=4)
		{
			echo"<h1>IDL</h1><br>";
			echo"<h4>The best way to reduce high low-density lipoprotein (LDL) cholesterol is to lose weight and eat foods that are low in cholesterol, saturated fats, and trans fats.
			If you have high LDL cholesterol, you may also want to consider taking medicine.</h4><br>";
		}
		
		if($obesity>=26)
		{
			echo"<h1>Obesity</h1><br>";
			echo"<h4>To prevent obesity and maintain a healthy body weight, eat a well-balanced diet and exercise regularly. Preventing obesity is important. Once fat cells form, they remain in your body forever. 
			Although you can reduce the size of fat cells, you cannot get rid of them</h4><br>";
		}
		
		if($alcohol>=16)
		{
			echo"<h1>Alcohol</h1><br>";
			echo"<h4>Most people can process about one drink an hour. Continue snacking on bread, crackers, fruits or other starchy foods through the night. This will help slow the absorption of alcohol and 
			keep blood sugar levels up, which can stop you from suffering hangovers. Drink plenty of water.</h4>";
		}
		
		
		?>
		</div>
		

	</body>
</html>	