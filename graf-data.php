

<?php
session_start();
include('obr/pdb.php');
//include('obr/ver.php');
include('obr/sel.php');
header('Content-Type: application/json');

?>
<?php
$query = 'SELECT * FROM graf ORDER BY id ASC';
$res = $conn->prepare($query);
$res->execute();

$rows = $res->fetchAll(PDO::FETCH_ASSOC);
$dataPoints = array();
foreach($rows as $row) {
	$dataPoints[] = $row;
}

print json_encode($dataPoints);
//print_r($dataPoints);

	
?>