<?php
session_start();

// Parameters of the form//
$age= $_POST['age'];
$tobacco=$_POST['tobacco'];
$alcohol=$_POST['alcohol'];
$famhist=$_POST['famhist'];
$obesity=$_POST['obesity'];
$sbp=$_POST['bps'];
$typea=$_POST['oldpeak'];
$idl=$_POST['idl'];
$adiposity=$_POST['adiposity'];
$chd=0;

$_SESSION["agese"] = $age;
$_SESSION["tobaccose"] = $tobacco;
$_SESSION["alcoholse"] = $alcohol;
$_SESSION["famhistse"] = $famhist;
$_SESSION["obesityse"] = $obesity;
$_SESSION["sbpse"] = $sbp;
$_SESSION["typease"] = $typea;
$_SESSION["idlse"] = $idl;
$_SESSION["adiposityse"] = $adiposity;
$_SESSION["chdse"]=$chd;



// Code for J48 tree//
if($age<=31)
	{
		if($tobacco<=0.5)
			{
			$chd='0';
			}
		elseif($tobacco>0.5)
		


			{
			if($alcohol<=11.1)
			{
				$chd='0';
			}
			else
			{
				if($famhist=1)
			{
				if($tobacco<=2.4)
				{
					$chd='0';
				}
				elseif($tobacco>2.4)
				{
					$chd=1;
				}
			}
			elseif($famhist=0)
			{
				if(obesity<=25.39)
				{
					if($alcohol<=21.9)
					{
						$chd=1;
					}
					elseif($alcohol>21.19)
					{
						if($sbp<=118)
						{
							$chd=0;
						}
						elseif($sbp>118)
						{
							$chd=1;
						}
					}
				}
				elseif(obesity>25.39)
				{
					$chd=0;
				}
			}
			}
			}

	}
elseif($age>31)
{
	if($typea<=68)
	{
		if($age<=50)
		{
			$chd=0;
		}
		elseif($age>50)
		{
			if($$famhist=1)
			{
				$chd=1;
			}
			elseif($famhist=0)
			{
				if($tobacco<=7.6)
				{
					if($tobacco<=4.82)
					{
						if($tobacco<=3.96)
						{
							$chd=0;
						}
						elseif($tobacco>3.96)
						{
							$chd=1;
						}
					}
					elseif($tobacco>4.82)
					{
						$chd=0;
					}
				}
				elseif($tobacco>7.6)
				{
					$chd=1;
				}
			}
		}
	}
	elseif($typea>68)
	{
		$chd=1;
	}
}

#echo "<h1>$chd</h1>";
$_SESSION["chdse"] = $chd;
#echo "<a href='result.php'>Click here</a><br>";
header("location:analytics.php");
#cho "<a href='analytics.php'>graph</a>";

?>