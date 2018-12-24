<?php require('../../core/config.php');  
	$memberID = $_SESSION["memberID"];
	$reviewsstmt = $db->prepare('SELECT * FROM filmreviews WHERE memberID = :memberID');
	$reviewsstmt->execute(array(':memberID' => $_SESSION['memberID']));
	$reviews = array();
	while ( $rows = $reviewsstmt->fetch(PDO::FETCH_ASSOC) ) {
		$reviews[] = array('id'=>$rows['id'], 'created'=>$rows['created'], 'updated'=>$rows['updated'], 'title'=>$rows['title'], 'review'=>$rows['review']);
	}
	echo json_encode($reviews);
?>