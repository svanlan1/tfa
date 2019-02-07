<?php require('../../core/config.php'); 
    $memberID = $_SESSION['memberID'];
    $name = $_POST["name"];
    $descrip = $_POST["descrip"];
    $subdate = $_POST["subdate"];
    $comments = $_POST["comments"];
    $link = $_POST["link"];
    $director = $_POST["director"];
    $writer = $_POST["writer"];
    $poster = $_POST["poster"];
    $studio = $_POST["studio"];
    $year = $_POST["year"];
    $budget = $_POST["budget"];
    $releaseDate = $_POST["releaseDate"];
    $cast = $_POST["cast"];
    $crew = $_POST["crew"];
    $platform = $_POST["platform"];
    $tfa_category = $_POST["tfa_category"];
    $wam_prize = $_POST["wam_prize"];
    $owner = $_POST["owner"];

    $stmt = $db->prepare('INSERT INTO films (name,descrip,subdate,comments,link,director,writer,poster,user,studio,year,budget,releaseDate,cast,crew,platform,tfa_category,wam_prize,owner) VALUES (:name,:descrip,:subdate,:comments,:link,:director,:writer,:poster,:user,:studio,:year,:budget,:releaseDate,:cast,:crew,:platform,:tfa_category,:wam_prize,:owner)');
	$stmt->execute(array(
		':name' => $name,
		':descrip' => $descrip,
		':subdate' => $subdate,
		':comments' => $comments,
		':link' => $link,
        ':director' => $director,
        ':writer' => $writer,
        ':poster' => $poster,
        ':studio' => $studio,
		':user' => $memberID,
        ':year' => $year,
        ':budget' => $budget,
        ':releaseDate' => $releaseDate,
        ':cast' => $cast,
        ':crew' => $crew,
        ':platform' => $platform,
        ':tfa_category' => $tfa_category,
        ':wam_prize' => $wam_prize,
        ':owner' => $owner
	));
	echo "Success";
	
?>