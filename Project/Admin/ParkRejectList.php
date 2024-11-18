<?php include("Head.php"); ?>

<?php include("../Assets/Connection/Connection.php"); ?>
<?php 

if(isset($_GET["accept"]))
{
	$update = "update tbl_park set park_status = '1' where  park_id = '".$_GET["accept"]."'";
	if($conn -> query($update))
	{
		echo "<script>	
				alert('Accepted');
			    window.location='ParkAcceptList.php';
			  </script>";
		
		}
	
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Park Accepted List</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }

    form {
        width: 100%;
        padding: 25px;
        background-color:#869897;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin-top: 100px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }

    th, td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    td {
        background-color: #9ABFAB;
    }

    .actions a {
        text-decoration: none;
        padding: 8px 15px;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        margin-right: 10px;
        display: inline-block;
    }

    .actions a.delete {
        background-color: #f44336;
    }

    .actions a:hover {
        opacity: 0.8;
    }

    img {
        border-radius: 5px;
    }

    input[type="submit"], .actions a {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
    }

    input[type="submit"]:hover, .actions a:hover {
        background-color: #45a049;
    }

</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td>SlNo</td>
      <td>License Number</td>
      <td>Name</td>
      <td>Email</td>
      <td>Address</td>
      <td>Photo</td>
      <td>Proof</td>
      <td>District</td>
      <td>Place</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0; 
	$sel = "select * from tbl_park pa inner join tbl_place p on p.place_id = pa.place_id inner join tbl_district d on d.district_id = p.district_id where park_status = '2' ";
	$result = $conn -> query($sel);
	while($data = $result -> fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['park_license'] ?></td>
      <td><?php echo $data['park_name'] ?></td>
      <td><?php echo $data['park_email'] ?></td>
      <td><?php echo $data['park_address'] ?></td>
      <td><img src="../Assets/File/Park/Photo/<?php echo $data['park_photo'] ?>" width="50" height="50"/></td>
      <td><img src="../Assets/File/Park/Proof/<?php echo $data['park_proof'] ?>" width="50" height="50"/></td>
      <td><?php echo $data['district_name'] ?></td>
      <td><?php echo $data['place_name'] ?></td>
      <td>
      <a href="ParkRejectList.php?accept=<?php echo $data['park_id'] ?>">Accept</a>
      </td>
    </tr>
    <?php } ?>
  </table>

</form>
</body>
</html>

<?php include("Foot.php"); ?>