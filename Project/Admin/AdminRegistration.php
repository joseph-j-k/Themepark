<?php include("../Assets/Connection/Connection.php")?>

<?php
if(isset($_POST["btn_submit"]))
{
	$name = $_POST["txt_adminname"];
	$email = $_POST["txt_adminemail"];
	$password = $_POST["txt_adminpassword"];

	
	$insertQry = "INSERT INTO tbl_admin(admin_name, admin_email, admin_password) VALUES('".$name."', '".$email."', '".$password."')";
	if($conn -> query($insertQry))
	{
			echo"<script>
				alert('Inserted');
				window.location.href = 'AdminRegistration.php';
			</script>";
            }
            }
            
			
	if(isset($_GET["did"]))
            {
		$deleteQry = "DELETE from tbl_admin where admin_id = '".$_GET["did"]."'";
        
        	
		if($conn -> query($deleteQry))
		{
			
			echo"<script>
				alert('Deleted');
				window.location.href = 'AdminRegistration.php';
			</script>";
			
			}
		
		}		
        ?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin registration</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">Admin Registration</h1>
  <table width="200" border="1"align="center">
    <tr>
      <td>Admin_name</td>
      <td><label for="txt_adminname"></label>
      <input type="text" name="txt_adminname" id="txt_adminname" />
      </td>
    </tr>
    <tr>
      <td>Admin_email</td>
      <td><label for="txt_Adminemail"></label>
      <input type="text" name="txt_adminemail" id="txt_adminemail" /></td>
    </tr>
    <tr>
      <td>Admin_password</td>
      <td><label for="txt_adminpassword"></label>
      <input type="text" name="txt_adminpassword" id="txt_adminpassword" /></td>
    </tr>
    <tr>
      <td colspan="2"align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      
      </td>
    </tr>
  </table>
  <br /><br />
  <table width="200" border="1"align="center">
    <tr>
      <td>Slno</td>
      <td>Name</td>
      <td>Email</td>
      <td>Password</td>
      <td>Action</td>
    </tr>
    <?php 
	$i=0;
	$selectQry = "SELECT * From tbl_admin";
	$result = $conn -> query($selectQry);
	while($data = $result -> fetch_assoc())
	{
		$i++;
     ?>
    <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data["admin_name"]?></td>
    <td><?php echo $data["admin_email"] ?></td>
    <td><?php echo $data["admin_password"] ?></td>
    <td><a href="Admin_reg.php?did=<?php echo $data["admin_id"]?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>