<!DOCTYPE html>
<html>
<head>
	<title>Mohammad Nowaf</title>
	<link rel="stylesheet" href="/d3tk4401/buatheading.css">
</head>
<body>
	<h1>COMPLETE - Keep Value in the Form</h1>

	<?php
		$nameErr = $emailErr = $genderErr = $commentErr = $websiteErr = "";
		$name = $email = $gender = $comment = $website = "";

		if($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["nama"])) {
				$nameErr = "Nama wajib diisi";
			} else {
				$name = test_input($_POST["nama"]);
				if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
					$nameErr = "Simbol tidak diperbolehkan!";
				}
			}

			if (empty($_POST["email"])) {
				$emailErr = "";
			} else {
				$email = test_input($_POST["email"]);
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$email = "Email format salah!";
				}
			}

			if (empty($_POST["gender"])) {
				$genderErr = "Gender wajib diisi";
			} else {
				$gender = test_input($_POST["gender"]);
			}

			if (empty($_POST["comment"])) {
				$commentErr = "";
			} else {
				$comment = test_input($_POST["comment"]);
			}

			if (empty($_POST["website"])) {
				$websiteErr = "Website wajib diisi";
			} else {
				$website = test_input($_POST["website"]);
				if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
					$websiteErr = "Invalid URL!";
				}
			}
		} 

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>

	<h2>PHP FORM Validasi dan Required</h2>
	<p><span class="error"> * wajib diisi</span></p>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Nama   : <input type="text" name="nama" value="<?php echo $name;?>"> 
		<span class="error">* <?php echo $nameErr ?></span>
		<br> <br>

		Email  : <input type="text" name="email" value="<?php echo $email;?>"> 
		<span class="error">* <?php echo $emailErr ?></span>
		<br> <br>

		Website: <input type="text" name="website" value="<?php echo $website;?>"> 
		<span class="error">* <?php echo $websiteErr ?></span>
		<br> <br>

		Comment: <textarea name="comment" rows="5" cols="40"></textarea> <br> <br>

		Gender : 
		<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
		
		 <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male

		<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other 

		<span class="error">* <?php echo $genderErr ?></span>
		<br><br>

		<input type="submit" name="submit" value="Submit">
		
	</form>

	<?php
		echo "<h2> HASIL INPUTAN </h2>";
		echo $name; 
		echo "<br>";
		echo $email; 
		echo "<br>";
		echo $website; 
		echo "<br>";
		echo $comment; 
		echo "<br>";
		echo $gender; 
		echo "<br>";
	?>
</body>
</html>
