<?php include("Head.php"); ?>

<?php 
if(isset($_POST["btn_save"]))
{
	
	$selQry = "select * from tbl_user where user_id = '".$_SESSION["uid"]."'";
	$result = $conn -> query($selQry);
	$data = $result -> fetch_assoc();
	
	$oldPassword = $data["user_password"];
	$currentPassword = $_POST["txt_currentPassword"];
	$newPassword = $_POST["text_newPassword"];
	$confirmPassord = $_POST["txt_confirmPassword"];
	
	
	if($oldPassword == $currentPassword)
	{
		
		if($newPassword == $confirmPassord)
		{
			
			
			$update = "update tbl_user set user_password = '".$newPassword."' where user_id = '".$_SESSION["uid"]."'";
			
			if($conn -> query($update))
			{
				
				
				echo"<script>
				alert('updated');
				window.location ='ChangePassword.php';
				</script>";
				
				}
				
			
			
			
			}
			
			else{
					
					echo"<script>
				alert('Password Inccorect, Please try again broh');
				window.location ='ChangePassword.php';
				</script>";
					
					
					}
		
		}
		
		
		else{
					
			    echo"<script>
				alert('InValid Current Password Man');
				window.location ='ChangePassword.php';
				</script>";
					
					
					}
	
	
	
	}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
  }

  .h1 {
    color: #333;
    text-align: center;
    margin-top: 20px;
    font-size: 24px;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  table {
    border-collapse: collapse;
    margin: 20px auto;
    width: 40%;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
  }

  table td {
    padding: 12px 20px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    color: #555;
    font-size: 14px;
  }

  table td:first-child {
    font-weight: bold;
    width: 40%;
    text-align: right;
  }

  table input[type="text"] {
    width: 90%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  table tr:last-child td {
    border-bottom: none;
  }

  table tr:nth-child(odd) {
    background-color: #f9f9f9;
  }

  table tr:hover {
    background-color: #f1f1f1;
  }

  table td[colspan="2"] {
    text-align: center;
    background-color: #e7f3ff;
    padding: 15px;
  }

  input[type="submit"] {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  input[type="submit"]:hover {
    background-color: #0056b3;
  }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center" class="h1">Change Password</h1>
  <table border="1" align="center">
    <tr>
      <td>Current&nbsp;Password</td>
      <td><label for="txt_currentPassword"></label>
      <input type="text" name="txt_currentPassword" id="txt_currentPassword" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td>New&nbsp;Password</td>
      <td><label for="text_newPassword"></label>
      <input type="text" name="text_newPassword" id="text_newPassword" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td>Confirm&nbsp;Pasword</td>
      <td><label for="txt_confirmPassword"></label>
      <input type="text" name="txt_confirmPassword" id="txt_confirmPassword" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_save" id="btn_save" value="Change" /></td>
    </tr>
  </table>
</form>
</body>
</html>

<?php include("Foot.php"); ?>