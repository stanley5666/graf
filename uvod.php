<?php
session_start();
include('obr/pdb.php');
//include('obr/ver.php');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CORNER</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<!--meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0, viewport-fit=cover" /-->
<!--meta name="apple-touch-fullscreen" content="yes">
 <meta name="mobile-web-app-capable" content="yes"-->
<meta name="google" content="notranslate">
<meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0">
<meta http-equiv="expires" content="0">
<meta http-equiv="pragma" content="no-cache">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/zoz1.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="icon" href="img/corner-white.png" type="image/png"/>
<link rel="shortcut icon" href="img/corner-white.png" type="image/png"/>
<link rel="apple-touch-icon" href="img/corner-white.png" type="image/png">
<meta name="apple-mobile-web-app-title" content="corner-white">
<script language="javascript" type="text/javascript" src="js/functions.js"></script>
<script language="javascript" type="text/javascript" src="js/graf.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<script src="js/chart.min.js"></script>
</head>

<body>

<div class="menu">
<?php include('menu.php'); ?>
</div>

<div class="main">
   	<?php

	if ($_SESSION['usadmin'] == 1 || $_SESSION['uadmin'] == 1) {
	
	switch ($_GET["action"]) {

		case "prehlad":
		require ("prehlad.php");
		break;

		case "zamestnanci":
		require ("zamestnanci.php");
		break;

		case "addzam":
		require ("addedit.php");
		break;

		case "editzam":
		require ("addedit.php");
		break;

		case "prevadzky":
		require ("prevadzky.php");
		break;

		case "ine":
		require ("ine.php");
		break;

		case "report":
		require ("report.php");
		break;

		case "addtrz":
		require ("addedit.php");
		break;

		case "edittrz":
		require ("addedit.php");
		break;

		case "editine":
		require ("addedit.php");
		break;

		case "dochadzka":
		require ("dochadzka.php");
		break;
		
		case "adddoch":
		require ("addedit.php");
		break;
		
		case "editDoch":
		require ("addedit.php");
		break;

		case "editPass":
		require ("addedit.php");
		break;
		
		case "graf":
		require ("graf.php");
		break;

		case "":
		require ("prehlad.php");
	}
	
	} else if ($_SESSION['ulogin'] == 1) {
		
		switch ($_GET["action"]) {


			case "ine":
			require ("ine.php");
			break;

			case "report":
			require ("report.php");
			break;

			case "addtrz":
			require ("addedit.php");
			break;

			case "edittrz":
			require ("addedit.php");
			break;

			case "editine":
			require ("addedit.php");
			break;

			case "editPass":
			require ("addedit.php");
			break;
			
			case "dochadzka":
			require ("dochadzka.php");
			break;
			
			case "adddoch":
			require ("addedit.php");
			break;
			
			case "editDoch":
			require ("addedit.php");
			break;

			case "":
			require ("report.php");
		
		}
		
	} else {
		
	}


?>
	
</div>
</body>
</html>
