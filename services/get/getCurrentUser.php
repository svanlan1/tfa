<?php require('../../core/config.php');  

	$memberID = $_SESSION["memberID"];

	
	$memlist = $db->prepare('SELECT * FROM members WHERE memberID = :memberID');
	$memlist->execute(array(':memberID' => $_SESSION['memberID']));
	$members = array();
	while ( $rows = $memlist->fetch(PDO::FETCH_ASSOC) ) {
		$members[] = array('memberID'=>$rows['memberID'], 'isAdmin'=>$rows['admin'], 'username'=>$rows['username'], 'email'=>$rows['email'], 'isActive'=>$rows['active'], 'isBanned'=>$rows['banned']);
	}

	$meminfolist = $db->prepare('SELECT * FROM member_info WHERE memberID = :memberID');
	$meminfolist->execute(array(':memberID' => $_SESSION['memberID']));
	$meminfo = array();
	while ( $rows = $meminfolist->fetch(PDO::FETCH_ASSOC) ) {
		$meminfo[] = array('firstname'=>$rows['firstname'], 'lastname'=>$rows['lastname'], 'city'=>$rows['city'], 'state'=>$rows['state'], 'reel'=>$rows['reel'], 'headshot'=>$rows['headshot'], 'role'=>$rows['role'], 'gender'=>$rows['gender'], 'secondaryrole'=>$rows['secondaryrole'], 'bio'=>$rows['bio'], 'phone'=>$rows['phone'], 'exec_profile'=>$rows['exec_profile']);
	}

	$postlist = $db->prepare('SELECT * FROM posts WHERE memberID = :memberID');
	$postlist->execute(array(':memberID' => $_SESSION['memberID']));
	$posts = array();
	while ( $rows = $postlist->fetch(PDO::FETCH_ASSOC) ) {
		$posts[] = array('title'=>$rows['title'], 'tags'=>$rows['tags'], 'created'=>$rows['created'], 'edited'=>$rows['edited'], 'postid'=>$rows['postid'], 'category'=>$rows['category'], 'sticky'=>$rows['sticky'], 'posttext'=>$rows['posttext']);
	}


	$messageslist = $db->prepare('SELECT * FROM messages WHERE user = :memberID');
	$messageslist->execute(array(':memberID' => $_SESSION['memberID']));
	$messages = array();
	while ( $rows = $messageslist->fetch(PDO::FETCH_ASSOC) ) {
		$messages[] = array('id'=>$rows['id'], 'message'=>$rows['message'], 'senton'=>$rows['senton'], 'mread'=>$rows['mread'], 'page'=>$rows['page']);
	}

	$filmslist = $db->prepare('SELECT * FROM films WHERE user = :memberID');
	$filmslist->execute(array(':memberID' => $_SESSION['memberID']));
	$films = array();
	while ( $rows = $filmslist->fetch(PDO::FETCH_ASSOC) ) {
		$films[] = array("name"=>$rows['name'], "descrip"=>$rows['descrip'], "director"=>$rows['director'], "writer"=>$rows['writer'], "id"=>$rows['id'], "user"=>$rows['user'], "link"=>$rows["link"], "poster"=>$rows["poster"], "studio"=>$rows["studio"], "subdate"=>$rows["subdate"], "tfa_category"=>$rows["tfa_category"], "year"=>$rows["year"], "budget"=>$rows["budget"], "releaseDate"=>$rows["releaseDate"], "cast"=>$rows["cast"], "crew"=>$rows["crew"], "platform"=>$rows["platform"], "wam_prize"=>$rows["wam_prize"]);
	}

	$projectlist = $db->prepare('SELECT * FROM projects WHERE memberID = :memberID');
	$projectlist->execute(array(':memberID' => $_SESSION['memberID']));
	$projects = array();
	while ( $rows = $projectlist->fetch(PDO::FETCH_ASSOC) ) {
		$projects[] = array('id'=>$rows['id'], 'name'=>$rows['name'], 'description'=>$rows['description'], 'director'=>$rows['director'], 'writer'=>$rows['writer'], 'updates'=>$rows['updates'], 'poster'=>$rows['poster'], 'talent'=>$rows['talent'], 'sound'=>$rows['sound'], 'crew'=>$rows['crew'], 'locations'=>$rows['locations'], 'comments'=>$rows['comments'], 'dailies'=>$rows['dailies'], 'shoots'=>$rows['shoots'], 'status'=>$rows['status']);
	}

	$homepagelist = $db->prepare('SELECT * FROM homepage WHERE user = :memberID');
	$homepagelist->execute(array(':memberID' => $_SESSION['memberID']));
	$homepage = array();
	while ( $rows = $homepagelist->fetch(PDO::FETCH_ASSOC) ) {
		$homepage[] = array("title"=>$rows['title'], "post"=>$rows['post'], "user"=>$rows['user'], "id"=>$rows['id'], "banner"=>$rows['banner'], "posted"=>$rows["posted"], "external"=>$rows['external'], "byline"=>$rows['byline'], "media"=>$rows['media'], "preLogin"=>$rows['preLogin'], "postLogin"=>$rows['postLogin'], "featured"=>$rows['featured'], "lead"=>$rows['lead']);
	}

	$filmreviewslist = $db->prepare('SELECT * FROM filmreviews WHERE memberID = :memberID');
	$filmreviewslist->execute();
	$filmreviews = array();
	while ( $rows = $filmreviewslist->fetch(PDO::FETCH_ASSOC) ) {
		$filmreviews[] = array('memberID'=>$rows['memberID'], 'id'=>$rows['id'], 'created'=>$rows['created'], 'updated'=>$rows['updated'], 'title'=>$rows['title'], 'review'=>$rows['review']);
	}	

	$uploadslist = $db->prepare('SELECT * FROM uploads WHERE memberID = :memberID');
	$uploadslist->execute(array(':memberID' => $_SESSION['memberID']));
	$uploads = array();
	while ( $rows = $uploadslist->fetch(PDO::FETCH_ASSOC) ) {
		$uploads[] = array('id'=>$rows['id'], 'filepath'=>$rows['filepath'], 'filename'=>$rows['filename'], 'title'=>$rows['title'], 'category'=>$rows['category'], 'postedOn'=>$rows['postedOn']);
	}

	$resourceslist = $db->prepare('SELECT * FROM resources WHERE memberID = :memberID');
	$resourceslist->execute(array(':memberID' => $_SESSION['memberID']));
	$resources = array();
	while ( $rows = $resourceslist->fetch(PDO::FETCH_ASSOC) ) {
		$resources[] = array("id"=>$rows['id'], "name"=>$rows['name'], "type"=>$rows['type'], "description"=>$rows['description'], 'photos'=>$rows['photos'], 'memberID'=>$rows['memberID'], 'dateAdded'=>$rows['dateAdded'], 'dateUpdated'=>$rows['dateUpdated'], 'plainname'=>$rows['plainname']);
	}	

	$retdata['members'] = $members;
	$retdata['meminfo'] = $meminfo;
	$retdata['messages'] = $messages;
	$retdata['posts'] = $posts;
	$retdata['films'] = $films;
	$retdata['projects'] = $projects;
	$retdata['homepage'] = $homepage;
	$retdata['reviews'] = $filmreviews;
	$retdata['uploads'] = $uploads;
	$retdata['resources'] = $resources;
	echo json_encode($retdata);	
?>

