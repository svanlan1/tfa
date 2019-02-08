<?php require('../../core/config.php'); 
    $memberID = $_SESSION['memberID'];
    $dateMet = $_POST["dateMet"];
    $link = $_POST["link"];
    $file = $_POST["file"];
    $stmt = $db->prepare('INSERT INTO minutes (memberID,dateMet,file,link) VALUES (:memberID,:dateMet,:file,:link)');
	$stmt->execute(array(
        ':memberID' => $memberID,
        ':dateMet' => $dateMet,
        ':file' => $file,
        ':link' => $link
	));
	echo "Success";
?>