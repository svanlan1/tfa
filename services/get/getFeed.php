<?php require('../../core/config.php');  
	$resource = $db->prepare('SELECT * FROM posts order by created desc');
	$resource->execute();
	$postsarr = array();
	while ( $rows = $resource->fetch(PDO::FETCH_ASSOC) ) {
		$postsarr[] = array('memberID'=>$rows['memberID'], 'created'=>$rows['created'], 'postid'=>$rows['postid'], 'favcount'=>$rows['favcount'], 'posttext'=>$rows['posttext']);
	}
	echo json_encode($postsarr);
?>