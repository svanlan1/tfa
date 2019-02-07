<?php require('../../core/config.php'); 
    $memberID = $_SESSION['memberID'];
    $sentTo = $_POST["sentTo"];
    $message = $_POST["message"];
    $replies = $_POST["replies"];
    $sent = $_POST["sent"];
    $stmt = $db->prepare('INSERT INTO member_messages (memberID,sentTo,messagetext,replies,senton) VALUES (:memberID,:sentTo,:messagetext,:replies,:senton)');
	$stmt->execute(array(
        ':memberID' => $memberID,
        ':sentTo' => $sentTo,
        ':messagetext' => $message,
        ':replies' => $replies,
        ':senton' => $sent
	));
	echo "Success";
?>