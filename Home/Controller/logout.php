<?php
session_start();
session_unset();
session_destroy();

if(isset($_COOKIE['login'])){
setcookie("login","",time()-720000,"/");
}


header("location:../../FrontPage/View/index.php");
exit();
?>