<?php
	$userData = $this->session->userdata('userData');
?>
<html>
<head>
	<title>Add Book and Review</title>
	<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;
		font-family: arial;
	}


	#wrapper {
		width: 800px;
		border: 1px solid black;

	}
	#header {
		text-align: right;
		margin-left: 700px;
	}
	fieldset {
		display: inline-block;
		width: 300px;
		border: 1px solid black;
		margin-left: 325px;
	}
	fieldset label {
		display: inline-block;
		width: 200px;
	}
		

	</style>
</head>
<body>
	<div id='wrapper'>
		<div id='header'>
			<a href="/main/welcome">Home</a>
			<a href="/main/destroy">Logout</a>
		</div>

		<div id='content'>
			<h1>Hello <?= $userData['alias']?></h1>
			<h4>Add a New Book Title and a Review:</h4>
			<form action='/bookcontroller/create' method='post'>
				<fieldset>
					<label>Book Title: </label><input type='text' name='title'>
					<label>Author :
						<label>Choose from the list: </label> 
						<select name='author'>
<?php
							foreach($authors as $author){
?>
							<option value='<?=$author['author']?>'><?=$author['author']?></option>
<?php
							}
							// <option value='asdfawef'>asdfasd</option>
							// <option value='asdfawef'>asdfasd</option>
?>
						</select>
						<label>Or add a new author: </label><input type='text' name='new_author'>
					</label>
					<label>Review: </label><textarea name='comment' rows='5' cols='20'></textarea>
					<label>Rating: 
					<select name='rating'>
						<option value='0'>0</option>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>
					</select>
					stars.
					</label>
					<input type='hidden' name ='user_id' value="<?= $userData['id']?>">
					<input type='submit' value='Add Book and Review'>
				</fieldset>
			</form>
		</div>

	</div>

</body>
</html>