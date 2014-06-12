<?php
$dp = getcwd().DIRECTORY_SEPARATOR;
$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && in_array($extension, $allowedExts)) {
	if ($_FILES["file"]["size"] < 40000) {
	  if ($_FILES["file"]["error"] > 0) {
	    echo $_FILES["file"]["error"];
	  }
	  else {
	    if (file_exists($dp."uploaded_images/".$_FILES["file"]["name"])) {
	      echo $_FILES["file"]["name"] . " already exists. ";
	    }
	    else {
	      move_uploaded_file($_FILES["file"]["tmp_name"],$dp."uploaded_images/".$_FILES["file"]["name"]);
	      echo "Uploaded to " . "http://cs.redeemer.ca/~beastman/uploaded_images/" . $_FILES["file"]["name"];
	    }
	 	}
	} else {
		echo "File too large, must be smaller than 40 kb";
	}
}
else {
  echo "Invalid file type. Must be jpg, gif, or png.";
}
?>
