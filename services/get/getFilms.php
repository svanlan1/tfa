<?php require('../../core/config.php');  
	$resource = $db->prepare('SELECT * FROM films order by subdate desc');
	$resource->execute();
	$postsarr = array();
	while ( $rows = $resource->fetch(PDO::FETCH_ASSOC) ) {
		$postsarr[] = array("name"=>$rows['name'], "descrip"=>$rows['descrip'], "director"=>$rows['director'], "writer"=>$rows['writer'], "id"=>$rows['id'], "user"=>$rows['user'], "link"=>$rows["link"], "poster"=>$rows["poster"], "studio"=>$rows["studio"], "subdate"=>$rows["subdate"], "tfa_category"=>$rows["tfa_category"], "year"=>$rows["year"], "budget"=>$rows["budget"], "releaseDate"=>$rows["releaseDate"], "cast"=>$rows["cast"], "crew"=>$rows["crew"], "platform"=>$rows["platform"], "wam_prize"=>$rows["wam_prize"]);
	}
	echo json_encode($postsarr);
?>