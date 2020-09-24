<?php
session_start();
require 'obr/pdb.php';
/*
if(isset($_COOKIE['over'])) {
	$query = 'SELECT * FROM users WHERE `pass` = :username';
	$result = $conn->prepare($query);
	$result->bindValue(':username', $_COOKIE['over']);
	$result->execute();
	
		while ($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$idUsr = $row['id'];
			$skratka = $row['skratka'];
			$umobil = $row['mobil'];
			$uemail = $row['email'];
			$ufunc = $row['func'];
			$ulogin = $row['login'];
			$usadmin = $row['sadmin'];
			$uadmin = $row['admin'];
			$upadmin = $row['padmin'];
			$_SESSION['uid'] = $idUsr;
			$_SESSION['uskratka'] = $skratka;
			$_SESSION['umobil'] = $umobil;
			$_SESSION['uemail'] = $uemail;
			$_SESSION['ufunc'] = $ufunc;
			$_SESSION['ulogin'] = $ulogin;
			$_SESSION['usadmin'] = $usadmin;
			$_SESSION['uadmin'] = $uadmin;
			$_SESSION['upadmin'] = $upadmin;
			$_SESSION['logged'] = 1;
		}
		
header('Location: uvod.php');
					
}*/
 
if(isset($_POST['submit'])){
    
    $userName = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
	$passwordCheck = hash("sha256", $passwordAttempt);
			
			$sql = "SELECT * FROM users WHERE email = :username";
			$stmt = $conn->prepare($sql);
			
				$stmt->bindValue(':username', $userName);
				
				$stmt->execute();
				
				$user = $stmt->fetch(PDO::FETCH_ASSOC);
				
				
				if($user === false){
					echo '<div style="margin: 0 auto;text-align:center;margin-top:150px;color:red;font-weight: bold;">Chybné meno alebo heslo!</div>';
				
				} else{
					if($user['login'] == "1") {
					
						if($user['pass'] == $passwordCheck){
							
						
							$_SESSION['username'] = $userName;
							$_SESSION['password'] = $passwordAttempt;
							if(!isset($_COOKIE['over'])) {
								setcookie('over', $user['pass'], time() + (86400 * 30), 'corner.realcrm.sk');
							}
							$_SESSION['logged'] = 1;
							
							header('Location: uvod.php');
						
						} else{
							//echo $passwordCheck;
							echo '<div style="margin: 0 auto;text-align:center;margin-top:150px;color:red;font-weight: bold;">Chybné meno alebo heslo!</div>';
						}
					} else {
						echo '<div style="margin: 0 auto;text-align:center;margin-top:150px;color:red;font-weight: bold;">Nemáte prístup!</div>';
					}
				}
	
	
    
}
 
?>


<html>
	<head>
		<title>Prihlásenie</title>
		<link rel="stylesheet" type="text/css" media="all" href="css/login.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<link rel="icon" href="img/favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
		<link rel="apple-touch-icon" href="img/favicon.ico" type="image/x-icon">

  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="mobile-web-app-capable" content="yes">

  <meta name="google" content="notranslate">
  <meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0">
  <meta http-equiv="expires" content="0">
  <meta http-equiv="pragma" content="no-cache">


	</head>
	<body>
	<div class="login">
		<form action="index.php" method="post">
			<table align="center">
				<tr>
					<th>Prihlásenie</th>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td>
						<div style="width:70px;"><strong>Meno:</strong></div>
						<div style="display:inline-block;"><input type="email" name="username" value="<?php echo $userName; ?>" /></div>
					</td>
				</tr>
				<tr>
				</tr>
				<tr>
					<td>
						<div style="width:70px;"><strong>Heslo:</strong></div>
						<div style="display:inline-block;"><input type="password" name="password" value="<?php echo $passwordAttempt; ?>" /></div>
					</td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td style="text-align:center">
						<input type="submit" class="btn" name="submit" value="Prihlásiť" />
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
	
