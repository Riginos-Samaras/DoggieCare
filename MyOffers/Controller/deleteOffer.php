<?php
include '../Model/db_functions.php';

$offerid=$_GET['delete'];

DeleteOffer($offerid);

header("location: ../View/MyOffers.php");
?>