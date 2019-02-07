<?php require('../../core/config.php');  
	$memlist = $db->prepare('SELECT * FROM members');
	$memlist->execute();
	$members = array();
	while ( $rows = $memlist->fetch(PDO::FETCH_ASSOC) ) {
		$members[] = array('memberID'=>$rows['memberID'], 'isAdmin'=>$rows['admin'], 'username'=>$rows['username'], 'email'=>$rows['email'], 'isActive'=>$rows['active'], 'isBanned'=>$rows['banned']);
	}

	$filmslist = $db->prepare('SELECT * FROM films order by subdate desc');
	$filmslist->execute();
	$films = array();
	while ( $rows = $filmslist->fetch(PDO::FETCH_ASSOC) ) {
		$films[] = array("name"=>$rows['name'], "descrip"=>$rows['descrip'], "director"=>$rows['director'], "writer"=>$rows['writer'], "id"=>$rows['id'], "user"=>$rows['user'], "link"=>$rows["link"], "poster"=>$rows["poster"], "studio"=>$rows["studio"], "subdate"=>$rows["subdate"], "tfa_category"=>$rows["tfa_category"], "year"=>$rows["year"], "budget"=>$rows["budget"], "releaseDate"=>$rows["releaseDate"], "cast"=>$rows["cast"], "crew"=>$rows["crew"], "platform"=>$rows["platform"], "wam_prize"=>$rows["wam_prize"]);
	}

	$retdata = array();
	$retdata['members'] = $members;
	$retdata['films'] = $films;
	echo json_encode($retdata);	
?>

