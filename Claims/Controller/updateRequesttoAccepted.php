<?php
include '../Model/db_functions.php';

$offerid=$_POST['deleteid'];
echo "$offerid";
updateRequestedtoAccepted($offerid);

?>
