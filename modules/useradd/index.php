<?
$error=0;
$user = _check_auth($_COOKIE);
if(!$add_submit) {
echo"<center><h2>Add New User</h2></center><table align=center>
      <form action=\"\" method=\"post\" >
        <tr>
        <td>Name: </td>
        <td><input type=\"text\" name=\"name\" size=\"20\"></td>
      </tr>
      <tr>
      <tr>
        <td>Surname: </td>
        <td><input type=\"text\" name=\"surname\" size=\"20\"></td>
      </tr>
      <tr>
      <tr>
        <td>e-mail: </td>
        <td><input type=\"text\" name=\"email\" size=\"20\"></td>
      </tr>
      <tr>
      <tr>
        <td>Username: </td>
        <td><input type=\"text\" name=\"username\" size=\"20\"></td>
      </tr>
      <tr>
        <td>Password: </td>
        <td><input type=\"password\" name=\"userpass\" size=\"20\"></td>
      </tr>
      <tr>
        <td>Password (Confirm): </td>
        <td><input type=\"password\" name=\"userpass1\" size=\"20\"></td>
      </tr>
      <tr>
        <td>User Type: </td>
        <td><select name=\"user_type\"><option>user</option><option>admin</option></select></td>
      </tr>
      <tr>
        <td colspan=\"2\" align=\"center\">
          <input type=\"submit\" name=\"add_submit\" value=\"Add User\" >
        </td>
      </tr>
      <tr>
        <td colspan=\"2\" align=\"center\">
        </td>
      </tr>
      </form>
      </table>";
}

else{
if(check_user($username)==0 && $userpass==$userpass1){

$sql="insert into users (user_name,user_pass,name,surname,email,type) values ('$username','$userpass','$name','$surname','$email','$user_type')";
if(mysql_query($sql)&& mkdir("$user_dir/$username",777))
          {echo "User Added...<br>Folder created...";}
else {echo"Error: User could not be added!!";}

} else {echo"User <b>$username</b> already exists or password did not match!";}

}

?>
