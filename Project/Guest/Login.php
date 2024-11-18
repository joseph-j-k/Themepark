<?php  
include("../Assets/Connection/Connection.php");
session_start();
?>

<?php 
	
if(isset($_POST["btn_submit"]))
{
$email=$_POST["txt_email"];
$password=$_POST["txt_password"];
$seladmin="select *from tbl_admin where admin_email ='".$email."' and  admin_password ='".$password."' ";
$seluser="select *from tbl_user where  user_email ='".$email."' and   user_password ='".$password."'" ;
$selPark="select * from tbl_park where  park_email ='".$email."' and   park_password ='".$password."'" ;
$selBranch = "select * from tbl_branch where  branch_email ='".$email."' and  branch_password ='".$password."'" ;



$result1 =$conn -> query($seladmin);
$result2 = $conn -> query($seluser);
$result3 =$conn -> query($selPark);
$result4 =$conn -> query($selBranch);



if($dataAdmin = $result1 -> fetch_assoc())
{
	$_SESSION["aid"] = $dataAdmin["admin_id"];
	$_SESSION["adminname"] = $dataAdmin["admin_name"];
	header("Location:../admin/Dashboard.php");
}

else if($dataUser = $result2 -> fetch_assoc())
{
	$_SESSION["uid"] = $dataUser["user_id"];
	$_SESSION["uname"] = $dataUser["user_name"];
	header("Location:../User/Homepage.php");
}
else if($dataPark = $result3 -> fetch_assoc())
{    
  if($dataPark['park_status'] == 1)
		{
	$_SESSION["pid"] = $dataPark["park_id"];
	$_SESSION["pname"] = $dataPark["park_name"];
	header("Location:../Park/Homepage.php");
  }
  else if($dataPark['park_status'] == 2)
    { 
      echo"<script>
      alert('Reject');
        </script>";
    }
    else{
      echo"<script>
      alert('Pending');
        </script>";
    }
	
}
else if($dataBranch = $result4 -> fetch_assoc())
{    
	$_SESSION["bid"] =$dataBranch["branch_id"];
	$_SESSION["bname"] = $dataBranch["branch_name"];
	header("Location:../Branch/Homepage.php");
	
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
   <!-- component -->
<div class="flex h-screen w-full items-center justify-center bg-gray-900 bg-cover bg-no-repeat" style="background-image:url('https://images.pexels.com/photos/913138/pexels-photo-913138.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2  ')">
  <div class="rounded-xl bg-gray-800 bg-opacity-50 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
    <div class="text-white">
      <div class="mb-8 flex flex-col items-center">
        <h1 class="mb-2 text-2xl">Login</h1>
      </div>
      <form id="form1" name="form1" method="post" action="">
        <div class="mb-4 text-lg">
          <input class="rounded-3xl border-none bg-yellow-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="text" name="txt_email" id="txt_email" placeholder="Email" autocomplete="off" required/>
        </div>
        
        <div class="mb-4 text-lg">
          <input class="rounded-3xl border-none bg-yellow-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="password" name="txt_password" id="txt_password" placeholder="Password" autocomplete="off" minlength="8" maxlength="20" 
            pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}" 
            required/>
        </div>
        <div class="mt-8 flex justify-center text-lg text-black">
          <button type="submit" class="rounded-3xl bg-yellow-400 bg-opacity-50 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-300 hover:bg-yellow-600" name="btn_submit" id="btn_submit">Login</button>
        </div>
        <a href="../index.php" style="color:red">Back</a>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>