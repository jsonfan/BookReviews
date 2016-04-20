<?php
	$userData = $this->session->userdata('userData');
?>
<html>
<head>
	<title>Show Book And Review</title>
	<style type="text/css">
		#header {
			text-align: right;
			margin-left: 700px;
		}
		img{
			width: 100px;
		}
	</style>
</head>
<body>
	<div id='wrapper'>
		<div id='header'>
			<a href="/main/welcome">Home</a>
			<a href="/main/destroy">Logout</a>
		</div>
		<h3><?= $reviews[0]['title'] ?></h3>
		<h4>Author: <?= $reviews[0]['author'] ?></h4>
		<div id="content">
			<div id='reviewsList'>
				<h3>Reviews:</h3>
				<hr>
<?php
				foreach($reviews as $review){
?>
				<p>Rating: <img src="/assets/img/<?= $review['rating']?>.png"></p>
				<p><a href="/main/showUser/<?= $review['user_id']?>"><?= $review['alias'] ?></a> says: <?= $review['comment']?></p>
				<p>Posted on <?= $review['created_at']?></p>
<?php
					if($review['user_id'] == $userData['id']){
						//add a delete button
?>
						<a href="/reviewcontroller/delete/<?= $review['id']?>">Delete this Review</a>

<?php
					}
?>
				<hr>
<?php
				}
?>
			</div><!--- END REVIEWSLIST -->

			<div id='addReview'>

				<h3>Add a Review:</h3>
				<form action='/reviewcontroller/add' method='post'>
					<textarea name='comment'rows='5' cols='20'></textarea>
					<label>Rating: </label>
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
					<input type='hidden' name = 'book_id' value="<?=$book_id ?>">
					<input type='submit' value='Add Book and Review'>
				</form>
			</div>
		</div>
	</div>
</body>
</html>