<?php require('../../core/config.php'); 
    if($_SESSION['memberID']) {
        $memberID = $_SESSION['memberID'];
    } else {
        $memberID = "0";
    }
    
    $pagev = $_POST["pagev"];
    $urlv = $_POST["urlv"];
    $moreinfo = $_POST["moreinfo"];
    $stmt = $db->prepare('INSERT INTO counter (memberID,pagev,urlv,moreinfo) VALUES (:memberID,:pagev,:urlv,:moreinfo)');
	$stmt->execute(array(
        ':memberID' => $memberID,
        ':pagev' => $pagev,
        ':urlv' => $urlv,
        ':moreinfo' => $moreinfo
	));
	echo $memberID;
?>