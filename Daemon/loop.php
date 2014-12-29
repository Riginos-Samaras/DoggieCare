<?php
function users_db_connect(){

$db = new PDO('mysql:host=localhost;dbname=puppymaker;charset=utf8', 'root', 'root');
return $db;
}
function fetchOfferData(){
	
	$db=users_db_connect();
	$count=0;
		
	foreach($db->query("SELECT * FROM offers") as $row) 
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
function clear_sugestions(){
	
$db=users_db_connect();
$sql = "DELETE FROM `suggestions` WHERE 1";
$stmt = $db->prepare($sql);
$stmt->execute();
	
	
}
function find_mathces($offername,$usertype,$userid_fgn){
	
	
		
	$job=$offername;
	$type=$usertype;
	$user=$userid_fgn;
	$db=users_db_connect();
	$count=0;
	$found=0;
	foreach($db->query("SELECT * FROM offers JOIN registration ON userid=userid_fgn WHERE offername='$job' AND usertype !='$type' AND userid_fgn !='$user'") as $row) 
	{
			$offerArray[$count][0]=$row['offerid'];
			
			$count++;
    		$found=1;
	}
	
	if($found==0){
			return 0;
		
	}
else{
	return $offerArray;
}
	
	
}
function insert_suggestion($offerArray){
	
								$offerid=$offerArray[0];
						  		$offername=$offerArray[1];
						  		$userid_fgn=$offerArray[2];
								$date=$offerArray[3];
								$start_time=$offerArray[4];
						  		$finish_time=$offerArray[5];
						  		$location=$offerArray[6];
						  		$reward=$offerArray[7];
						  		$usertype=$offerArray[8];
						  		$description=$offerArray[9];
								
								$found=find_mathces($offername,$usertype,$userid_fgn);

							if($found!=0){
							foreach ($found as $row) 
							{
							try{
								$con=users_db_connect();

								 //MySql Insert data to table registration
								  
								 $sql="INSERT INTO suggestions (offerid, suggested_offerid)
										  VALUES (:offerid, :suggested_offerid)";
									$q = $con->prepare($sql);
								
									$q->execute(array(	':offerid'=>$offerid,
								
								                  		':suggested_offerid'=>$row[0]));
									
								  
								}
							catch(PDOException $pe)	
							{
							
							  die('Connection error, because: ' .$pe->getMessage());
							
							}
							}
							}
							
						  
	}
function makesuggestion(){
			
		$offerArray=fetchOfferData();
		
		foreach ($offerArray as $row) 
		{
			echo $row[0];
			insert_suggestion($row);
			
		}
}

while (true) {
	
clear_sugestions();
makesuggestion();

sleep(3);
}
?>