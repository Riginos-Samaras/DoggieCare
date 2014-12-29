<?php 


//connecting to db function
function users_db_connect(){

$db = new PDO('mysql:host=localhost;dbname=puppymaker;charset=utf8', 'root', 'root');
return $db;
}
function fetchUserData($loginKey){
	$db=users_db_connect();
	
	foreach($db->query("SELECT * FROM registration WHERE login_key='$loginKey'") as $row) 
	{
			$dataArray[0]=$row['fullname'];
			$dataArray[1]=$row['username'];
			$dataArray[2]=$row['email'];
			$dataArray[3]=$row['phone'];
			$dataArray[4]=$row['address'];
			$dataArray[5]=$row['fb_url'];
			$dataArray[6]=$row['city'];
			$dataArray[7]=$row['message'];
			$dataArray[8]=$row['age'];
			$dataArray[9]=$row['gender'];
			//echo "$dateArray[9]";
    	
	}

		return $dataArray;
}

function changeUserData($name,$email,$fb_url,$phone,$country,$city,$address,$gender,$age,$message,$loginKey,$username,$imageName,$imageData,$imageType){
	$db=users_db_connect();
	//
		//
		//UPDATE `registration` SET `fullname`='riginos samaras',`phone`='99115166',`address`='Hrakleous 5 agia zoni',`FB_url`='psylis.facebook.com',`city`='Limmasol',`dateofbirth_day`='13',`dateofbirth_month`='5',`dateofbirth_year`='1992',`note`='nothing to do',`gender`='0' WHERE `username`='samaras'

	$sql = "UPDATE registration SET fullname=:name1, email=:email1, fb_url=:fb_url1, phone=:phone1, age=:age1,
	country=:country1, city=:city1, address=:address1,message=:message, gender=:gender1
	 WHERE login_key=:loginKey1" ;
	$q = $db->prepare($sql);
	$q->execute(array(':name1'=>$name,
						':email1'=>$email,
						':fb_url1'=>$fb_url,
						':phone1'=>$phone,
						':age1'=>$age,
						':country1'=>$country,
						':city1'=>$city,
						':address1'=>$address,
						':gender1'=>$gender,
						':message'=>$message,
						':loginKey1'=>$loginKey
	));
	if(!$q){
		die('error'.$e->getMessage());
	}
	
		
		uploadImage($username,$imageName,$imageData,$imageType);
	
}
function fetchPass($loginKey){
	$db=users_db_connect();
		
	foreach($db->query("SELECT * FROM registration WHERE login_key='$loginKey'") as $row) 
	{
			$dataArray=$row['password'];
    		return $dataArray;
	}
	
}
function truePass($oldPass,$loginKey){
	$found=0;
	$fetchedpass=fetchPass($loginKey);
	if($oldPass==$fetchedpass){
	$found=1;
	}
	return $found;
}

function validate_pass($newPass)
{
	$good_pass= ereg('^[a-zA-Z0-9!@#$%*()_+^&}{:;?.]{6,18}$',$newPass);
	if($good_pass=="")
	{$good_pass=0;}
	return $good_pass;
}
function samePass($newPass,$confPass){
	$found=0;
	if($newPass==$confPass){
	$found=1;
	}
	return $found;
}
function changePass($newPass,$loginKey){
	$db=users_db_connect();
	
	$sql = "UPDATE registration SET password=:newPass
	 WHERE login_key=:loginKey1" ;
	$q = $db->prepare($sql);
	$q->execute(array(':newPass'=>$newPass,
						':loginKey1'=>$loginKey));
}

