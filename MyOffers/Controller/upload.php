<?php

include '../Controller/fetch_attribute.php'; 

session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if((isset($_COOKIE['login'])) || (isset($_SESSION['user'])) || (!trim($_SESSION['user']) == '')){
	
	if(isset($_COOKIE['login'])){
		
		$loginKey=$_COOKIE['login'];
	}
	else{
		
		$loginKey=$_SESSION['user'];
	}
$dataArray=getUserData($loginKey);
$username=$dataArray[10];

// We're putting all our files in a directory called images.
$uploaddir = '../../Files/images/';

// The posted data, for reference
$file = $_POST['value'];
$name = $_POST['name'];

// Get the mime
$getMime = explode('.', $name);
$mime = end($getMime);

// Separate out the data
$data = explode(',', $file);

// Encode it correctly
$encodedData = str_replace(' ','+',$data[1]);
$decodedData = base64_decode($encodedData);

// You can use the name given, or create a random name.
// We will create a random name!

$randomName = substr_replace(sha1(microtime(true)), '', 12).'.'.$mime;
$path="localhost/DoggieCare/Files/images/".$randomName;
save_image($path,$username);

if(file_put_contents($uploaddir.$randomName, $decodedData)) {
	echo $randomName.":uploaded successfully";
}
else {
	// Show an error message should something go wrong.
	echo "Something went wrong. Check that the file isn't corrupted";
}

}
else
{
	header("location: ../../FrontPage/View/index.php");
	exit();
}
?>