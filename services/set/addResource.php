<?php require('../../core/config.php'); 
    $memberID = $_SESSION['memberID'];
	$type = $_POST["type"];
	$name = $_POST["name"];
	$description = $_POST["description"];
	$photos = $_POST["photos"];
	$dateAdded = $_POST["dateAdded"];
	$plainname = $_POST["plainname"];
    $stmt = $db->prepare('INSERT INTO resources (type,name,description,photos,dateAdded,plainname,memberID) VALUES (:type,:name,:description,:photos,:dateAdded,:plainname,:memberID)');
	$stmt->execute(array(
		':type' => $type,
		':name' => $name,
		':description' => $description,
		':photos' => $photos,
		':dateAdded' => $dateAdded,
		':plainname' => $plainname,
		':memberID' => $memberID
	));
	echo "Success";
	
?>