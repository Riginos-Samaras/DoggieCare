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
    		return $dataArray;
	}
	
}
function getemail($value){
	//$_SESSION['username'];
	$entry=getuserdate($value);
	

	 
	

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
	
	

?>