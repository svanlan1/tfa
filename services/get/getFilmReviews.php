<?php require('../../core/config.php');  
	$memberID = $_SESSION["memberID"];
	$reviewsstmt = $db->prepare('SELECT * FROM filmreviews');
	$reviewsstmt->execute();
	$reviews = array();
	while ( $rows = $reviewsstmt->fetch(PDO::FETCH_ASSOC) ) {
		$reviews[] = array('id'=>$rows['id'], 'memberID'=>$rows['memberID'], 'created'=>$rows['created'], 'updated'=>$rows['updated'], 'title'=>$rows['title'], 'trailer'=>$rows['trailer'], 'director'=>$rows['director'],'charges'=>$rows['charges'], 'defenses'=>$rows['defenses'], 'image'=>$rows['image'], 'closingarguments'=>$rows['closingarguments']);
	}
	echo json_encode($reviews);
?>