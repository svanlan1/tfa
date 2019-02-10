<?php require('../../core/config.php'); 
    $user = $_SESSION['memberID'];
    $details = $_POST["details"];
    $endDate = $_POST["endDate"];
    $gmaps = $_POST["gmaps"];
    $location = $_POST["location"];
    $meetup = $_POST["meetup"];
    $photo = $_POST["photo"];
    $startDate = $_POST["startDate"];
    $title = $_POST["title"];
    $url = $_POST["url"];
    $stmt = $db->prepare('INSERT INTO events (user,details,endDate,gmaps,location,meetup,photo,startDate,title,url) VALUES (:user,:details,:endDate,:gmaps,:location,:meetup,:photo,:startDate,:title,:url)');
	$stmt->execute(array(
        ':user' => $user,
        ':details' => $details,
        ':endDate' => $endDate,
        ':gmaps' => $gmaps,
        ':location' => $location,
        ':meetup' => $meetup,
        ':photo' => $photo,
        ':startDate' => $startDate,
        ':title' => $title,
        ':url' => $url
	));
	echo "Success";
?>