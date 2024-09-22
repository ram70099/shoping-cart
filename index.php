<?php session_start();?>
<?php include('common/connection.php');?>
<?php
	if(!empty($_POST['save']))
	{
		$fname=$_POST['fullname'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$query="insert into signup(fullname,email,password) value('$fname','$email','$pass')";
		if(mysqli_query($connect,$query))
		{
			?>
				<script>
					alert("Sign Up Complete");
				</script>
			<?php
		}
		else
		{
			?>
				<script>
					alert("Sign Up Not Complete Try Again");
				</script>
			<?php
		}
	}
		if(!empty($_POST['login']))
	{
		$username=$_POST['un'];
		$password=$_POST['pw'];
		$query="select * from signup where email='$username' and password='$password'";
		$result=mysqli_query($connect,$query);
		$r=mysqli_fetch_assoc($result);
		$count=mysqli_num_rows($result);
		if($count>0)
		{
			$_SESSION['username']=$r['fullname'];
			$_SESSION['userid']=$r['id'];
			header('location:front.php');
		}
		else{
			?>
				<script>
					alert("Login Not Successfull Please Try Again");
				</script>
			<?php
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ENEST-2</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC|Catamaran&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="main-div">
	<?php include('common/header.php'); ?>
		<div class="null">
		</div>
		<div class="main-categorious">
			<div class="footer">
				<div class="login-here">
					<div class="login">
						<p>Login Here</p>
						<div  class="user-info">
							<form method="post" action="">
								<table class="login-1">
									<tr class="inpt">
										<td ><span>Username</span></td>
										<td><input type="text" name="un"></td>
									</tr><br>
									<tr class="inpt">
										<td ><span>Password</span></td>
										<td><input type="password" name="pw"></td>
									</tr>
									<tr class="logn-btn" >
										<td></td>
										<td><input class="log" type="submit" name="login" value="Login"></td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="sign-up">
				<div class="sign">
					<p>New to Enest? <a href=""> Sign up</a></p>
					<div  class="user-info">
						<form method="post" action="">
							<table class="login-1">
								<tr class="inpt-1">
									<td ><span>Full Name</span></td>
									<td><input type="text" name="fullname"></td>
								</tr><br>
								<tr class="inpt-1">
									<td ><span>Email</span></td>
									<td><input type="text" name="email"></td>
								</tr>
								<tr class="inpt-1">
									<td ><span>Password</span></td>
									<td><input type="password" name="pass"></td>
								</tr>
								<tr class="logn-btn" >
									<td></td>
									<td><input class="log" type="submit" name="save" value="Login">
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
			<div class="footer-1">
				<div class="list-1">
				<?php include('common/footer.php');?>
				</div>
				<div class="footer-2">
					<p>Copyright <i class="fa fa-copyright" aria-hidden="true"></i>2013 Enest.Privacy Notice</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>