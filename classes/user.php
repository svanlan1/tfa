<?php
include('password.php');
class User extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();

    	$this->_db = $db;
    }

	private function get_user_hash($username){

		try {
			$stmt = $this->_db->prepare('SELECT password, username, admin, memberID, email FROM members WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function isValidUsername($username){
		if (strlen($username) < 3) return false;
		if (strlen($username) > 17) return false;
		if (!ctype_alnum($username)) return false;
		return true;
	}

	public function isValidField($field) {		
		$mystring = $field;
		$findme   = '<';
		$findmetwo = '>';
		$pos = strpos($mystring, $findme);
		$postwo = strpos($mystring, $findmetwo);

		// The !== operator can also be used.  Using != would not work as expected
		// because the position of 'a' is 0. The statement (0 != false) evaluates 
		// to false.
		if ($pos !== false) {
			return false;
		} else if ($postwo !== false) { 
			return false;
		} else {
		     return true;
		}
	}
	public function formatDate($date) {
		$datestr = explode("-", $date);
		$mon = $datestr[0];
		$day = $datestr[1];
		$yr = $datestr[2];
		//echo $mon[0];
		if($mon[0] === "0") {
			$mon = $mon[1];
		}

		$timestr = explode(" ", $date);
		$hr = $timestr[0];
		$min = $timestr[1];
		$sec = $timestr[2];

		$timestr = $mon . "/" . $day . "/" . $yr . " - " . $hr . ":" . $min;
		return $timestr;
	}

	public function login($username,$password){
		if (!$this->isValidUsername($username)) return false;
		if (strlen($password) < 3) return false;

		$row = $this->get_user_hash($username);

		if($this->password_verify($password,$row['password']) == 1){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['username'] = $row['username'];
		    $_SESSION['memberID'] = $row['memberID'];
		    $_SESSION['email'] = $row['email'];
		    $_SESSION['admin'] = $row['admin'];
		    $_SESSION['row'] = $row;
		    return true;
		}
	}

	public function isAdmin($admin) {
		if($admin === 'Y') {
			return true;
		} else {
			return false;
		}
	}	

	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}


?>
