<?php require('../../core/config.php'); 
	$user = $_SESSION['memberID'];
	$profilepic = $_POST['profilepic'];
	$stmt = $db->prepare("UPDATE member_info SET headshot = :headshot WHERE memberID = :memberID"); 
	$stmt->execute(array(
	    ':headshot' => $profilepic,
	    ':memberID' => $user
	));
	echo "Success";
?>