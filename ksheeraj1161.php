<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="login1.css">
<head>
<div class="header">
  <h1>Medical Store Management System</h1>
 <p style="margin-top:-20px;line-height:1;font-size:30px;">A Database Management Systems Project</p>
 <p style="margin-top:-20px;line-height:1;font-size:20px;">Department of Computer Science and Engineering</p>
</div>
<title>
Medical Store Management System 
</title>
</head>

<body>

	<br><br><br><br>
	<div class="container">
		<form method="post" action="">
			<div id="div_login">
				<h1>Admin Login</h1>
				<center>
				<div>
					<input type="text" class="textbox" id="uname" name="uname" placeholder="Username" />
				</div>
				<div>
					<input type="password" class="textbox" id="pwd" name="pwd" placeholder="Password"/>
				</div>
				<div>
				
				<input type="submit" value="Submit" name="submit" id="submit" />
				<input type="submit" value="Click here for Pharmacist Login" name="psubmit" id="submit" />
				
	<?php
				
		include "config.php";

		if(isset($_POST['submit'])){

				$uname = mysqli_real_escape_string($conn,$_POST['uname']);
				$password = mysqli_real_escape_string($conn,$_POST['pwd']);

			if ($uname != "" && $password != ""){
		
					$sql="SELECT * FROM admin WHERE a_username='$uname' AND a_password='$password'";
					$result = $conn->query($sql);
					$row = $result->fetch_row();
					if(!$row) {
						echo "<p style='color:red;'>Invalid username or password!</p>";
					}
					else {
						session_start();
						$_SESSION['user']=$uname;
						header('location:adminmainpage.php');
					}
				}
			}
				
		if(isset($_POST['psubmit']))
		{
			header("location:mainpage1.php");
		}
	?>
			
				</div>
				</center>
			</div>
		</form>
	</div>

	<div class=footer>
	<br>
	Developed by, Abhishek Sharma, UEMK, CSE, 2021 
	<br><br>
	</div>
	
</body>

</html>