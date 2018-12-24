<?php require('../../core/config.php'); 
    $memberID = $_SESSION['memberID'];
    $comment = $_POST["comment"];
    $category = $_POST["category"];
    $commentTime = $_POST["commentTime"];
    $children = $_POST["children"];
    $childOf = $_POST["childOf"];
    $postID = $_POST["postID"];
    $stmt = $db->prepare('INSERT INTO comments (memberID,comment,category,commentTime,children,childOf,postID) VALUES (:memberID,:comment,:category,:commentTime,:children,:childOf,:postID)');
	$stmt->execute(array(
        ':memberID' => $memberID,
        ':comment' => $comment,
        ':category' => $category,
        ':commentTime' => $commentTime,
        ':children' => $children,
        ':childOf' => $childOf,
        ':postID' => $postID
	));
	echo "Success";
	
?>