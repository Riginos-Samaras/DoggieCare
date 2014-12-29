<?php 


//connecting to db function
function users_db_connect(){

$db = new PDO('mysql:host=localhost;dbname=puppymaker;charset=utf8', 'root', 'root');
return $db;
}


function updateLoginKey($loginKey,$username){
	
							try{
								$con=users_db_connect();
		
						  
						  	
								  //MySql Insert data to table registration
								  
								 $sql="UPDATE registration SET login_key=:loginkey WHERE username=:usrname";

									$q = $con->prepare($sql);
								
									$q->execute(array(	':loginkey'=>$loginKey,
														':usrname'=>$username));
													 
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

function loginValidateUser($username,$password){
	
		$db=users_db_connect();
		$found=0;
		foreach($db->query('SELECT * FROM registration') as $row) {
		    	if($row['username']==$username){
		    		
					if($row['password']==$password){
						
						if($row['verified']==1){
						$found=1;
						}
						else{
							$found=2;
							
						}
		    	}
				}
			
		}
		return $found;
	
}

function getEmail($username){
	
	$db=users_db_connect();
	
	foreach($db->query("SELECT * FROM registration WHERE username='$username'") as $row) {
    
			$email = $row['email'];
			return $email;
	
		}
	
}
function getVcode($username){
	
	$db=users_db_connect();
	
	foreach($db->query("SELECT * FROM registration WHERE username='$username'") as $row) {
    
			$vcode = $row['verification_code'];
			return $vcode;
	
		}
	
}

?>