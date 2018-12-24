<?php require('../../core/config.php');  
	$memberID = $_SESSION["memberID"];
	$uploadslist = $db->prepare('SELECT * FROM uploads WHERE memberID = :memberID');
	$uploadslist->execute(array(':memberID' => $_SESSION['memberID']));
	$uploads = array();
	while ( $rows = $uploadslist->fetch(PDO::FETCH_ASSOC) ) {
		$uploads[] = array('id'=>$rows['id'], 'filepath'=>$rows['filepath'], 'filename'=>$rows['filename'], 'category'=>$rows['category']);
	}
	echo json_encode($uploads);
?>