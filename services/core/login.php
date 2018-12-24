<?php require('../../core/config.php');
	if (!isset($_POST['username'])) $error[] = "Please fill out all fields";
	if (!isset($_POST['password'])) $error[] = "Please fill out all fields";

	$username = $_POST['username'];
	if ( $user->isValidUsername($username)){
		if (!isset($_POST['password'])){
			$error[] = 'A password must be entered';
		}
		$password = $_POST['password'];

		if($user->login($username,$password)){
			$_SESSION['username'] = $username;
			//header('Location: home.php');
			$obj = (object) array('result' => 'success', 'username' => $username);
			echo json_encode($obj);
			exit;

		} else {
			$error[] = 'Wrong username or password or your account has not been activated.';
			echo json_encode($error);
		}
	}else{
		$error[] = 'Usernames are required to be Alphanumeric, and between 3-16 characters long';
		echo json_encode($error);
	}

?>