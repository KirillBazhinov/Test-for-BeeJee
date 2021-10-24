<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Тестовая задача</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-3.5.1.min.js"></script>
</head>
<body class="max_width">
	<header class="head">
		<h1><?=$data['Title']?></h1>
	</header>
	<main class="main">
		<content class="main_content">
			<?php include 'application/views/'.$content_view; ?>
		</content>
	</main>
<script src="/js/script.js" type="text/javascript"></script>
</body>
</html>