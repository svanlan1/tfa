<?php require('../../core/config.php');  
	$filmslist = $db->prepare('SELECT * FROM films order by subdate desc');
	$filmslist->execute();
	$films = array();
	while ( $rows = $filmslist->fetch(PDO::FETCH_ASSOC) ) {
		$films[] = array("name"=>$rows['name'], "descrip"=>$rows['descrip'], "director"=>$rows['director'], "writer"=>$rows['writer'], "id"=>$rows['id'], "user"=>$rows['user'], "link"=>$rows["link"], "poster"=>$rows["poster"], "studio"=>$rows["studio"], "subdate"=>$rows["subdate"], "tfa_category"=>$rows["tfa_category"], "year"=>$rows["year"], "budget"=>$rows["budget"], "releaseDate"=>$rows["releaseDate"], "cast"=>$rows["cast"], "crew"=>$rows["crew"], "platform"=>$rows["platform"], "wam_prize"=>$rows["wam_prize"]);
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

	$eventslist = $db->prepare('SELECT * FROM events order by startDate desc');
	$eventslist->execute();
	$events = array();
	while ( $rows = $eventslist->fetch(PDO::FETCH_ASSOC) ) {
		$events[] = array('id'=>$rows['id'], 'user'=>$rows['user'], 'startDate'=>$rows['startDate'], 'endDate'=>$rows['endDate'], 'title'=>$rows['title'], 'details'=>$rows['details'], 'url'=>$rows['url'], 'location'=>$rows['location'], 'meetup'=>$rows['meetup'], 'gmaps'=>$rows['gmaps'], 'photo'=>$rows['photo']);
	}

	$tickerlist = $db->prepare('SELECT * FROM ticker WHERE current = "Y"');
	$tickerlist->execute();
	$ticker = array();
	while ( $rows = $tickerlist->fetch(PDO::FETCH_ASSOC) ) {
		$ticker[] = array('id'=>$rows['id'], 'text'=>$rows['text']);
	}	

	$commentslist = $db->prepare('SELECT * FROM comments order by commentTime desc');
	$commentslist->execute();    
	$comments = array();
	while ( $rows = $commentslist->fetch(PDO::FETCH_ASSOC) ) {
		$comments[] = array("memberID"=>$rows['memberID'], "postID"=>$rows["postID"], "approved"=>$rows["approved"], "comment"=>$rows["comment"], id=>$rows["id"], "commentTime"=>$rows["commentTime"], "category"=>$rows["category"], "children"=>$rows["children"], "childOf"=>$rows["childOf"]);
	}		

	$retdata = array();
	$retdata['films'] = $films;
	$retdata['homepage'] = $homepage;
	$retdata['reviews'] = $filmreviews;
	$retdata['events'] = $events;
	$retdata['ticker'] = $ticker;
	$retdata['comments'] = $comments;
	echo json_encode($retdata);	
?>

