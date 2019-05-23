<?php
if(@$_SESSION['login']==true){
	header('location:login_karyawan.php');
}
?>
<html>
<head>
	<title>Login Karyawan</title>
	<link rel="stylesheet" type="text/css" href="style_login.css">
</head>
<body>
	<br/>
	<br/>
	<center><h1> Login Karyawan</h1></center>	
	
	<br/>
	<div class="login">
	<br/>
		<form
		 action="proses_login_karyawan.php" method="post" onSubmit="return validasi()">
			<div>
				<label>Username :</label>
				<input type="text" name="username" id="username" />
			</div>
			<div>
				<label>Password :</label>
				<input type="password" name="password" id="password" />
			</div>			
			<div>
				<input type="submit" value="Login" class="tombol">
			</div>
		</form>
	</div>
</body>
 
<script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if (username != "" && password!="") {
			return true;
		}else{
			alert('Username dan Password harus di isi !');
			return false;
		}
	}
 
</script>
</html>


