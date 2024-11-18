<?php  include("../Assets/Connection/Connection.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<h1 align="center">My Profile</h1>
<?php  
$sel="select * from tbl_branch where branch_id = '".$_SESSION["bid"]."'";
$result =$conn -> query($sel);
$data =$result ->fetch_assoc();
?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1"align="center">
    <tr>
  <td colspan="2"align="center">
  <img src="../Assets/File/Park/Photo/<?php echo $data["branch_photo"]?>" height="300" width="300"/></td>
   </tr>
   <tr>
    <td>Name</td>
    <td><?php echo $data["branch_name"]?></td>
  </tr>
  <tr>
    <td>Email</td> 
     <td><?php echo $data["branch_email"]?></td>
  </tr>
  <tr>
    <td>Password</td>
     <td><?php echo $data["branch_password"]?></td>
  </tr>
   <tr>
  <td colspan="2"align="center">
  <a href="Editprofile.php">Edit profile</a>
  <a href="Changepassword.php">Change password</a>
  </td>
  </tr>
  </table>
</form>
</body>
</html>
