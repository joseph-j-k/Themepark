<?php 
include("../Assets/Connection/Connection.php");
include("Head.php");
?>

<?php
if(isset($_POST["btn_submit"]))
{
	$name = $_POST["txt_name"];
	$email = $_POST["txt_email"];
	$contact = $_POST["txt_contact"];
	$password = $_POST["txt_password"];
	$address = $_POST["txt_address"];
	
	$photo=$_FILES["photo"]["name"];
	$temp=$_FILES["photo"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/File/User/Photo/'.$photo);
	
	$proof=$_FILES["proof"]["name"];
	$temp=$_FILES["proof"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/File/User/Proof/'.$proof);
	
	$place = $_POST["selPlace"];
	
	
    $insertQry = "INSERT INTO tbl_user(user_name, user_email, user_contact, user_password, user_address, user_photo, user_proof, place_id) 
	VALUES('".$name."', '".$email."', '".$contact."', '".$password."', '".$address."', '".$photo."', '".$proof."', '".$place."')";
	
	if($conn -> query($insertQry))
	{
			echo"<script>
				alert('Inserted');
				window.location.href = 'UserRegistration.php';
			</script>";
            }
                      	
		}
	?>
<br />
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Registration</title>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    h1 {
        font-size: 36px;
        color: #333;
        margin: 20px;
        text-align: center;
        animation: fadeIn 2s ease-in-out;
    }

    .form-container {
        width: 70%;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        animation: slideUp 1.5s ease-out;
    }

    table {
        width: 100%;
        border-spacing: 15px;
    }

    td {
        padding: 8px;
        font-size: 16px;
        color: #333;
    }

    input[type="text"], input[type="file"], textarea, select {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 14px;
    }

    input[type="submit"], input[type="reset"] {
        padding: 10px 20px;
        background-color: #5cb85c;
        border: none;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #4cae4c;
    }

    select, option {
        font-size: 14px;
    }

    .form-footer {
        text-align: center;
        margin-top: 20px;
    }

    /* Animation for fading in */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    /* Animation for sliding up */
    @keyframes slideUp {
        from {
            transform: translateY(50px);
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
<div class="form-container">  
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<h1 align="center">User Registration</h1>
  <table align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" pattern="[+0-9]{10,13}" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" autocomplete="off" required minlength="8" 
            maxlength="20" 
            pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}" 
            required/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5" autocomplete="off" required></textarea></td>
    </tr>
    <tr>
      <td>District</td>
      <td>
      <select onchange="getplace(this.value)" autocomplete="off" required>
      <option>---District---</option>
      <?php 
	  $selectQry = "select * from tbl_district";
	  $result = $conn -> query($selectQry);
	  while($data = $result -> fetch_assoc())
	  {
	  ?>
      <option value="<?php echo $data["district_id"] ?>"><?php echo $data["district_name"] ?></option>
      <?php } ?>
      </select>
      </td>
    </tr>
  <tr>
      <td>Place</td>
      <td><select name="selPlace" id="selPlace" autocomplete="off" required>
      <option>--Place---</option>
       </select></td>
    </tr>
    <tr>
    <tr>
      <td>Photo</td>
      <td><label for="photo"></label>
      <input type="file" name="photo" id="photo" autocomplete="off" required/></td>
    </tr>
    <tr>
    <tr>
      <td>Proof</td>
      <td><label for="proof"></label>
      <input type="file" name="proof" id="proof" autocomplete="off" required/></td>
    </tr>
    <tr class="form-footer">
      <td colspan ="2"align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="cancel" />
     </td>
    </tr>
  </table>
</form>
</div>
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
<br />
<?php include("Foot.php"); ?>
