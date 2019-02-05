<?php require('../../core/config.php'); 
    $user = $_POST["user"];
	$name = $_POST["name"];
	$message = $_POST["message"];
	$email = $_POST["email"];
	$page = $_POST["page"];
	$senton = $_POST["senton"];
    $stmt = $db->prepare('INSERT INTO messages (user,name,message,email,page,senton) VALUES (:user,:name,:message,:email,:page,:senton)');
	$stmt->execute(array(
		':user' => $user,
		':name' => $name,
		':message' => $message,
		':email' => $email,
		':page' => $page,
		':senton' => $senton
	));
	echo "Success";
	
?>