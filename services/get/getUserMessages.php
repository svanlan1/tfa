<?php require('../../core/config.php');  
	$memberID = $_SESSION["memberID"];
	$msglist = $db->prepare('SELECT * FROM member_messages WHERE sentTo = :memberID order by senton desc');
	$msglist->execute(array(':memberID' => $_SESSION['memberID']));
	$messages = array();
	while ( $rows = $msglist->fetch(PDO::FETCH_ASSOC) ) {
		$messages[] = array('id'=>$rows['id'], 'memberID'=>$rows['memberID'], 'sentTo'=>$rows['sentTo'], 'senton'=>$rows['senton'], 'messagetext'=>$rows['messagetext'], 'fromread'=>$rows['fromread'], 'toread'=>$rows['toread']);
    }

	$sentlist = $db->prepare('SELECT * FROM member_messages WHERE memberID = :memberID order by senton desc');
	$sentlist->execute(array(':memberID' => $_SESSION['memberID']));
	$sentmessages = array();
	while ( $rows = $sentlist->fetch(PDO::FETCH_ASSOC) ) {
		$sentmessages[] = array('id'=>$rows['id'], 'memberID'=>$rows['memberID'], 'sentTo'=>$rows['sentTo'], 'senton'=>$rows['senton'], 'messagetext'=>$rows['messagetext'], 'fromread'=>$rows['fromread'], 'toread'=>$rows['toread']);
    }    
    
    $msg = array();
    $msg['received'] = $messages;
    $msg['sent'] = $sentmessages;
	echo json_encode($msg);
?>