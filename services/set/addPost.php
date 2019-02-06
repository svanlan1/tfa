<?php require('../../core/config.php'); 
    $memberID = $_SESSION['memberID'];
    $created = date("Y-m-d H:i:s");
    $posttext = $_POST["posttext"];
    $favcount = $_POST["favcount"];
    $stmt = $db->prepare('INSERT INTO posts (memberID,created,posttext,favcount) VALUES (:memberID,:created,:posttext,:favcount)');
	$stmt->execute(array(
        ':memberID' => $memberID,
        ':created' => $created,
        ':posttext' => $posttext,
        ':favcount' => $favcount
	));
	echo "Success";
?>