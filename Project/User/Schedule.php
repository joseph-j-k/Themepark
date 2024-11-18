<?php  include("Head.php"); ?>

<?php
$select = "select * from tbl_package";
$result = $conn -> query($select);
$data = $result -> fetch_assoc();
$amount = $data["package_price"];



if(isset($_POST["btn_submit"]))
{
	$count = $_POST["txt_headcount"];
    $toDate = $_POST["txt_date"];
	
	$insertQry = "insert into tbl_booking (booking_head , booking_to_date, booking_date, booking_amount,  package_id, user_id ) values('".$count."', '".$toDate."', curdate(), '".$amount."',  '".$_GET["pid"]."', '".$_SESSION["uid"]."')";  
	if($conn -> query($insertQry))
	{

        $lastInsertedId = $conn->insert_id;
        $_SESSION["bid"] = $lastInsertedId;
		
		echo"<script>
				alert('Inserted');
				window.location.href = 'Payment.php';
			</script>";

            
		
		
		}
	
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Schedule</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
  }

  .h1 {
    color: #333;
    text-align: center;
    margin-top: 20px;
    font-size: 24px;
    text-transform: uppercase;
    letter-spacing: 1px;
    animation: fadeIn 1s ease-in-out;
  }

  table {
    border-collapse: collapse;
    margin: 20px auto;
    width: 50%;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    animation: slideIn 1s ease-out;
  }

  table td {
    padding: 12px 20px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    color: #555;
    font-size: 14px;
  }

  table td:first-child {
    font-weight: bold;
    width: 40%;
    text-align: right;
  }

  table input[type="text"], 
  table input[type="date"] {
    width: 90%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    transition: all 0.3s ease;
  }

  table input[type="text"]:focus,
  table input[type="date"]:focus {
    border-color: #007bff;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
  }

  table tr:last-child td {
    border-bottom: none;
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
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  input[type="submit"]:hover {
    background-color: #0056b3;
    transform: scale(1.05);
  }

  .a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
    margin-left: 15px;
    transition: color 0.3s ease;
  }

  .a:hover {
    color: #0056b3;
  }

  /* Animations */
  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }

  @keyframes slideIn {
    from {
      transform: translateY(-20px);
      opacity: 0;
    }
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center" class="h1">Select Schedule</h1>
  <table  border="1" align="center">
    <tr>
      <td>HeadCount</td>
      <td><label for="txt_headcount"></label>
      <input type="text" name="txt_headcount" id="txt_headcount" value="" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td>To Date</td>
      <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" value="" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td colspan ="2"align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="schedule" />      
      </td>
    </tr>
  </table>
</form>
</body>
</html>

<?php  include("Foot.php"); ?>