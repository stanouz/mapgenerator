<!DOCTYPE html>
<html>
<head>
	<title><?= $nomSite ?></title>
	<meta charset="utf-8" />
	<link href="css/style.css" rel="stylesheet" media="all" type="text/css">
	<link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
</head>
<body>
	<?php include('static/header.php'); ?>
	
	<div>
		<h3><?= $msg ?></h3>
		<br/>
		<li><?= $nbC ?></li>
		<br/>
		<li><?= $nbE ?></li>
		<br/>
    </div>	

	<?php include('static/footer.php'); ?>
</body>
</html>