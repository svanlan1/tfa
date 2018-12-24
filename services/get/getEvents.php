<?php require('../../core/config.php');  
	$resource = $db->prepare('SELECT * FROM events order by startDate desc');
	$resource->execute();
	$postsarr = array();
	while ( $rows = $resource->fetch(PDO::FETCH_ASSOC) ) {
		$postsarr[] = array('id'=>$rows['id'], 'user'=>$rows['user'], 'startDate'=>$rows['startDate'], 'endDate'=>$rows['endDate'], 'title'=>$rows['title'], 'details'=>$rows['details'], 'url'=>$rows['url'], 'location'=>$rows['location'], 'meetup'=>$rows['meetup'], 'gmaps'=>$rows['gmaps'], 'photo'=>$rows['photo']);
	}
	echo json_encode($postsarr);
?>