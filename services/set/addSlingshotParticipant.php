<?php require('../../core/config.php'); 
    $name = $_POST["name"];
    $bio = $_POST["bio"];
    $interests = json_encode($_POST["interests"]);
    $equipment = $_POST["equipment"];
    $stmt = $db->prepare('INSERT INTO slingshot_participants (name,bio,interests,equipment) VALUES (:name,:bio,:interests,:equipment)');
	$stmt->execute(array(
        ':name' => $name,
        ':bio' => $bio,
        ':interests' => $interests,
        ':equipment' => $equipment
	));
	echo "Success";
?>