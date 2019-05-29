<?php require('../../core/config.php');  
	$resource = $db->prepare('SELECT * FROM ticker order by dateAdded desc LIMIT 1');
	$resource->execute();
	$tarr = array();
	while ( $rows = $resource->fetch(PDO::FETCH_ASSOC) ) {
		$tarr[] = array('memberID'=>$rows['memberID'], 'dateAdded'=>$rows['dateAdded'], 'text'=>$rows['text']);
	}
	echo json_encode($tarr);
?>