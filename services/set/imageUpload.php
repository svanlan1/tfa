<?php require('../../core/config.php');  

    $temp = explode(".", $_FILES["file"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $target_dir = "uploads/";
    $category = $_POST["category"];
    if($_POST["title"]) {
        $title = $_POST["title"];
    } else {
        $title = "No title provided";
    }
    
    $target_file = $target_dir . basename($_FILES["file"]["name"] . $newfilename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check !== false) {
            echo json_encode(array('File'=>'File is an image'));
            $uploadOk = 1;
        } else {
            echo json_encode(array('Error'=>'File is not an image'));
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        echo json_encode(array('Error'=>'File already exists'));
        $uploadOk = 0;
    }

    if ($_FILES["file"]["size"] > 500000) {
        echo json_encode(array('Error'=>'File is too large'));
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo $imageFileType;
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {

    } else {   
        $filename = $newfilename;  
        $filepath = $_SERVER['DOCUMENT_ROOT'] . "/sandbox/uploads/"; 
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
            // echo $filepath . $filename . ", something was stupid though and didn't work.";
            echo json_encode(array('Error'=>'Something was stupid and it did not work'));
        }
    }
?>