<!DOCTYPE html>
<html>
	<head>
		<title>Login Sistem Informasi Akademik SDN 20 LLG</title>
		<link rel="stylesheet" type="text/css" href="../source/css/style_login.css">
	</head>
		<body>
			<div class="image">
			<img src="../image/login/h2.png" alt="Tut Wuri Handayani" />
			</div>
			<div class="box">
				<div class="box_login">
					<h1>Login to <span>SIA SD 20 LLG</span></h1>
				</div>
				<div class="form_login">
					<p>Please use the form below.</p>
					<form action="../source/php/proses_login.php" method="POST">
						<label for="username">Username</label>
						<input type="text" name="username" autofocus/></br>
						<label for="password">Password</label>
						<input type="password" name="password" /><br>
						<input type="submit" name="login" value="Login" id="login">
					</form>
				</div>
			</div>
			<div class="clear"></div>
			<div class="ca_kaki">
				<div id="link">
					<a href="#">Beranda</a>
					<a href="#">History</a>
					<a href="#">Guru</a>
					<a href="#">Murid</a>
					<a href="#">Kontak</a>					
				</div>
			</div>
		</body>
</html>