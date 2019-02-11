<?php require('../../core/config.php'); 
    $memberID = $_SESSION['memberID'];
    $id = $_POST["id"];
    $updated = $_POST["updated"];
    $title = $_POST["title"];
    $trailer = $_POST["trailer"];
    $director = $_POST["director"];
    $charges = $_POST["charges"];
    $defenses = $_POST["defenses"];
    $summary = $_POST["summary"];
    $closingarguments = $_POST["closingarguments"];
    $stmt = $db->prepare("UPDATE filmreviews SET updated = :updated, title = :title, trailer = :trailer, director = :director, charges = :charges, defenses = :defenses, summary = :summary, closingarguments = :closingarguments WHERE id = :id");
	$stmt->execute(array(
        ':updated' => $updated,
        ':title' => $title,
        ':trailer' => $trailer,
        ':director' => $director,
        ':charges' => $charges,
        ':defenses' => $defenses,
        ':closingarguments' => $closingarguments,
        ':summary' => $summary,
        ':id' => $id
	));
	echo "Success";    	

?>