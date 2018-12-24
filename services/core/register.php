<?php 
    require('../../core/config.php');
    //if(isset($_POST['submit'])){

        //if (!isset($_POST['username'])) $error[] = "Please fill out all fields";
        //if (!isset($_POST['email'])) $error[] = "Please fill out all fields";
        //if (!isset($_POST['password'])) $error[] = "Please fill out all fields";

        $username = $_POST['username'];
        $retdata = array();
        //very basic validation
        if(!$user->isValidUsername($username)){
            $error[] = 'Usernames must be at least 3 Alphanumeric characters';
            $retdata[] = array('Error'=>"Usernames must be at least 3 Alphanumeric characters");
            echo json_encode($retdata);
        } else {
            $stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
            $stmt->execute(array(':username' => $username));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!empty($row['username'])){
                $error[] = 'Username provided is already in use.';
                $retdata[] = array('Error'=>"Username provided is already in use.");
                echo json_encode($retdata);                
            }

        }

        if(strlen($_POST['password']) < 3){
            $error[] = 'Password is too short.';
            $retdata[] = array('Error'=>"Password is too short");
            echo json_encode($retdata);              
        }

        if(strlen($_POST['passwordConfirm']) < 3){
            $error[] = 'Confirm password is too short.';
            $retdata[] = array('Error'=>"Confirm password is too short.");
            echo json_encode($retdata);                  
        }

        if($_POST['password'] != $_POST['passwordConfirm']){
            $error[] = 'Passwords do not match.';
            $retdata[] = array('Error'=>"Passwords do not match.");
            echo json_encode($retdata);              
        }

        //email validation
        $email = htmlspecialchars_decode($_POST['email'], ENT_QUOTES);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error[] = 'Please enter a valid email address';
        } else {
            $stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
            $stmt->execute(array(':email' => $email));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!empty($row['email'])){
                $error[] = 'Email provided is already in use.';
                $retdata[] = array('Error'=>"Email provided is already in use.");
                echo json_encode($retdata);                  
            }

        }


        //if no errors have been created carry on
        if(!isset($error)){

            //hash the password
            $hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

            //create the activasion code
            $activasion = md5(uniqid(rand(),true));

            try {

                //insert into database with a prepared statement
                $stmt = $db->prepare('INSERT INTO members (username,password,email,active) VALUES (:username, :password, :email, :active)');
                $stmt->execute(array(
                    ':username' => $username,
                    ':password' => $hashedpassword,
                    ':email' => $email,
                    ':active' => $activasion
                ));
                $id = $db->lastInsertId('memberID');

                //send email
                $to = $_POST['email'];
                $subject = "Registration Confirmation";
                $body = "<p>Thank you for registering  for an account with the Tacoma Film Alliance.</p>
                <p>To activate your account, please click on this link: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
                <p>Thanks!</p>";

                $mail = new Mail();
                $mail->setFrom(SITEEMAIL);
                $mail->addAddress($to);
                $mail->subject($subject);
                $mail->body($body);
                $mail->send();

                //redirect to index page
                //header('Location: index.php?action=joined');
                $retdata[] = array('Success'=>"You have successfully joined.  Be on the lookout for the confirmation email.");
                echo json_encode($retdata); 
                exit;

            //else catch the exception and show the error.
            } catch(PDOException $e) {
                $error[] = $e->getMessage();
            }

        }

    //}
?>