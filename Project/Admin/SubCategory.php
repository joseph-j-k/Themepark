<?php include("../Assets/Connection/Connection.php")?>
<?php

if(isset($_POST["btn_submit"]))
{
	$Category = $_POST["sel_category"];
	$subCategory = $_POST["txt_SubCategory"];
	
	$insertQry = "INSERT INTO tbl_subcategory(subCategory_name, category_id) VALUES('".
	$subCategory."', '".$Category."')";
	if($conn -> query($insertQry)) 
	{
		echo"<script>
		alert('Inserted');
				window.location.href = 'SubCategory.php';
		</script>";
	}
	}
					
	if(isset($_GET["did"]))
            {
		$deleteQry = "DELETE from tbl_subcategory where category_id = '".$_GET["did"]."'";
        
        	
		if($conn -> query($deleteQry))
		{
			
			echo"<script>
				alert('Deleted');
				window.location.href = 'SubCategory.php';
			</script>";
			
			}
		
		}		
        ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SubCategory</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">SubCategory</h1>
  <table width="200" border="1"align="center">
    <tr>
      <td>Category</td>
      <td>
      <label for="sel_category"></label>
      <select name="sel_category" id="sel_category" />
      <option>--Select--</option>
      <?php
      $selectQry = "select * from tbl_category"; 
	  $result = $conn -> query($selectQry);
	  while($data = $result -> fetch_assoc())
	  {
	  ?>
      <option value="<?php echo $data["category_id"]?>"><?php echo $data["category_name"]?></option>
      <?php } ?>
        </select></td>
    </tr>
    <tr>
      <td>SubCategory</td>
      <td><label for="txt_SubCategory"></label>
      <input type="text" name="txt_SubCategory" id="txt_SubCategory" /></td>
    </tr>
    <tr>
      <td colspan ="2"align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="cancel" />
         
    </tr>
  </table>
  <br /><br />
  <table width="200" border="1"align="center">
    <tr>
      <td>Slno</td>
      <td>Category</td>
      <td>SubCategory</td>
      <td>Action</td>
    </tr>
    <?php 
	$i=0;
	$selectQry = "SELECT * From tbl_subcategory s inner join tbl_category c on c.category_id = s.category_id";
	$result = $conn -> query($selectQry);
	while($data = $result -> fetch_assoc())
	{
		$i++;
     ?>
    <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data["category_name"]?></td>
    <td><?php echo $data["subCategory_name"] ?></td>
    <td><a href="SubCategory.php?did=<?php echo $data["subCategory_id"]?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>