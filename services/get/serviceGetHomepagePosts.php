<?php require('../../core/config.php'); 
	$resource = $db->prepare('SELECT * FROM homepage order by posted asc');
	$resource->execute();
	$postsarr = array();
	while ( $rows = $resource->fetch(PDO::FETCH_ASSOC) ) {
		$postsarr[] = array("title"=>$rows['title'], "post"=>$rows['post'], "user"=>$rows['user'], "id"=>$rows['id'], "banner"=>$rows['banner'], "posted"=>$rows["posted"], "external"=>$rows['external'], "byline"=>$rows['byline'], "media"=>$rows['media'], "preLogin"=>$rows['preLogin'], "postLogin"=>$rows['postLogin'], "featured"=>$rows['featured'], "lead"=>$rows['lead']);
	}
	echo json_encode($postsarr);
?>