<?php
/* ===============================
== Basic PHP/MySQL Authentication 
== by x0x 
== Email: x0x@ukshells.co.uk
================================*/
//error_reporting ("E_ALL & ~E_NOTICE");
include_once("inc/lang.tr.php");
include_once("inc/auth.inc.php");
//$error=0;

//$usertype=_get_user_type($user['user_id']);
if(!$module){$module="default";$login_show="yes";


} else {
	$user = _check_auth($_COOKIE);
	$usertype=_get_user_type($user['user_id']);
	
}	



include("template/$template/index.php");
?>
