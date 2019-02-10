<?php require('../../core/config.php');  
    $retdata = array();
    $meslist = $db->prepare('SELECT * FROM minutes order by dateAdded asc');
    $meslist->execute();
    $minutes = array();
    while ( $rows = $meslist->fetch(PDO::FETCH_ASSOC) ) {
        $minutes[] = array('id'=>$rows['id'], 'memberID'=>$rows['memberID'], 'dateAdded'=>$rows['dateAdded'], 'file'=>$rows['file'], 'dateMet'=>$rows['dateMet'], 'link'=>$rows['link']);
    }
    $retdata[] = $minutes;
    echo json_encode($retdata);
?>