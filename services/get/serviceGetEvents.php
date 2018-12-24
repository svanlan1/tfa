<?php require('includes/config.php'); 
	$resource = $db->prepare('SELECT * FROM events order by startDate desc');
	$resource->execute();
	$postsarr = array();
	while ( $rows = $resource->fetch(PDO::FETCH_ASSOC) ) {
		$postsarr[] = array("title"=>$rows['title'], "details"=>$rows['details'], "startDate"=>$rows['startDate'], "endDate"=>$rows['endDate'], "url"=>$rows['url'], "user"=>$rows['user']);
	}
	echo json_encode($postsarr);
?>