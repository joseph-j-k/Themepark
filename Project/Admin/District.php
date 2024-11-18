<?php include("../Assets/Connection/Connection.php")?>

<?php
$name="";
if(isset($_POST["btn_submit"]))
{
	$name = $_POST["txt_districtname"];
	
	$insertQry = "INSERT INTO tbl_district(district_name) VALUES('".$name."')";
	if($conn -> query($insertQry))
	{
			echo"<script>
				alert('Inserted');
				window.location.href = 'District.php';
			</script>";
            }
            }
			if(isset($_GET["did"]))
            {
		$deleteQry = "DELETE from tbl_district where district_id = '".$_GET["did"]."'";
        
        	
		if($conn -> query($deleteQry))
		{
			
			echo"<script>
				alert('Deleted');
				window.location.href = 'District.php';
			</script>";
			
			}
		
		}		
        ?>
	
	
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
<style>
    /* General body styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
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

    /* Input styling */
    input[type="text"], input[type="submit"], input[type="reset"] {
        width: 90%;
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    input[type="submit"], input[type="reset"] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }
    input[type="reset"] {
        background-color: #d9534f;
    }

    /* Delete button styling */
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
<h1 align="center">District</h1>
  <table width="200" border="1"align="center">
    <tr>
      <td>District_name</td>
      <td><label for="txt_districtname"></label>
      <input type="text" name="txt_districtname" id="txt_districtname" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </td>
    </tr>
  </table>
     <br /><br />
      <h1 align="center">View</h1>
       <br /><br />
   <table width="200" border="1"align="center"> 
     <tr>
       <td>Slno</td>
       <td>name</td>
       <td>Action</td>
     </tr>
	  <?php 
	$i=0;
	$selectQry = "SELECT * From tbl_district";
	$result = $conn -> query($selectQry);
	while($data = $result -> fetch_assoc())
	{
		$i++;
     ?>
     <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data["district_name"]?></td>
    <td><a href="District.php?did=<?php echo $data["district_id"]?>">Delete</a></td>
    </tr>
    <?php } ?>
   </table>
</form>
</body>
</html>