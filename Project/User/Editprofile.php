
<?php include("Head.php"); ?>

<?php  
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	
	
$updQry="update tbl_user set user_name = '".$name."', user_email ='".$email."' where user_id = '".$_SESSION["uid"]."'"; 

if($conn ->query($updQry))
{
	echo"<script>
	alert('updated');
	window.location ='Editprofile.php';
	</script>";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EditProfile</title>
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

  table input[type="text"] {
    width: calc(100% - 20px);
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
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
<h1 align="center">EditProfile</h1>
<?php
$sel = "select * from tbl_user where user_id ='".$_SESSION["uid"]."'";
$result = $conn -> query($sel);
$data = $result -> fetch_assoc();
?>
  <table  border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      	<input type="text" name="txt_name"value="<?php echo $data["user_name"]?>" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      	<input type="text" name="txt_email"value="<?php echo $data["user_email"]?>" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Edit" />
      </td>
    </tr>
   
  </table>  
</form>
</body>
</html>

<?php include("Foot.php"); ?>