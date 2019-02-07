<?php require('../../core/config.php');  
    $retdata = array();
    $meslist = $db->prepare('SELECT * FROM ticker order by dateAdded asc');
    $meslist->execute();
    $tickers = array();
    while ( $rows = $meslist->fetch(PDO::FETCH_ASSOC) ) {
        $tickers[] = array('id'=>$rows['id'], 'memberID'=>$rows['memberID'], 'dateAdded'=>$rows['dateAdded'], 'text'=>$rows['text'], 'dateUpdated'=>$rows['dateUpdated']);
    }
    $retdata['tickers'] = $tickers;
    echo json_encode($retdata);
?>