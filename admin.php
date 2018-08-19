<?php session_start();
if(!isset($_SESSION['error']) || $_SESSION['error']=""){
	$error = "";
}
else{
	$error = $_SESSION['error'];
}
 ?>

<!DOCTYPE html>
<html>
<?php include 'include/head.php'; ?>
<script>
	function myFunction(x) {
    x.style.border = "none";
    x.style.border-bottom = "green";
}

</script>
<body>
	<div class="container-fluid">
		
			<center>
		<div class="login">
			
				<a href="index.php"><img src="Images/logo.png" style="width: 120px; height: 120px; border-radius: 100%;" /></a>
				<h3>The Kantipur</h3>

				<p style="color: red;"><?php echo $error ?></p>
			<form method="post" action="Include/login.php"> 
				<i class="fa fa-user"></i> <input type="text" id="user" name="username" required placeholder="Username" style="width: 250px; height: 35px; border: none; border-bottom: 2px solid black; margin-bottom: 10px;" onfocus="myFunction(this)"><br>
				<i class="fa fa-lock"></i> <input type="password" name="password" required placeholder="Password"  style="width: 250px; height: 35px; border: none; border-bottom: 2px solid black; margin-bottom: 10px;" onfocus="myFunction(this)"><br>
				<input type="submit" name="" value="Log In" class="btn btn-lg btn-primary" style="background-color: blue; border: none;" id="submit">
			</form>
		
		</div>
		</center>
		
	
	</div>
</body>
</html>
