<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
require_once('..'.DS.'lib'.DS.'core'.DS.'init.inc.php');
$purifier = new HTMLPurifier();

$from = "";
$text = "";
function upload_image(){
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);

	if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 1000000) && in_array($extension, $allowedExts)) {
		if ($_FILES["file"]["error"] > 0) {
			return "Return Code: " . $_FILES["file"]["error"];
		} else {
			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".time(). $_FILES["file"]["name"]);
			return true;
	   }
	} else {
		return "Invalid file";
	}
}

if(isset($_POST['submit'])){
	$from = $purifier->purify($_POST['from']);
	$text = $purifier->purify($_POST['text']);
    $from = preg_replace('/[^0-9]/', '', $from);
    if(strlen($from) === 10) {
        if(strlen($text) >= 20){
            $m = upload_image();
            if($m === true){
	            $fn = time(). $_FILES["file"]["name"];

	            $sql = "INSERT INTO 
	                        `sms` (`from`, `msg`, `filename`) 
	                    VALUES 
	                        (:from, :msg, :filename)";
	            try {
	                $db = DB_Connect::getConnection();
	                $stmt = $db->prepare($sql);
	                $stmt->bindParam(":from", $from, PDO::PARAM_STR);
	                $stmt->bindParam(":msg", $text,  PDO::PARAM_STR);
	                $stmt->bindParam(":filename", $fn,  PDO::PARAM_STR);
	                $stmt->execute();
	                $stmt->closecursor();
	                echo "Your problem is recorded. Thank you";
	                $from = "";
	                $text = "";
	            } catch(Exception $e){
	                self::$log = Logger::getLogger('fileUpload');
	                self::$log->fatal($e->getMessage());
	                die("Could not complete your request");
	            }
            } else {
                echo $m;
            }
        } else {
            echo "Please enter more description";
        }
    } else {
        echo "Invalid! Phone Number";
    }
}
?>

<html>
<body>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post"
enctype="multipart/form-data">
<label for="">Phone number:</label>
<input type="input" name="from" id="from" value="<?php echo $from; ?>"><br>
<label for="">Message:</label>
<input type="input" name="text" id="text" value="<?php echo $text; ?>"><br>
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
