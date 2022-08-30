<!DOCTYPE html>
<html>
	<head>
		<title>My First php login page</title>
		<link rel="stylesheet" type="text/css" href="style.css"></link>
		<script>

		function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
		var y=  document.forms["myForm"]["password"].value;
    if (x == "admin"&&y=="12") {
        alert("success");
				window.location.href = "cal.php";
        return false;
    }
		else{alert("invalid details")}
}

</script>
	</head>

	<body>
		<div class="container">
			<img src="men.png" />
			<form name="myForm" "action="index.php" method="post"  autocomplete="off" onsubmit="return validateForm()">
				<div class="field-wrap">

					<input type="text" name="fname" placeholder="Enter Username" required autocomplete="off"">
				</div>
				<div class="field-wrap">

					<input type="password" name="password" placeholder="Enter Password" required autocomplete="off">
				</div>
				<input type="submit" name="submit" value="Login" class="btn-login"><br>
				<a href="forgot.php"><p>forget password?</p></a>
			</form>
		</div>
	</body>
</html>
