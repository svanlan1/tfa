<?php require('../../core/config.php');  

    $temp = explode(".", $_FILES["file"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $target_dir = "/uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"] . $newfilename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $category = $_POST["category"];
    $title = $_POST["title"];

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo json_encode(array('Error'=>'File is not a script', 'longDesc'=>'Sorry, this does not appear to be a script.'));
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        echo json_encode(array('Error'=>'File already exists', 'longDesc'=>'This file already exists on our server.  Not sure how that happened, but try again.'));
        $uploadOk = 0;
    }

    if ($_FILES["file"]["size"] > 1000000) {
        echo json_encode(array('Error'=>'Too large', 'longDesc'=>'Sorry, your file is too large.  Scripts must be under 1 MB in file size.  Please reduce the file size and try again.'));
        $uploadOk = 0;
    }

    if($imageFileType != "pdf" && $imageFileType != "doc") {
        echo json_encode(array('Error'=>'Wrong filetype', 'longDesc'=>'Sorry, only PDF & DOC files are allowed.'));
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        //echo json_encode(array('Error'=>'Whoops', 'longDesc'=>'Sorry, your file was not uploaded.'));
    } else {   
        $filename = $newfilename;  
        $filepath = $_SERVER['DOCUMENT_ROOT'] . "/uploads/scripts/"; 
     
        if (move_uploaded_file($_FILES['file']['tmp_name'], $filepath . $filename)) {
            $user = $_SESSION['memberID'];
            $stmt = $db->prepare('INSERT INTO uploads (filepath,memberID,filename,category,title) VALUES (:filepath,:memberID,:filename,:category,:title)');
            $stmt->execute(array(
                ':memberID' => $user,
                ':filepath' => $filepath,
                ':filename' => $filename,
                ':category' => $category,
                ':title' => $title
            ));              
            echo $filename;
        } else {
            echo json_encode(array('Error'=>'NoGo', 'longDesc'=>'Sorry, there was an error uploading your file.  Please try again later.'));
        }
    }
?>