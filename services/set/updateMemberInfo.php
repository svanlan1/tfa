<?php require('../../core/config.php');
    $memberID = $_SESSION["memberID"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $city = $_POST["city"];
    $role = $_POST["role"];
    $secondaryrole = $_POST["secondaryrole"];
    $phone = $_POST["phone"];
    $bio = $_POST["bio"];
    $reel = $_POST["reel"];
    $personalsite = $_POST["personalsite"];
    $prirolebio = $_POST["prirolebio"];
    $secrolebio = $_POST["secrolebio"];
    $exec_profile = $_POST["exec_profile"];
    $stmt = $db->prepare("UPDATE member_info SET firstname = :firstname, lastname = :lastname, city = :city, role = :role, secondaryrole = :secondaryrole, bio = :bio, prirolebio = :prirolebio, secrolebio = :secrolebio, phone = :phone, reel = :reel, personalsite = :personalsite, exec_profile = :exec_profile WHERE memberID = :memberID");	
	$stmt->execute(array(
		':firstname'=>$firstname,
		':lastname'=>$lastname,
		':city'=>$city,
		':role'=>$role,
		':secondaryrole'=>$secondaryrole,
		':phone'=>$phone,
		':bio'=>$bio,
		':reel'=>$reel,
		':personalsite'=>$personalsite,
		':exec_profile'=>$exec_profile,
		':prirolebio'=>$prirolebio,
		':secrolebio'=>$secrolebio,
		':memberID'=>$memberID
	));
	echo "Success";
?>