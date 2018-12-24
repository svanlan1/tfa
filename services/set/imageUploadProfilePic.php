<?php require('../../core/config.php');  

    $temp = explode(".", $_FILES["file"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"] . $newfilename);
    $category = $_POST["category"];

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            echo json_encode(array('File'=>'File is an image'));
            $uploadOk = 1;
        } else {
            // echo "File is not an image.";
            // echo json_encode(array('Error'=>'File is not an image'));
            echo json_encode(array('Error'=>'File is not an image', 'longDesc'=>'Sorry, you can only upload images at this time.'));
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        // echo "Sorry, file already exists.";
        // echo json_encode(array('Error'=>'File already exists'));
        echo json_encode(array('Error'=>'File already exists', 'longDesc'=>'This file already exists on our server.  Not sure how that happened, but try again.'));
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        // echo "Sorry, your file is too large.";
        echo json_encode(array('Error'=>'File is too large', 'longDesc'=>'Files must be under 500kb.  This is a restriction that may be lifted once we get out of our beta phase.  Please reduce the filesize of your image, or choose another.'));
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        // echo json_encode(array('Error'=>'Sorry, only JPG, JPEG, PNG & GIF files are allowed'));
        echo json_encode(array('Error'=>'Wrong filetype', 'longDesc'=>'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'));
        // echo $imageFileType;
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
        //echo json_encode($temp);
    // if everything is ok, try to upload file
    } else {   
        $filename = $newfilename;  
        $filepath = $_SERVER['DOCUMENT_ROOT'] . "/sandbox/uploads/"; 
        if (move_uploaded_file($_FILES['file']['tmp_name'], $filepath . $filename)) {
            $user = $_SESSION['memberID'];
            $stmt = $db->prepare('INSERT INTO uploads (filepath,memberID,filename,category) VALUES (:filepath,:memberID,:filename,:category)');
            $stmt->execute(array(
                ':memberID' => $user,
                ':filepath' => $filepath,
                ':filename' => $filename,
                ':category' => $category
            )); 
		    $profilepic = $filename;
		    $stmt = $db->prepare("UPDATE member_info SET headshot = :headshot WHERE memberID = :memberID"); 
		    $stmt->execute(array(
		        ':headshot' => $profilepic,
		        ':memberID' => $user
		    ));
            echo $filename;
        } else {
            // echo $filepath . $filename . ", something was stupid though and didn't work.";
            echo json_encode(array('Error'=>'NoGo', 'longDesc'=>'Something fucked up.  Not sure what.'));
        }
    }
?>