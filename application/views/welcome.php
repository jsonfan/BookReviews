<html>
<head>
	<title>Welcome!</title>
	<style type="text/css">

	*{
		margin: 0;
		padding: 0;
		font-family: arial;
	}

	#wrapper {
		width: 800px;
		border: 1px solid black;
	}
	#register {
		display: inline-block;
		width: 350px;
		border: 1px solid black;
		vertical-align: top;
		margin-left: 20px;
	}
	#register label {
		width: 200px;
		display: inline-block;
	}

	#login {
		display: inline-block;
		width: 350px;
		border: 1px solid black;
		vertical-align: top;
	}
	#login label {
		width: 200px;
		display: inline-block;
	}

	.submit {
		margin-left: 270px;
		margin-top: 10px;
	}
	</style>
</head>
<body>
	<div id ="wrapper">
		<h1>Welcome!</h1>

		<div id ='register'>
			<h4>Register</h4>
			<form action='/main/add' method='post'>
				<label>Name: </label><input type='text' name='name'>
				<label>Alias: </label><input type='text' name='alias'>
				<label>Email: </label><input type='text' name='email'>
				<label>Password: </label><input type='password' name='password'>
				<p>*Password should be at least 8 characters</p>
				<label>Confirm PW: </label><input type='password' name='confirm_password'>
				<input class = "submit" type='submit' value='Register'>
			</form>
			<?=$this->session->flashdata('reg_errors')?>
		</div>
		<div id ='login'>
			<h4>Login</h4>
			<form action='/main/login' method='post'>
				<label>Email: </label><input type='text' name='email'>
				<label>Password: </label><input type='password' name='password'>
				<input class = "submit" type='submit' value='Login'>
			</form>
			<?=$this->session->flashdata('login_errors')?>
		</div>
	</div>
	
</body>
</html>