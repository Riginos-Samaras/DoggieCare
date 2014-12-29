<?php 
include 'lib_email.php';

//connecting to db function
function users_db_connect(){

$db = new PDO('mysql:host=localhost;dbname=puppymaker;charset=utf8', 'root', 'root');
return $db;
}


function insert_data_into_users($fullname,$username,$password,$email,$vcode,$loginKey){
	
							try{
								$con=users_db_connect();
		
						  
						  	
								  //MySql Insert data to table registration
								  
								 $sql="INSERT INTO registration (fullname, username, email, password, verified, verification_code, login_key)
										  VALUES (:fullname, :username, :email, :password, '0', :vcode, :loginkey)";
									$q = $con->prepare($sql);
								
									$q->execute(array(	':fullname'=>$fullname,
								
								                  		':username'=>$username,
								
								                  		':email'=>$email,
								
								                  		':password'=>$password,
								
								                  		':vcode'=>$vcode,
								
								                  		':loginkey'=>$loginKey));
													 
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


function updateEmailVerified($db,$vcode){
		
	
	$sql = "UPDATE registration SET verified=1 WHERE verification_code='$vcode' ";
	$q = $db->prepare($sql);
	$q->execute();
}

//checks if the vcode from the email matches the one in db
function vcodeValidation($db,$vcode){
			
		
		$found = 0;
		foreach($db->query("SELECT * FROM registration WHERE verification_code='$vcode'") as $row) {
    
			$found=1;
	
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
	
function validations($fullname,$username,$password,$email,$ReEnterEmail){

	$good_name= ereg("^([a-zA-Z]{3,16} ?){1,5}$",$fullname);
	$good_email= ereg('^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$',$email);
	$good_username= ereg('^[a-z0-9_-]{3,16}$',$username);
	$good_password= ereg('^[a-zA-Z0-9!@#$%*()_+^&}{:;?.]{6,18}$',$password);
	
	
	$valArray[0]=$good_name;
	$valArray[1]=$good_email;
	$valArray[2]=$good_username;
	$valArray[3]=$good_password;
	if($email==$ReEnterEmail){
			$valArray[4]="1";
		}
	else{
		$valArray[4]="";
	}
	return $valArray;

	
	
	
	
}

?>