<?php include("Head.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyProfile</title>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
  }

  h1 {
    color: #333;
    text-align: center;
    margin-top: 20px;
  }

  table {
    border-collapse: collapse;
    margin: 20px auto;
    width: 50%;
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
  }

  table td:first-child {
    font-weight: bold;
    width: 30%;
  }

  table img {
    border-radius: 50%;
    margin: 20px 0;
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
  }

  .a {
    text-decoration: none;
    color: #007bff;
    margin: 0 10px;
    font-weight: bold;
  }

  .a:hover {
    color: #0056b3;
    text-decoration: underline;
  }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<h1 align="center">Myprofile</h1>
<?php  
$sel="select * from tbl_user where user_id ='".$_SESSION["uid"]."'";
$result =$conn -> query($sel);
if($data =$result ->fetch_assoc())
{
?>
<table width="200" border="1"align="center">
  <tr>
  <td colspan="2"align="center"><img src="../Assets/File/User/<?php echo $data["user_photo"]?>"height="300" width="300"/></td>
   </tr>
   <tr>
    <td>Name</td>
    <td><?php echo $data["user_name"]?></td>
  </tr>
  <tr>
    <td>Email</td> 
     <td><?php echo $data["user_email"]?></td>
  </tr>
  <tr>
    <td>Password</td>
     <td><?php echo $data["user_password"]?></td>
  </tr>
   <tr>
  <td colspan="2"align="center">
  <a href="Editprofile.php" class="a">Edit profile</a>
  <a href="ChangePassword.php" class="a">Change password</a>
  </td>
  </tr>
  </table>
  <?php }?>
  </form>
   </body>
   </html>
  
  
  </td>
  </tr>
</table>
</body>
</html>

<?php include("Foot.php"); ?>