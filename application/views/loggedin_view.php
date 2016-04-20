<?php
	$userData = $this->session->userdata('userData');
?>
<html>
<head>
	<title>Books Home</title>
	<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;
		font-family: arial;
	}
	#wrapper {
		width: 800px;
		border: 1px solid black;
		height: 800px;
	}
	#header h3, a {
		display: inline-block;
	}
	#header a {
		margin-left: 100px;
	}

	#bookreviews {
		display: inline-block;
		border: 1px solid black;
		width: 400px;
		height: 500px;
		float: left;
		clear: all;
	}

	#otherbooks {
		display: inline-block;
		border: 1px solid black;
		width: 300px;
		height: 250px;
		margin-left: 20px;
	}
	#booklist {
		border: 1px solid black;
		width: 200px;
		height: 200px;
		overflow: scroll;
		display: inline-block;
		margin-left: 20px;
	}
	img{
			width: 100px;
		}



	</style>

</head>
<body>
	<div id = "wrapper">
			<div id = 'header'>
				<h3>Welcome, <?= $userData['alias']?></h3>
				<a href = '/bookcontroller/'>Add Book and Review</a>
				<a href = '/main/destroy'>Logout</a>
			</div>
			<div id ='bookreviews'>
				<h5>Recent Book Reviews:</h5>
				<div class = "recentreviews">
<?php
				//var_dump($reviews);
				// foreach($reviews as $review){
				for($i=0; $i<3; $i++){
					//echo $reviews[0]['title'];

?>
					<div class='reviews'>
						 <h4><?= $reviews[$i]['title'] ?></h4>
						 <p>Rating: <img src="/assets/img/<?= $reviews[$i]['rating']?>.png"></p>
						 <p><a href="/main/showUser/<?= $reviews[$i]['user_id']?>"><?= $reviews[$i]['alias'] ?></a> says: <?= $reviews[$i]['comment']?></p>
						 <p>Posted on <?= $reviews[$i]['created_at']?></p>
					</div>

<?php			}
				//}
?>
				</div>
			</div>
			<div id = "otherbooks">
				<h5>Other Books with Reviews:</h5>
				<div id = "booklist">
<?php 
						foreach($books as $book)
						{ 
?>
							<a href ="/reviewcontroller/show/<?=$book['id']?>"><?=$book['title']?></a><br>
<?php					}


?>
				</div>
			</div>
	</div>

</body>
</html>