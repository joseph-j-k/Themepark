<?php include("../Assets/Connection/Connection.php")?>
<?php

if(isset($_POST["btn_submit"]))
{
	$place = $_POST["txt_place"];
	$pincode = $_POST["txt_pincode"];
	$district = $_POST["selDistrict"];


	$insertQry = "INSERT INTO tbl_place(place_name, place_pincode, district_id) VALUES('".$place."', '".$pincode."', '".$district."')";
	if($conn -> query($insertQry)) 
	{
			echo"<script>
				alert('Inserted');
				window.location.href = 'Place.php';
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
				window.location.href = 'Place.php';
			</script>";
			
			}
		
		}		
        ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
<style>
    /* General body styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f9;
        color: #333;
    }
    h1 {
        color: #444;
    }

    /* Center alignment */
    h1, table {
        text-align: center;
    }

    /* Form styling */
    form {
        width: 50%;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Table styling */
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 12px;
        text-align: center;
    }
    th {
        background-color: #f4f4f4;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Input and select styling */
    input[type="text"], select, input[type="submit"], input[type="reset"] {
        width: 90%;
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    input[type="submit"], input[type="reset"] {
        width: 45%;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }
    input[type="reset"] {
        background-color: #d9534f;
    }

    /* Delete link styling */
    a {
        text-decoration: none;
        color: #d9534f;
        font-weight: bold;
    }
    a:hover {
        color: #c9302c;
    }
</style>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <h1 align="center">Place</h1>
  <table width="200" border="1"align="center">
    <tr>
      <td>District</td>
      <td><label for="selDistrict"></label>
        <select name="selDistrict" id="selDistrict" required>
          <option>---Select---</option>
          <?php
	  $selectQry = "select * from tbl_district"; 
	  $result = $conn -> query($selectQry);
	  while($data = $result -> fetch_assoc())
	  {
	  ?>
          <option value="<?php echo $data["district_id"]?>"><?php echo $data["district_name"]?></option>
          <?php } ?>
        </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
        <input type="text" name="txt_place" id="txt_place" /></td>
    </tr>
    <tr>
      <td>Pincode</td>
      <td><label for="txt_pincode"></label>
        <input type="text" name="txt_pincode" id="txt_pincode" required/></td>
    </tr>
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
   <br /><br />
  <table width="200" border="1"align="center">
    <tr>
      <td>Slno</td>
      <td>District</td>
      <td>Place</td>
      <td>Pincode</td>
      <td>Action</td>
    </tr>
    <?php 
	$i=0;
	$selectQry = "SELECT * From tbl_place p inner join tbl_district d on d.district_id = p.district_id ";
	$result = $conn -> query($selectQry);
	while($data = $result -> fetch_assoc())
	{
		$i++;
     ?>
    
    <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data["district_name"]?></td>
    <td><?php echo $data["place_name"]?></td>
    <td><?php echo $data["place_pincode"]?></td>
    <td><a href="place.php?did=<?php echo $data["place_id"]?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>