<?php  
include("../Assets/Connection/Connection.php");
session_start();
?>

<?php 
	
if(isset($_POST["btn_submit"]))
{
$email=$_POST["txt_email"];
$password=$_POST["txt_password"];
$seladmin="select *from tbl_admin where admin_email ='".$email."' and  admin_password ='".$password."' ";
$seluser="select *from tbl_user where  user_email ='".$email."' and   user_password ='".$password."'" ;
$selPark="select * from tbl_park where  park_email ='".$email."' and   park_password ='".$password."'" ;
$selBranch = "select * from tbl_branch where  branch_email ='".$email."' and  branch_password ='".$password."'" ;



$result1 =$conn -> query($seladmin);
$result2 = $conn -> query($seluser);
$result3 =$conn -> query($selPark);
$result4 =$conn -> query($selBranch);



if($dataAdmin = $result1 -> fetch_assoc())
{
	$_SESSION["aid"] = $dataAdmin["admin_id"];
	$_SESSION["adminname"] = $dataAdmin["admin_name"];
	header("Location:../admin/Dashboard.php");
}

else if($dataUser = $result2 -> fetch_assoc())
{
	$_SESSION["uid"] = $dataUser["user_id"];
	$_SESSION["uname"] = $dataUser["user_name"];
	header("Location:../User/Homepage.php");
}
else if($dataPark = $result3 -> fetch_assoc())
{    
  if($dataPark['park_status'] == 1)
		{
	$_SESSION["pid"] = $dataPark["park_id"];
	$_SESSION["pname"] = $dataPark["park_name"];
	header("Location:../Park/Homepage.php");
  }
  else if($dataPark['park_status'] == 2)
    { 
      echo"<script>
      alert('Reject');
        </script>";
    }
    else{
      echo"<script>
      alert('Pending');
        </script>";
    }
	
}
else if($dataBranch = $result4 -> fetch_assoc())
{    
	$_SESSION["bid"] =$dataBranch["branch_id"];
	$_SESSION["bname"] = $dataBranch["branch_name"];
	header("Location:../Branch/Homepage.php");
	
}

}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">Login</h1>
    <table width="200" border="1"align="center">
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
      <td colspan ="2"align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="cancel" />
      </td>
    </tr>
    <td colspan="2" align="right">
    <a herf="">NewUser</a>
    <a herf="">NewStaff</a>
    </td>
    </tr>
  </table>
</form>
</body>
</html>