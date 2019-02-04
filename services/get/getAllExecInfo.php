<?php require('../../core/config.php');  

	// $memberID = $_SESSION["memberID"];

	
	$memlist = $db->prepare('SELECT * FROM members WHERE admin = "Y"');
	$memlist->execute();
	$members = array();
	while ( $rows = $memlist->fetch(PDO::FETCH_ASSOC) ) {
		$members[] = array('memberID'=>$rows['memberID'], 'isAdmin'=>$rows['admin'], 'username'=>$rows['username'], 'email'=>$rows['email'], 'isActive'=>$rows['active'], 'isBanned'=>$rows['banned']);
	}

    $retdata['members'] = $members;
    echo json_encode($retdata);
?>