<?php require('../../core/config.php');  

	$memberID = $_POST['id'];

	
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
		$films[] = array("name"=>$rows['name'], "descrip"=>$rows['descrip'], "director"=>$rows['director'], "writer"=>$rows['writer'], "id"=>$rows['id'], "user"=>$rows['user'], "link"=>$rows["link"], "poster"=>$rows["poster"], "studio"=>$rows["studio"], "subdate"=>$rows["subdate"]);
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
		$homepage[] = array('id'=>$rows['id'], 'title'=>$rows['title'], 'post'=>$rows['post'], 'banner'=>$rows['banner'], 'posted'=>$rows['posted'], 'link'=>$rows['link'], 'user'=>$rows['user']);
	}

	$uploadslist = $db->prepare('SELECT * FROM uploads WHERE memberID = :memberID');
	$uploadslist->execute(array(':memberID' => $_SESSION['memberID']));
	$uploads = array();
	while ( $rows = $uploadslist->fetch(PDO::FETCH_ASSOC) ) {
		$uploads[] = array('id'=>$rows['id'], 'filepath'=>$rows['filepath'], 'filename'=>$rows['filename'], 'category'=>$rows['category'], 'title'=>$rows['title']);
	}

	$retdata = array();
	$retdata[] = $members;
	$retdata[] = $meminfo;
	$retdata[] = $messages;
	$retdata[] = $posts;
	$retdata[] = $films;
	$retdata[] = $projects;
	$retdata[] = $homepage;
	$retdata[] = $uploads;
	echo json_encode($retdata);	
?>

