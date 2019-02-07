<?php require('../../core/config.php');
    $memberID = $_SESSION["memberID"];
    $firstname = $_POST["firstname"];
    $id = $_POST["id"];
    $toread = $_POST["toread"];
    $stmt = $db->prepare("UPDATE member_messages SET toread = :toread WHERE id = :id");	
	$stmt->execute(array(
		':id'=>$id,
		':toread'=>$toread
	));
	echo "Success";
?>