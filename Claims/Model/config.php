<?php
########## MySql details (Replace with yours) #############
$username = "root"; //mysql username
$password = "root"; //mysql password
$hostname = "localhost"; //hostname
$databasename = 'puppymaker'; //databasename

//connect to database
$connecDB = mysql_connect($hostname, $username, $password)or die('could not connect to database');
mysql_select_db($databasename,$connecDB);

?>