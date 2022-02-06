<?php

/* ===============================
== Basic PHP/MySQL Authentication 
== by x0x 
== Email: x0x@ukshells.co.uk
================================*/

function _begin_html()
{  global $template;
  ?>
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
  <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9">
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html;">
   <link rel="stylesheet" type="text/css" href="template/<?=$template;?>/style.css" media="screen" />
    <title>EvoMaker</title>
    
  </head>
  <body>
  <?
}

function _login_box()
{
	?>
      <table align=center>
      <form action="login.php" method="post" >
      <tr>
        <td>Username: </td>
        <td><input type="text" name="user" size="20"></td>
      </tr>
      <tr>
        <td>Password: </td>
        <td><input type="password" name="pass" size="20"></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          Remember me: <input type="checkbox" name="rem" value="1" checked>
        </td>
      </tr>   
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="submit" value="Log in" >
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
        </td>
      </tr>
      </form>
      </table>
<?    
}

function _get_user_id($user)
{
  return $user['user_id'];
}

function _get_user_type($user_id)
{
  $sql="select type from users where user_id=$user_id";
  $r=mysql_fetch_array(mysql_query($sql));
  return $r['type'];
}


function create_left_menu($usertype){
	global $user;
$usertype=_get_user_type($user['user_id']);
if($usertype)
{
$sql="select * from modules where module_type like '%$usertype%' and active=1";
$result=mysql_query($sql);
echo"<h2>Control Menu (<b>".$user['user_name']."</b>)</h2>";
echo"<ul>";
while($row=mysql_fetch_array($result)){
echo "<li><a href=\"?module=".$row['module_name']."\">".$row['module_title']."</a></li>\n";
}
echo "</ul>\n";
}
}

function create_login_form(){
	global $user;
$usertype=_get_user_type($user['user_id']);
if(!$usertype){echo'
<h2>Login Form</h2>
<br>

<table>
<form action="login.php" method="post" >
<tr><td>Username: 
<td><input type="text" name="user" size=10>
<tr><td>Password: 
<td><input type="password" name="pass" size=10>
<tr><td colspan=2 align=center><input type="submit" name="submit" value="Log in" >
</table>
</form>
';
	}

}
function create_general_menu(){
	global $user;
$usertype=_get_user_type($user['user_id']);

echo"<h2>General Menu :</h2>
<ul>
<li><a href=\"index.php\">Home</a></li>";
if($usertype){echo"<li><a href=\"logout.php\">Logout</a></li>";}
echo"</ul>";

}
function check_user($username){

$sql="select * from users where `user_name`='$username'";
$r=mysql_query($sql);
return mysql_num_rows($r);

}
function login_page()
{
   _login_box();
}




function check_dataset($datasetname){
global $user_dir,$user;
$dir = $user_dir."/".$user['user_name'];
   if(is_dir($dir."/".$datasetname)) {return 1;} else {return 0;}
}


function create_dataset_select(){
global $user_dir,$user;
$dir = $user_dir."/".$user['user_name'];
if (is_dir($dir)) {
$dir_select.="<select name=datasetname onchange='document.datasetselectform.submit()'><option></option>";
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != "." && $file != ".." && is_dir("$dir/$file")) {
             // found a directory, do something with it?
            $dir_select.="<option>$file</option>";

          }
   
        }
        closedir($dh);
        $dir_select.="</select>";
    }

}

return $dir_select;
}


function replace_tr($text) {
$text = trim($text);
$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
$replace = array('C','c','G','g','i','I','O','o','S','s','U','u','-');
$new_text = str_replace($search,$replace,$text);
return $new_text;
}

function create_log ($datasetname,$event){
global $log_dir,$user_dir,$user;
$uploaddir= $user_dir."/".$user['user_name']."/".$datasetname."/";
//echo $uploaddir;
$file = fopen($log_dir."/log.txt", 'a+');
fwrite($file,$user['user_name']."|".$datasetname."|"." $event on ".date("F j, Y, G:i:s a")."\n");
fclose($file);
return;
}






?>
