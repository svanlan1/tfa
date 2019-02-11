<?php require('../../core/config.php'); 
    $memberID = $_SESSION['memberID'];
    $created = date("Y-m-d H:i:s");
    $updated = $_POST["updated"];
    $title = $_POST["title"];
    $trailer = $_POST["trailer"];
    $director = $_POST["director"];
    $charges = $_POST["charges"];
    $defenses = $_POST["defenses"];
    $image = $_POST["image"];
    $closingarguments = $_POST["closingarguments"];
    $stmt = $db->prepare('INSERT INTO filmreviews (memberID,created,updated,title,trailer,director,charges,defenses,image,closingarguments) VALUES (:memberID,:created,:updated,:title,:trailer,:director,:charges,:defenses,:image,:closingarguments)');
	$stmt->execute(array(
        ':memberID' => $memberID,
        ':created' => $created,
        ':updated' => $updated,
        ':title' => $title,
        ':trailer' => $trailer,
        ':director' => $director,
        ':charges' => $charges,
        ':defenses' => $defenses,
        ':image' => $image,
        ':closingarguments' => $closingarguments
	));
	echo "Success";
?>