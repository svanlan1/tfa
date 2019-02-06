<?php require('../../core/config.php'); 
	$featured = $_POST['featured'];
	$stmt = $db->prepare("UPDATE homepage SET featured = :featured"); 
	$stmt->execute(array(
	    ':featured' => $featured
	));
	$ret = array();
	$ret['msg'] = "Success";
	echo json_encode($ret);
?>