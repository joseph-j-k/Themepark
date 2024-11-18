<?php include("../Assets/Connection/Connection.php");?>
<?php
$licenseNumber = "CIN – U12345MH2024PTC567890";

if(isset($_POST["btn_submit"]))
{
	$name = $_POST["txt_name"];
	$email = $_POST["txt_email"];
	$contact = $_POST["txt_contact"];
	$password = $_POST["txt_password"];
	$address = $_POST["txt_address"];

	$photo = $_FILES["photo"]["name"];
	$temp = $_FILES["photo"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/File/Park/Photo/'.$photo);
	
	$place = $_POST["selPlace"];
	
	  $insertQry = "INSERT INTO  tbl_branch(branch_name, branch_email, branch_contact, branch_address, branch_password, branch_photo, place_id) 
VALUES('".$name."', '".$email."', '".$contact."', '".$address."', '".$password."','".$photo."', '".$place."')";
	
	if($conn -> query($insertQry))
	{
			echo"<script>
				alert('Inserted');
				window.location.href = 'Branch.php';
			</script>";
            }
                      	
		}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Branch</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <h1 align="center">Add Branch</h1>
  <table width="200" border="1"align="center">
    <tr align="center">
      <td>Branch&nbsp;Name</td>
      <td><label for="txt_name"></label>
        <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr align="center">
      <td>Email</td>
      <td><label for="txt_email"></label>
        <input type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr align="center">
      <td>Contact</td>
      <td><label for="txt_contact"></label>
        <input type="text" name="txt_contact" id="txt_contact" /></td>
    </tr>
    <tr align="center">
      <td>Password</td>
      <td><label for="txt_password"></label>
        <input type="text" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr align="center">
      <td>Address</td>
      <td><label for="txt_address"></label>
        <textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>
    </tr>
    <tr align="center">
      <td>Distrct</td>
      <td><select onchange="getplace(this.value)">
          <option>--District---</option>
          <?php 
	  $selectQry = "select * from tbl_district";
	  $result = $conn -> query($selectQry);
	  while($data = $result -> fetch_assoc())
	  {
	  ?>
          <option value="<?php echo $data["district_id"] ?>"><?php echo $data["district_name"] ?></option>
          <?php } ?>
        </select></td>
    </tr>
    <tr align="center">
      <td>Place</td>
      <td><select name="selPlace" id="selPlace">
          <option>--Place---</option>
        </select></td>
    </tr>
    <tr align="center">
      <td>Photo</td>
      <td><label for="photo"></label>
        <input type="file" name="photo" id="photo" /></td>
    </tr>
    <tr>
      <td colspan ="2"align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
</form>
<script src="../Assets/JQ/jQuery.js"></script> 
<script>
	function getplace(pid)
	{
		$.ajax({
			url: "../Assets/AjaxPages/AjaxPlace.php?pid="+pid,
			success: function(html)
			{
				$("#selPlace").html(html)
				
				}	
			});
		
		}
</script>
</body>
</html>