<?
$error=0;
$user = _check_auth($_COOKIE);

echo"<center><h2>Run Dataset  <b>$datasetname</b></h2></center>";
echo"<form name=datasetselectform action='' method=post>Select your dataset: ".create_dataset_select()."
<input type=hidden name=dtset_submit value='submitted'>
<input type=submit value='Select Dataset'>
</form>";

if($dtset_submit&&$datasetname){
$file_error=0;
$uploaddir= $user_dir."/".$user['user_name']."/".$datasetname."/";
$valuefile= $uploaddir."value.txt";
$namefile= $uploaddir."name.txt";
echo"<br>Checking Value file ......... ";
if(is_file($valuefile)){echo"<font color=green><b>OK</b></font>";} else {echo"<font color=red><b>NOT AVAILABLE</b></font>";$file_error=1;}
echo"<br>Checking Name file .........";
if(is_file($namefile)){echo"<font color=green><b>OK</b></font>";} else {echo"<font color=red><b>NOT AVAILABLE</b></font>";$file_error=1;}
echo"<br>";
if($file_error==1){echo"You need to upload 'value file' or 'name file' to run dataset. Please edit your dataset.";}
else {
     echo"<form action='' method=post>
     <input type=hidden name=datasetname value='$datasetname'>
     Shell Command: <input type=text size=30 name='run_command' value='run commands will be here'>
     <input type=submit name='run_dataset_submit' value='Run Dataset'>

     </form>";
      }
}

if($run_dataset_submit){
echo"This dataset (<b>$datasetname</b>)will be runned using the command : '<i>$run_command</i>'";
create_log($datasetname,"Run command");
}
?>
