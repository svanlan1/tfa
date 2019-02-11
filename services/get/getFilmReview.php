<?php require('../../core/config.php');  
	$memberID = $_SESSION["memberID"];
    $id = $_GET["id"];
	$reviewsstmt = $db->prepare('SELECT * FROM filmreviews WHERE id = :id');
	$reviewsstmt->execute(array(':id' => $id));
	$reviews = array();
	while ( $rows = $reviewsstmt->fetch(PDO::FETCH_ASSOC) ) {
		$reviews[] = array('id'=>$rows['id'], 'memberID'=>$rows['memberID'], 'created'=>$rows['created'], 'updated'=>$rows['updated'], 'title'=>$rows['title'], 'trailer'=>$rows['trailer'], 'director'=>$rows['director'],'charges'=>$rows['charges'], 'defenses'=>$rows['defenses'], 'image'=>$rows['image'], 'closingarguments'=>$rows['closingarguments'], 'summary'=>$rows['summary']);
	}
	echo json_encode($reviews);
?>