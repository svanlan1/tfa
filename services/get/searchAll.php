<?php require('../../core/config.php');  

	$search = $_POST['search'];
	$memlist = $db->prepare("SELECT * FROM members WHERE lower(username) LIKE '%$search%' OR lower(email) LIKE '%$search%'");
	$memlist->execute();
	$members = array();
	while ( $rows = $memlist->fetch(PDO::FETCH_ASSOC) ) {
		$members[] = array('memberID'=>$rows['memberID'], 'isAdmin'=>$rows['admin'], 'username'=>$rows['username'], 'email'=>$rows['email'], 'isActive'=>$rows['active'], 'isBanned'=>$rows['banned']);
	}

	// $meminfolist = $db->prepare('SELECT * FROM member_info');
	$meminfolist = $db->prepare("SELECT * FROM member_info WHERE lower(firstname) LIKE '%$search%' OR lower(lastname) LIKE '%$search%' OR lower(bio) LIKE '%$search' OR lower(role) LIKE '%$search' OR lower(secondaryrole) LIKE '%$search'");
	$meminfolist->execute();
	$meminfo = array();
	while ( $rows = $meminfolist->fetch(PDO::FETCH_ASSOC) ) {
		$meminfo[] = array('memberID'=>$rows['memberID'], 'firstname'=>$rows['firstname'], 'lastname'=>$rows['lastname'], 'city'=>$rows['city'], 'state'=>$rows['state'], 'reel'=>$rows['reel'], 'headshot'=>$rows['headshot'], 'role'=>$rows['role'], 'gender'=>$rows['gender'], 'secondaryrole'=>$rows['secondaryrole'], 'bio'=>$rows['bio'], 'exec_profile'=>$rows['exec_profile'], 'prirolebio'=>$rows['prirolebio'], 'secrolebio'=>$rows['secrolebio'], 'personalsite'=>$rows['personalsite'], 'phone'=>$rows['phone']);
	}	

	$retdata = array();
	$retdata[] = $members;
	$retdata[] = $meminfo;
	$retdata[] = $search;
	echo json_encode($retdata);
?>