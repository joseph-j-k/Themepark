<?php  
include("../Assets/Connection/Connection.php");
session_start(); 

if(isset($_POST["txt_submit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	
		
	
$updQry="update tbl_branch set branch_name = '".$name."', branch_email ='".$email."' where branch_id = '".$_SESSION["bid"]."'";
 
if($conn -> query($updQry))
{
	echo"<script>
				alert('Updated');
				window.location.href = 'Editprofile.php';
			</script>";
	}
}

	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editprofile</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">Editprofie</h1>
<?php
$sel = "select * from tbl_branch where branch_id ='".$_SESSION["bid"]."'";
$result = $conn -> query($sel);
$data = $result -> fetch_assoc();
?>
  <table width="200" border="1"align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" value="<?php echo $data["branch_name"]?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" value="<?php echo $data["branch_email"]?>"/></td>
    </tr>
    <tr>
      <td colspan="2"align="center">
      <input type="submit" name="txt_submit" id="txt_submit" value="Edit" /></td>
    </tr>
  </table>
</form>
</body>
</html>