<?
$error=0;
$user = _check_auth($_COOKIE);
if(!$add_dataset_submit&&is_dir($user_dir."/".$user['user_name'])) {
echo"<center><h2>Add New Dataset</h2></center><table align=center>
      <form enctype=\"multipart/form-data\" action=\"\" method=\"post\" >
      <tr>
        <td>Dataset Name: </td>
        <td><input type=\"text\" name=\"datasetname\" size=\"20\"></td>
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
          <input type=\"submit\" name=\"add_dataset_submit\" value=\"Create New Dataset\" >
        </td>
      </tr>
      <tr>
        <td colspan=\"2\" align=\"center\">
        </td>
      </tr>
      </form>
      </table>";
       }

elseif($add_dataset_submit){
$datasetname=replace_tr($datasetname);
if(check_dataset($datasetname)==0){
//echo $databasename;
if(mkdir($user_dir."/".$user['user_name']."/".$datasetname,777))
{echo "Dataset folder created as <b>$datasetname</b>.";
create_log($datasetname,"Dataset created");
$uploaddir= $user_dir."/".$user['user_name']."/".$datasetname."/";
$valuefile = $uploaddir."value.txt";
$namefile = $uploaddir."name.txt";
if(is_uploaded_file($_FILES['value_file']['tmp_name'])) {
if(move_uploaded_file($_FILES['value_file']['tmp_name'], $valuefile)) {
echo '<br><b>value.txt</b> uploaded successfully.';
create_log($datasetname,"Value file uploaded");
}
else {
echo '<br>Error in uploading. Error Code :'.$_FILES['value_file']['error'];
}
}
else {
echo '<br>Unknown error in uploading.!';
}

if(is_uploaded_file($_FILES['name_file']['tmp_name'])) {
if(move_uploaded_file($_FILES['name_file']['tmp_name'], $namefile)) {
echo '<br><b>name.txt</b> uploaded successfully.';
create_log($datasetname,"Name file uploaded");
}
else {
echo '<br>Error in uploading. Error Code :'.$_FILES['name_file']['error'];
}
}
else {
echo '<br>Unknown error in uploading.!';}


}
else {echo "Error creating dataset folder!";}


}

else {echo "<b>$datasetname</b> dataset is already exist... Please choose another name for your dataset.";}






}

?>
