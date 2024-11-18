<?php include("Head.php"); ?>
<?php
if(isset($_POST["btn_save"]))
{
	$selQry="select * from tbl_park where park_id = '".$_SESSION["pid"]."'";
	$result = $conn -> query($selQry);
	$data = $result -> fetch_assoc();
	
	$oldPassword = $data["park_password"];
	$currentPassword = $_POST["txt_currentpassword"];
	$newPassword = $_POST["txt_newpassword"];
	$confirmPassord = $_POST["txt_confirmpassword"];
	
	if($oldPassword  == $currentPassword)
	{
		if($newPassword == $confirmPassord)
		{
			$update= "update  tbl_park set park_password='".$newPassword."' where park_id ='".$_SESSION["pid"]."'";
			
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
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
    }

    h1 {
        color: #333;
        font-size: 36px;
        text-align: center;
        margin-top: 50px;
    }

    .container {
        width: 80%;
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    td {
        padding: 12px;
        text-align: left;
        background-color: #f9f9f9;
    }

    td input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    td input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        font-size: 18px;
        cursor: pointer;
        border-radius: 5px;
        width: 100%;
        border: none;
        transition: background-color 0.3s ease;
    }

    td input[type="submit"]:hover {
        background-color: #45a049;
    }

    label {
        font-size: 18px;
        color: #333;
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <h1 align="center">Change Password</h1>

  <div class="container">
  <table align="center">
    <tr>
      <td>Current&nbsp;Password</td>
      <td><label for="txt_currentpassword"></label>
        <input type="text" name="txt_currentpassword" id="txt_currentpassword" autocomplete="off" required /></td>
    </tr>
    <tr>
      <td>New&nbsp;Password</td>
      <td><label for="txt_newpassword"></label>
        <input type="text" name="txt_newpassword" id="txt_newpassword" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td>Confirm&nbsp;Password</td>
      <td><label for="txt_confirmpassword"></label>
        <input type="text" name="txt_confirmpassword" id="txt_confirmpassword" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="Change" /></td>
    </tr>
  </table>
</div>

</form>
</body>
</html>

<?php include("Foot.php"); ?>