function validations($name,$email,$fb_url,$phone,$country,$city,$address,$gender,$age,$message,$imageType,$imageData){
	$good_name= ereg("^([a-zA-Z]{3,16} ?){1,5}$",$name);
	$good_email= ereg('^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$',$email);
	$good_fb_url= ereg('^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\wa-zA-Z0-9 \.-]*)*\/?$|^$',$fb_url);
	$good_phone= ereg('^[0-9\-\+]{4,15}$|^$',$phone);
	$good_country= ereg('.*|^$',$country);
	$good_city= ereg('^([a-zA-Z]{3,16} ?){1,5}$|^$',$city);
	$good_address= ereg('^([a-zA-Z]{3,16} ?){1,5}[0-9]{1,3}$|^$',$address);
	$good_gender= ereg('^Male$|^Female$',$gender);
	$good_age= ereg('^[1-9]?[0-9]{1}$|^100$|^$',$age);
	$good_message= ereg('^[a-z0-9A-Z ]{0,100}$|^$',$message);
	if ($good_name)
	 	echo "Thats a gd name$good_name ss";
	else
		echo "Thats a bad name";
	$valArray[0]=$good_name;
	$valArray[1]=$good_email;
	$valArray[2]=$good_fb_url;
	$valArray[3]=$good_phone;
	$valArray[4]=$good_country;
	$valArray[5]=$good_city;
	$valArray[6]=$good_address;
	$valArray[7]=$good_gender;
	$valArray[8]=$good_age;
	$valArray[9]=$good_message;
	if(substr($imageType,0,5)=="image"){
	$valArray[10]="1";	
	}
	else if($imageData=="")  {
	$valArray[10]="1";
	}else{
		
		$valArray[10]="";
	}
	return $valArray;
}
function insert_data_into_users($fullname,$username,$password,$email,$vcode){
	
							try{
								$con=users_db_connect();
		
						  
						  	
								  //MySql Insert data to table registration
								  
								 $sql="INSERT INTO registration (fullname, username, email, password, verified, verification_code)
										  VALUES (:fullname, :username, :email, :password, '0', :vcode)";
									$q = $con->prepare($sql);
								
									$q->execute(array(	':fullname'=>$fullname,
								
								                  		':username'=>$username,
								
								                  		':email'=>$email,
								
								                  		':password'=>$password,
								
								                  		':vcode'=>$vcode));
													 
									if(!$q)
								
										{
									
										  die("Execute query error, because: ". $con->errorInfo());
										
										}
									else{
								
									
									SentVerificationEmail($vcode, $email);
									}
									mysqli_close($con);
								  
								}
							catch(PDOException $pe)
							
							{
							
							  die('Connection error, because: ' .$pe->getMessage());
							
							}
						  
								}


function updateEmailVerified($db){
		
	echo "Account Verified";
	$sql = "UPDATE registration SET verified=1";
	$q = $db->prepare($sql);
	$q->execute();
}

//checks if the vcode from the email matches the one in db
function vcodeValidation($db,$vcode){
			
		
		$found = 0;
		foreach($db->query('SELECT * FROM registration') as $row) {
    
			$check_vcode = $row['verification_code'];
	
	
			if($check_vcode == $vcode){
					$found = 1;
			}
	
		}
	return $found;
}

function check4dublicate($username,$email){
	
			$db=users_db_connect();
			foreach($db->query('SELECT * FROM registration') as $row) {
    
				$checkMail = $row['email'];
				$checkusename = $row['username'];
				
				if($checkusename == $username){
						$found = 1;
						break;
				}
				else if($checkMail == $email){
						$found = 2;
						break;
				}
				else{
					$found = 0;
					
				}
	
			}
	return $found;
}
	
	function uploadImage($username,$imageName,$imageData,$imageType){
	
	$con=users_db_connect();
	$type = explode("/", $imageType);
		$sql="INSERT INTO profile_pics (name,image,username,type)
										  VALUES (:imagename, :imagedata, :user, :type)";
									$q = $con->prepare($sql);
								
									$q->execute(array(':imagename'=>$imageName,
								
								                  		':imagedata'=>$imageData,
								
								                  		':user'=>$username,
								
								                  		':type'=>$type[1]));
		
		
		if(!$q)
								
										{
									
										  die("Execute query error, because: ". $con->errorInfo());
										
										}
	
	
	
}	

function getImage($username){
			$picFound=0;
			$db=users_db_connect();
			foreach($db->query("SELECT * FROM profile_pics WHERE username='$username'") as $row) {
				$picFound=1;
				$image= $row['image'];
				
				
			}
			
			if($picFound==0){
				
				foreach($db->query("SELECT * FROM profile_pics WHERE id=0") as $row) {
				
				$image= $row['image'];
				
				
			}
				
			}
			
	return $image;
}


?>