<?php require('../../core/config.php');  

	// $memberID = $_SESSION["memberID"];

	
	$memlist = $db->prepare('SELECT * FROM members WHERE admin = "Y"');
	$memlist->execute();
	$members = array();
	while ( $rows = $memlist->fetch(PDO::FETCH_ASSOC) ) {
		$members[] = array('memberID'=>$rows['memberID'], 'isAdmin'=>$rows['admin'], 'username'=>$rows['username'], 'email'=>$rows['email'], 'isActive'=>$rows['active'], 'isBanned'=>$rows['banned']);
	}

    $minlist = $db->prepare('SELECT * FROM minutes order by dateAdded asc');
    $minlist->execute();
    $minutes = array();
    while ( $rows = $minlist->fetch(PDO::FETCH_ASSOC) ) {
        $minutes[] = array('id'=>$rows['id'], 'memberID'=>$rows['memberID'], 'dateAdded'=>$rows['dateAdded'], 'file'=>$rows['file'], 'dateMet'=>$rows['dateMet'], 'link'=>$rows['link']);
    }	

	$retdata['members'] = $members;
	$retdata['minutes'] = $minutes;
    echo json_encode($retdata);
?>