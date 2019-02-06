<?php require('../../core/config.php');  
    $memberID = $_SESSION["memberID"];
    $memlist = $db->prepare('SELECT * FROM members WHERE memberID = :memberID');
	$memlist->execute(array(':memberID' => $_SESSION['memberID']));
	$members = array();
	while ( $rows = $memlist->fetch(PDO::FETCH_ASSOC) ) {
		$members[] = array('memberID'=>$rows['memberID'], 'isAdmin'=>$rows['admin'], 'username'=>$rows['username'], 'email'=>$rows['email'], 'isActive'=>$rows['active'], 'isBanned'=>$rows['banned'], 'isReviewer'=>$rows['isReviewer']);
	}

	$meminfolist = $db->prepare('SELECT * FROM member_info WHERE memberID = :memberID');
	$meminfolist->execute(array(':memberID' => $_SESSION['memberID']));
	$meminfo = array();
	while ( $rows = $meminfolist->fetch(PDO::FETCH_ASSOC) ) {
		$meminfo[] = array('memberID'=>$rows['memberID'], 'firstname'=>$rows['firstname'], 'lastname'=>$rows['lastname'], 'city'=>$rows['city'], 'state'=>$rows['state'], 'reel'=>$rows['reel'], 'headshot'=>$rows['headshot'], 'role'=>$rows['role'], 'gender'=>$rows['gender'], 'secondaryrole'=>$rows['secondaryrole'], 'bio'=>$rows['bio'], 'exec_profile'=>$rows['exec_profile'], 'prirolebio'=>$rows['prirolebio'], 'secrolebio'=>$rows['secrolebio'], 'personalsite'=>$rows['personalsite'], 'phone'=>$rows['phone']);
	}

	$postlist = $db->prepare('SELECT * FROM posts WHERE memberID = :memberID');
	$postlist->execute(array(':memberID' => $_SESSION['memberID']));
	$posts = array();
	while ( $rows = $postlist->fetch(PDO::FETCH_ASSOC) ) {
		$posts[] = array('memberID'=>$rows['memberID'], 'title'=>$rows['title'], 'tags'=>$rows['tags'], 'created'=>$rows['created'], 'edited'=>$rows['edited'], 'postid'=>$rows['postid'], 'category'=>$rows['category'], 'sticky'=>$rows['sticky'], 'posttext'=>$rows['posttext']);
	}


	$messageslist = $db->prepare('SELECT * FROM messages WHERE user = :memberID');
	$messageslist->execute(array(':memberID' => $_SESSION['memberID']));
	$messages = array();
	while ( $rows = $messageslist->fetch(PDO::FETCH_ASSOC) ) {
		$messages[] = array('id'=>$rows['id'], 'message'=>$rows['message'], 'senton'=>$rows['senton'], 'mread'=>$rows['mread'], 'page'=>$rows['page'], 'name'=>$rows['name'], 'email'=>$rows['email'], 'user'=>$rows['user']);
	}

	$filmslist = $db->prepare('SELECT * FROM films order by subdate desc');
	$filmslist->execute(array(':memberID' => $_SESSION['memberID']));
	$films = array();
	while ( $rows = $filmslist->fetch(PDO::FETCH_ASSOC) ) {
		$films[] = array("name"=>$rows['name'], "descrip"=>$rows['descrip'], "director"=>$rows['director'], "writer"=>$rows['writer'], "id"=>$rows['id'], "user"=>$rows['user'], "link"=>$rows["link"], "poster"=>$rows["poster"], "studio"=>$rows["studio"], "subdate"=>$rows["subdate"], "tfa_category"=>$rows["tfa_category"], "year"=>$rows["year"], "budget"=>$rows["budget"], "releaseDate"=>$rows["releaseDate"], "cast"=>$rows["cast"], "crew"=>$rows["crew"], "platform"=>$rows["platform"], "wam_prize"=>$rows["wam_prize"]);
	}

	$projectlist = $db->prepare('SELECT * FROM projects WHERE memberID = :memberID');
	$projectlist->execute(array(':memberID' => $_SESSION['memberID']));
	$projects = array();
	while ( $rows = $projectlist->fetch(PDO::FETCH_ASSOC) ) {
		$projects[] = array('id'=>$rows['id'], 'name'=>$rows['name'], 'description'=>$rows['description'], 'director'=>$rows['director'], 'writer'=>$rows['writer'], 'updates'=>$rows['updates'], 'poster'=>$rows['poster'], 'talent'=>$rows['talent'], 'sound'=>$rows['sound'], 'crew'=>$rows['crew'], 'locations'=>$rows['locations'], 'comments'=>$rows['comments'], 'dailies'=>$rows['dailies'], 'shoots'=>$rows['shoots'], 'status'=>$rows['status'], 'memberID'=>$rows['memberID'], 'updated'=>$rows['updated']);
	}

	$homepagelist = $db->prepare('SELECT * FROM homepage order by posted asc');
	$homepagelist->execute();
	$homepage = array();
	while ( $rows = $homepagelist->fetch(PDO::FETCH_ASSOC) ) {
		$homepage[] = array("title"=>$rows['title'], "post"=>$rows['post'], "user"=>$rows['user'], "id"=>$rows['id'], "banner"=>$rows['banner'], "posted"=>$rows["posted"], "external"=>$rows['external'], "byline"=>$rows['byline'], "media"=>$rows['media'], "preLogin"=>$rows['preLogin'], "postLogin"=>$rows['postLogin'], "featured"=>$rows['featured'], "lead"=>$rows['lead']);
	}	

	$filmreviewslist = $db->prepare('SELECT * FROM filmreviews');
	$filmreviewslist->execute();
	$filmreviews = array();
	while ( $rows = $filmreviewslist->fetch(PDO::FETCH_ASSOC) ) {
		$filmreviews[] = array('memberID'=>$rows['memberID'], 'created'=>$rows['created'], 'updated'=>$rows['updated'], 'title'=>$rows['title'], 'review'=>$rows['review']);
	}

	$eventslist = $db->prepare('SELECT * FROM events order by startDate asc');
	$eventslist->execute();
	$events = array();
	while ( $rows = $eventslist->fetch(PDO::FETCH_ASSOC) ) {
		$events[] = array('id'=>$rows['id'], 'user'=>$rows['user'], 'startDate'=>$rows['startDate'], 'endDate'=>$rows['endDate'], 'title'=>$rows['title'], 'details'=>$rows['details'], 'url'=>$rows['url'], 'location'=>$rows['location'], 'meetup'=>$rows['meetup'], 'gmaps'=>$rows['gmaps'], 'photo'=>$rows['photo']);
	}	

	$uploadslist = $db->prepare('SELECT * FROM uploads WHERE memberID = :memberID');
	$uploadslist->execute(array(':memberID' => $_SESSION['memberID']));
	$uploads = array();
	while ( $rows = $uploadslist->fetch(PDO::FETCH_ASSOC) ) {
		$uploads[] = array('id'=>$rows['id'], 'filepath'=>$rows['filepath'], 'filename'=>$rows['filename'], 'category'=>$rows['category']);
	}	

	$commentslist = $db->prepare('SELECT * FROM comments order by commentTime desc');
	$commentslist->execute(array(':memberID' => $_SESSION['memberID']));
	$comments = array();
	while ( $rows = $commentslist->fetch(PDO::FETCH_ASSOC) ) {
		$comments[] = array("memberID"=>$rows['memberID'], "postID"=>$rows["postID"], "approved"=>$rows["approved"], "comment"=>$rows["comment"], id=>$rows["id"], "commentTime"=>$rows["commentTime"], "category"=>$rows["category"], "children"=>$rows["children"], "childOf"=>$rows["childOf"]);
	}	

	$retdata = array();
	$retdata['members'] = $members;
	$retdata['meminfo'] = $meminfo;
	$retdata['messages'] = $messages;
	$retdata['posts'] = $posts;
	$retdata['films'] = $films;
	$retdata['projects'] = $projects;
	$retdata['homepage'] = $homepage;
	$retdata['reviews'] = $filmreviews;
	$retdata['events'] = $events;
	$retdata['uploads'] = $uploads;
	$retdata['comments'] = $comments;
	$retdata['currentMember'] = $_SESSION['memberID'];
	echo json_encode($retdata);	
?>

