<?php require('../../core/config.php');  
    $storyID = $_GET['storyID'];
    $category = $_GET['category'];
	$homepagelist = $db->prepare('SELECT * FROM homepage WHERE id = :storyID');
	$homepagelist->execute(array(':storyID' => $storyID));    
	$homepage = array();
	while ( $rows = $homepagelist->fetch(PDO::FETCH_ASSOC) ) {
		$homepage[] = array("title"=>$rows['title'], "post"=>$rows['post'], "user"=>$rows['user'], "id"=>$rows['id'], "banner"=>$rows['banner'], "posted"=>$rows["posted"], "external"=>$rows['external'], "byline"=>$rows['byline'], "media"=>$rows['media'], "preLogin"=>$rows['preLogin'], "postLogin"=>$rows['postLogin'], "featured"=>$rows['featured'], "lead"=>$rows['lead']);
	}
	
	$commentslist = $db->prepare('SELECT * FROM comments WHERE postID = :storyID AND category = "homepage" order by commentTime desc');
	$commentslist->execute(array(':storyID' => $storyID));    
	$comments = array();
	while ( $rows = $commentslist->fetch(PDO::FETCH_ASSOC) ) {
		$comments[] = array("memberID"=>$rows['memberID'], "postID"=>$rows["postID"], "approved"=>$rows["approved"], "comment"=>$rows["comment"], id=>$rows["id"], "commentTime"=>$rows["commentTime"], "category"=>$rows["category"], "children"=>$rows["children"], "childOf"=>$rows["childOf"]);
	}	
	$retdata = array();
	$retdata['homepage'] = $homepage;
	$retdata['comments'] = $comments;
	echo json_encode($retdata);	
?>

