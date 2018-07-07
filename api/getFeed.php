<?php
	if(!empty($_FILES['image'])){
		//save image
		$image = $_FILES['image'];
		$filename = "images/".time().md5(time()).".jpg";
		if(move_uploaded_file($image['tmp_name'], $filename)){

			//Saving the image in temps
			$file = fopen("latimg.txt", "w+");
			fwrite($file, $filename);
			
			flush();
			die();
		}
	}else{
		//check in a file
		$file = file_get_contents('latimg.txt');
		echo $file;
	}

?>