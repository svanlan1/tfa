<?php require('../../core/config.php'); 
    $user = $_SESSION['memberID'];
	$title = $_POST["title"];
	$post = $_POST["post"];
	$banner = $_POST["banner"];
	$posted = $_POST["posted"];
	$media = $_POST["media"];
	$postLogin = $_POST["postLogin"];
	$preLogin = $_POST["preLogin"];
	$featured = $_POST["featured"];
	$byline = $_POST["byline"];
	$lead = $_POST["lead"];
    $stmt = $db->prepare('INSERT INTO homepage (title,user,post,banner,posted,media,postLogin,preLogin,featured,byline,lead) VALUES (:title,:user,:post,:banner,:posted,:media,:postLogin,:preLogin,:featured,:byline,:lead)');
	$stmt->execute(array(
		':title' => $title,
		':user' => $user,
		':post' => $post,
		':banner' => $banner,
		':posted' => $posted,
		':media' => $media,
		':postLogin' => $postLogin,
		':preLogin' => $preLogin,
		':featured' => $featured,
		':byline' => $byline,
		':lead' => $lead
	));
	echo "Success";
	
?>