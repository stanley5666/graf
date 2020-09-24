<?php
session_start();
include('obr/pdb.php');
//include('obr/ver.php');

	$query = 'SELECT * FROM users WHERE `email` = :user';
	$result = $conn->prepare($query);
	$result->bindValue(':user',$_SESSION['username']);
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
			$uprevadzka = $row['prevadzka'];
			$usmena = $row['smena'];
			$_SESSION['uid'] = $idUsr;
			$_SESSION['uskratka'] = $skratka;
			$_SESSION['umobil'] = $umobil;
			$_SESSION['uemail'] = $uemail;
			$_SESSION['ufunc'] = $ufunc;
			$_SESSION['ulogin'] = $ulogin;
			$_SESSION['usadmin'] = $usadmin;
			$_SESSION['uadmin'] = $uadmin;
			$_SESSION['upadmin'] = $upadmin;
			$_SESSION['uprevadzka'] = $uprevadzka;
			$_SESSION['usmena'] = $usmena;

		}
		

?>

<div class="header" id="navigation">
<label for="show-menu" class="show-menu"><?php echo $_SESSION['page']; ?><i class="fa fa-bars" class="show-menu" style="display:inline-block;float:right; margin-right:15px;"></i></label>
<input type="checkbox" id="show-menu" role="button">

<ul id="menu">
<li><a href="http://corner.realcrm.sk"><img src="img/corner-white.png" height="30" style="margin-left:15px;"><strong>CORNER</strong></a></li>

			
			
<?php
$host = HTTP_HOST;
$menu1='<li><a href="'.$host.'prehlad">Prehľad</a><!--ul class="submenu"><li class="submenu"><a>Skuska</a></li></ul--></li><li> </li><li> </li>';
$menu6='<li><a href="'.$host.'report">Tržby</a><ul class="hidden"><li class="submenu"><a href="'.$host.'ine">Iné náklady</a></li></ul></li>';
$menu5='<li><a href="'.$host.'dochadzka">Dochádzka</a><!--ul class="hidden"><li class="submenu"><a href="'.$host.'vykazm">Mesačne</a></li></ul--></li><li> </li><li> </li>';
$menu4='<li><a href="'.$host.'mesacne">Mesačne</a></li>';
$menu3='<li>
			<a href="#">
				Nastavenia
			</a>
				<ul class="hidden">
					<!--li class="submenu">
						<a href="'.$host.'emaily">
							E-maily
						</a>
					</li-->
					<li class="submenu">
						<a href="'.$host.'prevadzky">
							Prevádzky
						</a>
					</li>
					<li class="submenu">
						<a href="'.$host.'zamestnanci">
							Zamestnanci
						</a>
					</li>
				</ul>
		</li>';
$menu2='<li class="user"><a href="#">
			'.$skratka.'
			</a><ul class="hidden">
				<li class="submenu"><a href="uvod.php?action=editPass&id='.$_SESSION['uid'].'">Zmeniť heslo</a></li>
				<li class="submenu"><a href="logout.php">Odhlásiť</a></li>
			</ul>
		</li>
	</ul></div>';


?>

<?php
	if($_SESSION['uadmin'] == 1 || $_SESSION['usadmin'] == 1) {
		echo $menu1;
		echo $menu6;
		echo $menu5;
		//echo $menu4;
		echo $menu3;
		echo $menu2;
		

	} elseif ($_SESSION['ulogin'] == 1) {
		echo $menu6;
		echo $menu5;
		echo $menu2;
		
	}


		

		?>