<?
$error=0;
$user = _check_auth($_COOKIE);

if($edit_dataset_submit){
if($datasetname!=$old_datasetname){
$datasetname=replace_tr($datasetname);

if(rename($user_dir."/".$user['user_name']."/".$old_datasetname,$user_dir."/".$user['user_name']."/".$datasetname))
   {echo "<br><font color=red>Dataset name changed : </font><b>$old_datasetname</b> was renamed as <b>$datasetname</b>";
      create_log($datasetname,"Dataset name changed ($old_datasetname) to ($datasetname)");
    }
}
$uploaddir= $user_dir."/".$user['user_name']."/".$datasetname."/";
$valuefile = $uploaddir."value.txt";
$namefile = $uploaddir."name.txt";
if($value_file){
if(is_uploaded_file($_FILES['value_file']['tmp_name'])) {
if(move_uploaded_file($_FILES['value_file']['tmp_name'], $valuefile)) {
echo '<br><font color=red>Value File updated :</font> <b>value.txt</b> updated successfully.';
create_log($datasetname,"Value file changed");
}
else {
echo '<br><font color=red>Error :</font> Error in updating value file. Error Code :'.$_FILES['value_file']['error'];
}
}
else {
echo '<br><font color=red>Error :</font> Unknown error in updating value file!';
}
}

if($name_file){
if(is_uploaded_file($_FILES['name_file']['tmp_name'])) {
if(move_uploaded_file($_FILES['name_file']['tmp_name'], $namefile)) {
echo '<br><font color=red>Name File updated :</font> <b>name.txt</b> updated successfully.';
create_log($datasetname,"Name file changed");
}
else {
echo '<br><font color=red>Error :</font> Error in updating name file. Error Code :'.$_FILES['name_file']['error'];
}
}
else {
echo '<br><font color=red>Error :</font> Unknown error in updating name file!';
}
}



}
echo"<center><h2>Edit Dataset  <b>$datasetname</b></h2></center>";
echo"<form name=datasetselectform action='' method=post>Select your dataset: ".create_dataset_select()."
<input type=hidden name=dtset_submit value='submitted'>
<input type=submit value='Edit Dataset'>
</form>";

if($dtset_submit&&$datasetname){
echo"<br><br><table align=center>
      <form enctype=\"multipart/form-data\" action=\"\" method=\"post\" >
      <tr>
        <td>Dataset Name: </td>
        <td><input type=\"text\" name=\"datasetname\" size=\"20\" value=\"$datasetname\"></td>
      </tr>
      <tr>
      <tr>
        <td>Value File: </td>
        <td><input type=\"file\" name=\"value_file\" size=\"20\"></td>
      </tr>
      <tr>
      <tr>
        <td>Name File: </td>
        <td><input type=\"file\" name=\"name_file\" size=\"20\"></td>
      </tr>
      <tr>
        <tr>
        <td colspan=\"2\" align=\"center\">
        <input type=hidden name=\"old_datasetname\" value=\"$datasetname\">
        <input type=\"submit\" name=\"edit_dataset_submit\" value=\"Update Dataset\" >
        </td>
      </tr>
      <tr>
        <td colspan=\"2\" align=\"center\">
        </td>
      </tr>
      </form>
      </table>";
}



?>
