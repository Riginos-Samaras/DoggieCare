<?php

include '../Model/db_functions.php';
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if((isset($_COOKIE['login'])) || (isset($_SESSION['user'])) || (!trim($_SESSION['user']) == '')){
	
	if(isset($_COOKIE['login'])){
		
		$loginKey=$_COOKIE['login'];
	}
	else{
		
		$loginKey=$_SESSION['user'];
	}
 if(isset($_POST['delete_id'])) {

        $sql_articles = "DELETE FROM messages WHERE message_id = ".$_POST['delete_id'];

        if(query($sql_articles)) {
            echo "YES";
        }
        else {
            echo "NO";
        }
    }
else {
    echo "FAIL";
}


}
else
{
	header("location: ../../FrontPage/View/index.php");
	exit();
}

?>