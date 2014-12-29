<?php
$localhost = "localhost";
$mysqlusername  = "root";
$mysqlpassword  = "root";
$db = "puppymaker";
$con = mysql_connect($localhost, $mysqlusername, $mysqlpassword);
mysql_select_db("$db", $con);
?> 