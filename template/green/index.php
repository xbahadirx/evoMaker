<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html;">
<link rel="stylesheet" type="text/css" href="template/<?=$template;?>/style.css" media="screen" />
</head>
<body>

<div id="wrap">

<div id="header">
<h1><?=$website_title;?></h1>
<h2>Description of <?=$website_title;?></h2>

</div>

<div class="right"> 

<?
include "modules/$module/index.php";
?>
</div>

<div class="left"> 


<? 

create_general_menu();
create_left_menu($usertype);
create_login_form();
?>



</div>

<div style="clear: both;"> </div>


<div id="footer">
EvoMaker web interface
</div>

</div>

</body>
</html>
