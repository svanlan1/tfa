<?php require('../../core/config.php');  
	$resource = $db->prepare('SELECT * FROM resources');
	$resource->execute();
	$resources = array();
	while ( $rows = $resource->fetch(PDO::FETCH_ASSOC) ) {
		$resources[] = array("id"=>$rows['id'], "name"=>$rows['name'], "type"=>$rows['type'], "description"=>$rows['description'], 'photos'=>$rows['photos'], 'memberID'=>$rows['memberID'], 'dateAdded'=>$rows['dateAdded'], 'dateUpdated'=>$rows['dateUpdated'], 'plainname'=>$rows['plainname']);
	}
	echo json_encode(array("resources"=>$resources));
?>