<?php require('../../core/config.php');  
    $retdata = array();
    $meslist = $db->prepare('SELECT * FROM messages');
    $meslist->execute();
    $messages = array();
    while ( $rows = $meslist->fetch(PDO::FETCH_ASSOC) ) {
        $messages[] = array('id'=>$rows['id'], 'name'=>$rows['name'], 'message'=>$rows['message'], 'user'=>$rows['user'], 'email'=>$rows['email'], 'mread'=>$rows['mread'], 'page'=>$rows['page'], 'senton'=>$rows['senton']);
    }
    $retdata['messages'] = $messages;
    echo json_encode($retdata);
?>