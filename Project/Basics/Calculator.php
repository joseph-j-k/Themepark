<?php 
$result = "";
if(isset($_POST["btn_add"]))
{
	$number1 = $_POST["txt_number1"];
	$number2 = $_POST["txt_number2"];
	
	$result = $number1 + $number2;
	}
	
if(isset($_POST["btn_sub"]))
{
	$number1=$_POST["txt_number1"];
	$number2=$_POST["txt_number2"];
	$result=$number1-$number2;	
}


if(isset($_POST["txt_mul"]))
{
	$number1=$_POST["txt_number1"];
	$number2=$_POST["txt_number2"];
	$result=$number1*$number2;
}

if(isset($_POST["bnt_div"]))
{
	$number1=$_POST["txt_number1"];
	$number2=$_POST["txt_number2"];
	
	$result = $number1 / $number2;
}
		


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calculator</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">Calculator</h1>
  <table width="200" border="1" align="center">
    <tr>
      <td>Number1</td>
      <td><label for="txt_number1"></label>
      <input type="text" name="txt_number1" id="txt_number1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="txt_number2"></label>
      <input type="text" name="txt_number2" id="txt_number2" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_add" id="btn_add" value="+" />
      <input type="submit" name="btn_sub" id="btn_sub" value="-" />
      <input type="submit" name="btn_mul" id="btn_mul" value="*" />
      <input type="submit" name="bnt_div" id="bnt_div" value="/" />
      </td>
    </tr>
    <tr>
      <td>Result   </td>
      <td><?php echo $result ?></td>
    </tr>
  </table>
</form>
</body>
</html>