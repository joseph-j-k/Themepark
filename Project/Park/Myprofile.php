<?php include("Head.php"); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
    }

    h1 {
        color: #333;
        font-size: 36px;
        text-align: center;
        margin-top: 50px;
    }

    .container {
        width: 80%;
        max-width: 900px;
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

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    td {
        background-color: #f9f9f9;
    }

    .img {
        border-radius: 50%;
        width: 200px;
        height: 200px;
        object-fit: cover;
        display: block;
        margin: 0 auto;
    }

    .button-group {
        text-align: center;
        margin-top: 20px;
    }

    .button-group a {
        text-decoration: none;
        color: #fff;
        background-color: #4CAF50;
        padding: 10px 20px;
        border-radius: 5px;
        margin: 0 10px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .button-group a:hover {
        background-color: #45a049;
    }

    .table-row {
        padding: 15px;
        background-color: #f9f9f9;
    }

    .table-row:nth-child(even) {
        background-color: #f2f2f2;
    }

    .edit-links a {
        color: #4CAF50;
        font-size: 16px;
        text-decoration: none;
        margin: 10px;
    }

    .edit-links a:hover {
        color: #45a049;
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<h1>My Profile</h1>

<?php  
$sel = "select * from tbl_park where park_id ='" . $_SESSION["pid"] . "'";
$result = $conn->query($sel);
$data = $result->fetch_assoc();
?>

<div class="container">
  <img src="../Assets/File/Park/Photo/<?php echo $data['park_photo']; ?>" alt="Profile Photo" class="img"/>
  <table>
    <tr>
      <td><strong>Name</strong></td>
      <td><?php echo $data["park_name"]; ?></td>
    </tr>
    <tr>
      <td><strong>Email</strong></td>
      <td><?php echo $data["park_email"]; ?></td>
    </tr>
    <tr>
      <td><strong>Password</strong></td>
      <td><?php echo $data["park_password"]; ?></td>
    </tr>
  </table>

  <div class="edit-links">
    <a href="Editprofile.php">Edit Profile</a>
    <a href="Changepassword.php">Change Password</a>
  </div>
</div>

</form>
</body>
</html>

<?php include("Foot.php"); ?>
