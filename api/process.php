<?php
	//process web requests
	$request = array_merge($_GET, $_POST);
	$action = $request['action'];
	if($action == 'text'){
		// $image64 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request['file']));
		$image64 = preg_replace('#^data:image/\w+;base64,#i', '', $request['file']);

		$image_base64 = base64_decode($image64);
		$filename = 'images/live/' . uniqid() . '.png';
		file_put_contents("../".$filename, $image_base64);



		$string = shell_exec("python /ssdsdsys/text.py");
		echo "$string";
		echo($filename);
	}

	function curl_get(){
		// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
	curl_setopt_array($curl, array(
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_URL => 'http://127.0.0.1:8000/',
	    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
	));
	// Send the request & save response to $resp
	$resp = curl_exec($curl);
	// Close request to clear up some resources
	curl_close($curl);
	}
?>