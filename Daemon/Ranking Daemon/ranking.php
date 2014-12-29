<?php
function users_db_connect(){

$db = new PDO('mysql:host=localhost;dbname=puppymaker;charset=utf8', 'root', 'root');
return $db;
}
function updateRating(){
	
	$db=users_db_connect();
	$db2=users_db_connect();
	$db3=users_db_connect();
	$count1=0;
	$count2=0;
	$total_provider=0;
	$total_consumer=0;
	
	$average_rating_prov=0;
	$average_rating_cons=0;
	
	$v_prov=$count1=0;
	$R_prov=$total_p=0;
	
	$v_cons=$count2=0;
	$R_cons=$total_c=0;
	
	foreach($db->query("SELECT * FROM registration") as $row1) 
	{
			$username=$row1['username'];
			$userid=$row1['userid'];
			foreach($db2->query("SELECT * FROM offers as o JOIN requests as r ON o.offerid=r.offer_id_fgn  WHERE r.rated=1 AND r.from_user='".$username."'") as $row) 
			{
						
					if($row['usertype']=="Provider"){
						
						$total_provider=$total_provider+$row['rating'];
						$count1++;
					}
					else {
						$total_consumer=$total_consumer+$row['rating'];
						$count2++;
					}
					
					
		    		
			}
	$total_p=(((float)$total_provider)/((float)$count1));
	$total_c=(((float)$total_consumer)/((float)$count2));
	//***
	// Bayesian estimate: (v ÷ (v+m)) × R + (m ÷ (v+m)) × C
	//***
	$C=2.5;
	$m=3;
	$v_prov=$count1;
	$R_prov=$total_p;
	
	$v_cons=$count2;
	$R_cons=$total_c;
	
	if($v_prov!=0){
	$average_rating_prov=(((float)$v_prov/((float)$v_prov+$m))*(float)$R_prov+((float)$m/((float)$v_prov+$m))*(float)$C);}
	else {
		$average_rating_prov=0;
	}
	if($v_cons!=0){
	$average_rating_cons=(((float)$v_cons/((float)$v_cons+(float)$m))*(float)$R_cons+((float)$m/((float)$v_cons+(float)$m))*(float)$C);}
	else {
		$average_rating_cons=0;
	}
	// Bayesian estimate:
	$sql = "UPDATE registration SET consumer_rating=:c_rating, provider_rating=:p_rating
	WHERE userid=:id" ;
	$q = $db3->prepare($sql);
	$q->execute(array(':c_rating'=>$average_rating_cons,
						':p_rating'=>$average_rating_prov,
						':id'=>$userid
	));
	/*
	$sql = "UPDATE registration SET consumer_rating=:c_rating, provider_rating=:p_rating
	WHERE userid=:id" ;
	$q = $db3->prepare($sql);
	$q->execute(array(':c_rating'=>$total_c,
						':p_rating'=>$total_p,
						':id'=>$userid
	));
	*/
	$count1=0;
	$count2=0;
	$total_provider=0;
	$total_consumer=0;
	
	$average_rating_prov=0;
	$average_rating_cons=0;
	
	$v_prov=$count1=0;
	$R_prov=$total_p=0;
	
	$v_cons=$count2=0;
	$R_cons=$total_c=0;
	}
}
function updateRank_C(){
	
	$rank=1;
	$db=users_db_connect();
	$db2=users_db_connect();
	foreach($db->query("SELECT * FROM registration ORDER BY consumer_rating DESC") as $row) 
	{
		$userid=$row['userid'];	
		
	$sql = "UPDATE registration SET consumer_ranking=:rank
	WHERE userid=:id" ;
	$q = $db2->prepare($sql);
	$q->execute(array(':rank'=>$rank,
						':id'=>$userid
	));
	
	$rank=$rank+1;	
	}
	
	
}
function updateRank_P(){
	
	$rank=1;
	$db=users_db_connect();
	$db2=users_db_connect();
	foreach($db->query("SELECT * FROM registration ORDER BY provider_rating DESC") as $row) 
	{
		$userid=$row['userid'];	
		
	$sql = "UPDATE registration SET provider_ranking=:rank
	WHERE userid=:id" ;
	$q = $db2->prepare($sql);
	$q->execute(array(':rank'=>$rank,
						':id'=>$userid
	));
	
	$rank=$rank+1;	
	}
	
	
}

while (true) {
	
updateRating();
updateRank_C();
updateRank_P();

sleep(30);
}
?>