<?php

/* ===============================
== Basic PHP/MySQL Authentication 
== by x0x 
== Email: x0x@ukshells.co.uk
================================*/

$CONFIG                  = array();
$CONFIG['HOST_NAME']     = 'localhost';
$CONFIG['DATABASE_NAME'] = 'evomaker';
$CONFIG['DB_USERNAME']   = 'root';
$CONFIG['DB_PASSWORD']   = '';
$template="green";
$website_title="EvoMaker";
$user_dir = "users";
$log_dir="logs";
//the file size in bytes.
$size_bytes =10000000; //51200 bytes = 50KB.
//Extensions you want files uploaded limited to.
$limitedext = array(".jws",".gif",".jpg",".jpeg",".png",".txt",".nfo",".doc",".rtf",".htm",".dmg",".zip",".rar",".gz",".exe");
?>
