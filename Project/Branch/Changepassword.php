<?php
include("../Assets/connection/connection.php");
session_start();

if(isset($_POST["btn_save"]))
{
	$selQry="select * from tbl_branch where branch_id = '".$_SESSION["bid"]."'";
	$result = $conn -> query($selQry);
	$data = $result -> fetch_assoc();
	
	$oldPassword = $data["branch_password"];
	$currentPassword = $_POST["txt_currentpassword"];
	$newPassword = $_POST["txt_newpassword"];
	$confirmPassord = $_POST["txt_confirmpassword"];
	
	if($oldPassword  == $currentPassword)
	{
		if($newPassword == $confirmPassord)
		{
			$update= "update  tbl_branch set branch_password='".$newPassword."' where branch_id ='".$_SESSION["bid"]."'";
			
		if($conn -> query($update))
			{
				
				
				echo"<script>
				alert('updated');
				window.location ='Changepassword.php';
				</script>";
				
				}
				
			
			
			
			}
			
			else{
					
					echo"<script>
				alert('Password Inccorect, Please try again broh');
				window.location ='Changepassword.php';
				</script>";
					
					
					}
		
		}
		
		
		else{
					
			    echo"<script>
				alert('InValid Current Password Man');
				window.location ='Changepassword.php';
				</script>";
					
					
					}
	
	
	
	}


	
	
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ChangePassword</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <h1 align="center">Change Password</h1>
  <table width="200" border="1"align="center">
    <tr>
      <td>Current&nbsp;Password</td>
      <td><label for="txt_currentpassword"></label>
        <input type="text" name="txt_currentpassword" id="txt_currentpassword" /></td>
    </tr>
    <tr>
      <td>New&nbsp;Password</td>
      <td><label for="txt_newpassword"></label>
        <input type="text" name="txt_newpassword" id="txt_newpassword" /></td>
    </tr>
    <tr>
      <td>Confirm&nbsp;Password</td>
      <td><label for="txt_confirmpassword"></label>
        <input type="text" name="txt_confirmpassword" id="txt_confirmpassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="Change" /></td>
    </tr>
  </table>
</form>
</body>
</html>