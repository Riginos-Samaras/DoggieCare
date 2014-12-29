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
			$dataArray[8]=$row['gender'];
			$dateArray[9]=$row['age'];
			$dataArray[10]=$row['userid'];
    		
	}
	return $dataArray;
}
function fetchOfferData($offerid){
	
	$db=users_db_connect();
	$count=0;
		
	foreach($db->query("SELECT * FROM offers WHERE offerid='$offerid'") as $row) 
	{
			$offerArray[$count][0]=$row['offerid'];
			$offerArray[$count][1]=$row['offername'];
			$offerArray[$count][2]=$row['userid_fgn'];
			$offerArray[$count][3]=$row['date'];
			$offerArray[$count][4]=$row['start_time'];
			$offerArray[$count][5]=$row['finish_time'];
			$offerArray[$count][6]=$row['location'];
			$offerArray[$count][7]=$row['reward'];
			$offerArray[$count][8]=$row['usertype'];
			$offerArray[$count][9]=$row['description'];
			
			$count++;
    		
	}
	
	return $offerArray;
}

function fetchMessages($username){
	
	$db=users_db_connect();
	$count=0;
		
	foreach($db->query("SELECT * FROM messages WHERE to_user='$username'") as $row) 
	{
			$messageArray[$count][0]=$row['from_user'];
			$messageArray[$count][1]=$row['message'];
			$messageArray[$count][2]=$row['message_id'];
			
			
			$count++;
    		
	}
	
	return $messageArray;
}
function getemail($value){
	//$_SESSION['username'];
	$entry=getuserdate($value);
	

	 
	

}
function validateoffer($offername){
	if($offername!="walking"&&$offername!="sitting"&&$offername!="cleaning"){
		return 0;
	}
	else{
		return 1;
	}
	
}
function validatebiscuits($biscuits){
	$goodbiscuits= ereg('^[1-9]?[1-9]{1}$|^100$',$biscuits);
	if($goodbiscuits=="")
	{$goodbiscuits=0;}
	return $goodbiscuits;	
}
function  validateusertype($theoffer){
	$goodoffer=0;
	if(($theoffer=="consumer")||($theoffer=="provider")){
		$goodoffer=1;
	}
	return $goodoffer;
}
function validatedatepicker($datepicker){
	$gooddatepicker= ereg('^[0-2][1-9]$|^30$|^31$',$datepicker);
	if($gooddatepicker=="")
		{$gooddatepicker=0;}
	return $gooddatepicker;	
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
function save_pm_to_db($to_user,$from_user,$message){
	
							try{
								$con=users_db_connect();
		
						  
						  	
								  //MySql Insert data to table registration
								  
								 $sql="INSERT INTO messages (to_user, from_user, message)
										  VALUES (:to, :from, :message)";
									$q = $con->prepare($sql);
								
									$q->execute(array(	':to'=>$to_user,
								
								                  		':from'=>$from_user,
								
								                  		':message'=>$message));
													 
									if(!$q)
								
										{
									
										  die("Execute query error, because: ". $con->errorInfo());
										
										}
									else{
								
									
									
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
	
	function DeleteOffer($offerid){
			
		$db=users_db_connect();
		$sql = "DELETE FROM offers WHERE offerid =  :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $offerid, PDO::PARAM_INT);   
		$stmt->execute();
		
	}
	
	function fetchSuggestion($offerid){
	
	
	$db=users_db_connect();
	$count=0;
	$found=0;
	foreach($db->query("SELECT * FROM suggestions as s JOIN offers as o ON s.suggested_offerid=o.offerid JOIN registration as reg ON reg.userid=o.userid_fgn WHERE s.offerid='$offerid'") as $row) 
	{
			$offerArray[$count][0]=$row['offerid'];
			$offerArray[$count][1]=$row['offername'];
			$offerArray[$count][2]=$row['userid_fgn'];
			$offerArray[$count][3]=$row['date'];
			$offerArray[$count][4]=$row['start_time'];
			$offerArray[$count][5]=$row['finish_time'];
			$offerArray[$count][6]=$row['location'];
			$offerArray[$count][7]=$row['reward'];
			$offerArray[$count][8]=$row['usertype'];
			$offerArray[$count][9]=$row['description'];
			$offerArray[$count][10]=$row['username'];
			$count++;
    		$found=1;
	}
	
	if($found==0){
			return 0;
		
	}
else{
	return $offerArray;
}}

?>