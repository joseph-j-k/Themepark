<?php include("../Assets/Connection/Connection.php")?>

<?php

if(isset($_POST["btn_submit"]))
{
	$place = $_POST["txt_place"];
	$pincode = $_POST["txt_pincode"];


	$insertQry = "INSERT INTO tbl_place(place,pincode) VALUES('".$place."', '".$pincode."')";
	if($conn -> query($insertQry))
	{
			echo"<script>
				alert('Inserted');
				window.location.href = 'place.php';
			</script>";
            }
            }
					
	if(isset($_GET["did"]))
            {
		$deleteQry = "DELETE from tbl_place where place_id = '".$_GET["did"]."'";
        
        	
		if($conn -> query($deleteQry))
		{
			
			echo"<script>
				alert('Deleted');
				window.location.href = 'place.php';
			</script>";
			
			}
		
		}		
        ?>
       









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">Place</h1>
  <table width="200" border="1"align="center">
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
      <input type="text" name="txt_place" id="txt_place" /></td>
    </tr>
    <tr>
      <td>Pincode</td>
      <td><label for="txt_pincode"></label>
      <input type="text" name="txt_pincode" id="txt_pincode" /></td>
    </tr>
    <tr>
      <td colspan="2"align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
  <br /><br />
  <h1 align="center">view</h1>
  <table width="200" border="1"align="center">
    <tr>
      <td>SL.No</td>
      <td>Place</td>
      <td>Pincode</td>
      <td>Action</td>
    </tr>
     <?php 
	$i=0;
	$selectQry = "SELECT * From tbl_place";
	$result = $conn -> query($selectQry);
	while($data = $result -> fetch_assoc())
	{
		$i++;
     ?>
   
      <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data["place"]?></td>
    <td><?php echo $data["pincode"] ?></td>
    <td><a href="place.php?did=<?php echo $data["place_id"]?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>