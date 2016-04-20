<?php
	
?>

<html>
<head>
	<title>User Info</title>
	<meta charset = "utf-8">
</head>

<body>
	<div id = "wrapper">
		<div id = "header">
			<a href="/main/welcome">Home</a>
			<a href = '/bookcontroller/'>Add Book and Review</a>
			<a href = '/main/destroy'>Logout</a>
		</div>
		<p>User Alias:  <?= $userinfo[0]['alias']?></p>
		<p>Name:  <?= $userinfo[0]['name']?> </p>
		<p>Email:  <?= $userinfo[0]['email']?> </p>
		<p>Total Reviews: <?= $reviewCount ?></p>

		<p>Posted Reviews on the following books: </p>
<?php 		foreach($userinfo as $info)
			{
?>
				<a href = "/reviewcontroller/show/<?= $info['book_id'] ?>"><?= $info['title'] ?></a><br>
<?php       
			}
?>




		

	</div>
</body>
</html>