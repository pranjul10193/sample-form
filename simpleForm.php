<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=screen-width,initial-scale=1.0" >
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css" media="screen">
		<link rel="stylesheet" type="text/css" href="form.css">
		<script type="text/javascript" src="bootstrap/js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="form.js"></script>
		<!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->

	<title>A Simple Form</title>
</head>
<body>
<form id="userForm" method="POST" action="form-process.php">
	<fieldset>
		<legend>
			User-Information
		</legend>
		<div id="errordiv"></div>
		<label for="name">
			Enter Name*:
		</label>
		<input type="text" name="name" id="name"><span class="errorfeedback errorspan" id="nameerror">Name is required</span>
		<br>
		<label for="state">
			Enter State*:
		</label>
		<select name="state" id="state">
			<option>MP</option>
			<option>UP</option>
			<option>CG</option>
			<option>MH</option>
			<option>AP</option>
			<option>GJ</option>
			<option>JK</option>
			<option>RJ</option>
			<option>HP</option>
		</select>
		<br>
		<label for="zip">
			ZipCode
		</label>
		<input type="text" id="zip" name="zip">
		<br>
		<label for="email">Enter E-mail*:</label>
		<input type="text" id="email" name="email"><span class="errorfeedback errorspan" id="emailerror">Email is Required!</span>
		<br>
		<label for="phone">Enter Phone-No*:</label>
		<input type="text" id="phone" name="phone"><span class="errorfeedback errorspan" id="phoneerror">Format:xxxx-xxxxxxx</span>
		<br>
		<label for="phonetype">Number Type*:</label>
			<input class="radioButton" type="radio" name="phonetype" id="work" value="work">
				<label class="radio-button" for="work">Work</label>
			<input class="radioButton" type="radio" name="home" id="home" value="home">
				<label class="radioButton" for="home">Home</label>
				<span class="errorfeedback errorspan" id="phonetypeerror">please choose an option</span>
		<br>
		<label for="password1">Password*:</label>
		<input type="password" name="password1" id="password1"><span class="errorfeedback errorspan" id="password1error">Password Required</span>
		<br>
		<label for="password2">Verify Password*:</label>
		<input type="password" name="password2" id="password2"><span class="errorfeedback errorspan" id="password2error">Password do not match</span>
		<br>
		<input type="submit" id="submit" name="submit">			
	</fieldset>
</form>
</body>
</html>