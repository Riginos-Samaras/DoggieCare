<?php 

$new_data=$_POST['value'];
$elemet_id=$_POST['id'];


$parse = explode("_", $elemet_id);
$field=$parse[0];
$id=$parse[1];


try{
		$con=new PDO('mysql:host=localhost;dbname=puppymaker;charset=utf8', 'root', 'root');
							  	
		switch ($field) {
		    case offerType:{
		      $sql="UPDATE offers SET usertype=:type WHERE offerid=:id";
			  $q = $con->prepare($sql);
			  $q->execute(array(':type'=>$new_data,':id'=>$id));
			  echo $new_data;
			}
		        break;
		    case description:{
		      $sql="UPDATE offers SET description=:data WHERE offerid=:id";
			  $q = $con->prepare($sql);
			  $q->execute(array(':data'=>$new_data,':id'=>$id));
			  echo $new_data;
			}
		        break;
		    case location:{
		      $sql="UPDATE offers SET location=:data WHERE offerid=:id";
			  $q = $con->prepare($sql);
			  $q->execute(array(':data'=>$new_data,':id'=>$id));
			  echo $new_data;
			}
		        break;
			case datee:{
		      $sql="UPDATE offers SET date=:data WHERE offerid=:id";
			  $q = $con->prepare($sql);
			  $q->execute(array(':data'=>$new_data,':id'=>$id));
			  echo $new_data;
			}
		        break;
			case startTime:{
		      $sql="UPDATE offers SET start_time=:data WHERE offerid=:id";
			  $q = $con->prepare($sql);
			  $q->execute(array(':data'=>$new_data,':id'=>$id));
			  echo $new_data;
			}
		        break;
			case endTime:{
		      $sql="UPDATE offers SET finish_time=:data WHERE offerid=:id";
			  $q = $con->prepare($sql);
			  $q->execute(array(':data'=>$new_data,':id'=>$id));
			  echo $new_data;
			}
		        break;
		    case reward:{
		      $sql="UPDATE offers SET reward=:data WHERE offerid=:id";
			  $q = $con->prepare($sql);
			  $q->execute(array(':data'=>$new_data,':id'=>$id));
			  echo $new_data;
			}
		        break;
		    case service:{
		      $sql="UPDATE offers SET offername=:data WHERE offerid=:id";
			  $q = $con->prepare($sql);
			  $q->execute(array(':data'=>$new_data,':id'=>$id));
			  echo $new_data;
			}
		        break;
		}
	
								
}
catch(PDOException $pe)	
{
							
die('Connection error, because: ' .$pe->getMessage());
							
}



?>