<?php
session_start();

include_once('../includes/connection.php');
include_once('../includes/article.php');

$article = new Article;

if (isset($_SESSION['logged_in'])) { 
	// display delete page

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = $pdo->prepare('DELETE FROM articles WHERE article_id = ?');
		
		$query->bindValue(1, $id);
		$query->execute();

		header('Location: delete.php');

	}

	$articles = $article->fetch_all();
?>
<html>
	<head>
		<title>CMS Tutorial</title>
		<link rel="stylesheet" href="../assets/style.css" /> 
	</head>
	<body>
		<div class="container">
<a href="index.php" id="logo">CMS</a>
		<br /><br />
		<h4>Delete Article</h4>
		<form action="delete.php" method="get" autocomplete="off">
			<select onchange="this.form.submit();">
				<?php foreach($articles as $article) { ?>
					<option value="<?php echo $article ['article_id']; ?>"><?php echo $article ['article_title']; ?></option>
				<?php } ?>	
			</select>
		</form>
		<br />
		</div>
	</body>
</html>
<?php
}else{
	header("Location: index.php");
}

?>