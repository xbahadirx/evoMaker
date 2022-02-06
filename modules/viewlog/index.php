<?
$error=0;
$user = _check_auth($_COOKIE);
echo"<center><h2>User Log file  </h2></center>";
$file=fopen($log_dir."/log.txt","r");
$contents = fread($file, filesize($log_dir."/log.txt"));
echo "<pre>".$contents."</pre>";
?>
