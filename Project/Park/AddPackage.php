<?php include("Head.php"); ?>

<?php 
if(isset($_POST["btnSubmit"]))
{
    $package = $_POST["txt_name"];
    $details = $_POST["txt_details"];
    $price = $_POST["txt_price"];
    
    $photo = $_FILES["photo"]["name"];
    $temp = $_FILES["photo"]["tmp_name"];
    move_uploaded_file($temp, '../Assets/File/Park/Package/'.$photo);
    
    $category = $_POST["selCategory"];
    
    $insertQry = "INSERT INTO tbl_package(package_name, package_detail, package_photo, package_price,  category_id, park_id) 
    VALUES('".$package."', '".$details."', '".$photo."', '".$price."', '".$category."', '".$_SESSION["pid"]."')";
    
    if($conn -> query($insertQry))
    {
        echo"<script>
            alert('Inserted');
            window.location.href = 'AddPackage.php';
        </script>";
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Packages</title>
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
        max-width: 800px;
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

    td {
        padding: 12px;
        text-align: left;
        background-color: #f9f9f9;
    }

    td input[type="text"], td textarea, td select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    td input[type="file"] {
        padding: 10px;
        font-size: 16px;
    }

    td input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        font-size: 18px;
        cursor: pointer;
        border-radius: 5px;
        width: 100%;
        border: none;
        transition: background-color 0.3s ease;
    }

    td input[type="submit"]:hover {
        background-color: #45a049;
    }

    label {
        font-size: 18px;
        color: #333;
    }

    select {
        font-size: 16px;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
    <h1>Add Packages</h1>
    <div class="container">
        <table>
            <tr>
                <td>Package Name</td>
                <td><input type="text" name="txt_name" id="txt_name" required /></td>
            </tr>
            <tr>
                <td>Details</td>
                <td><textarea name="txt_details" id="txt_details" cols="45" rows="5" required></textarea></td>
            </tr>
            <tr>
                <td>Category</td>
                <td>
                    <select name="selCategory" id="selCategory" required>
                        <option value="">--Category--</option>
                        <?php 
                        $selectQry = "select * from tbl_category";
                        $result = $conn -> query($selectQry);
                        while($data = $result -> fetch_assoc()) {
                        ?>
                        <option value="<?php echo $data["category_id"] ?>"><?php echo $data["category_name"] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="txt_price" id="txt_price" required /></td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><input type="file" name="photo" id="photo" required /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnSubmit" id="btnSubmit" value="Add" />
                </td>
            </tr>
        </table>
    </div>
</form>
</body>
</html>

<?php include("Foot.php"); ?>
