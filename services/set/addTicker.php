<?php require('../../core/config.php'); 
    $memberID = $_SESSION['memberID'];
    $text = $_POST["text"];
    $dateAdded = $_POST["dateAdded"];
    $stmt = $db->prepare('INSERT INTO ticker (memberID,dateAdded,text) VALUES (:memberID,:dateAdded,:text)');
	$stmt->execute(array(
        ':memberID' => $memberID,
        ':text' => $text,
        ':dateAdded' => $dateAdded
	));
	echo "Success";
?>