<?php include("Head.php"); ?>
<?php  
if(isset($_POST["txt_submit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	
		
	
$updQry="update tbl_park set park_name = '".$name."', park_email ='".$email."' where park_id = '".$_SESSION["pid"]."'";
 
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

    th, td {
        padding: 12px;
        text-align: left;
    }

    td {
        background-color: #f9f9f9;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 18px;
        cursor: pointer;
        border-radius: 5px;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
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
<h1 align="center">Editprofie</h1>
<?php
$sel = "select * from tbl_park where park_id ='".$_SESSION["pid"]."'";
$result = $conn -> query($sel);
$data = $result -> fetch_assoc();
?>
<div class="container">
  <table align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" value="<?php echo $data["park_name"]?>" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" value="<?php echo $data["park_email"]?>" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td colspan="2"align="center">
      <input type="submit" name="txt_submit" id="txt_submit" value="Edit" /></td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>

<?php include("Foot.php"); ?>