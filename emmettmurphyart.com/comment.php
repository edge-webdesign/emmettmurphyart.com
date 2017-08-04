<?   	
		mysql_connect("localhost","root","#!clap2mink");
		mysql_select_db("emmettmurphyart");

	   	$assc = $_POST['assc'];
	   	$name = $_POST['name'];
	  	$email = $_POST['email'];
       	$comment = $_POST['comment'];
     	$ipinfo = $_SERVER['REMOTE_ADDR'];
     	mysql_query("INSERT INTO comments (id,assc,name,email,comment,visible,ipinfo) VALUES ('','$assc','$name','$email','$comment','0','$ipinfo')");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<link rel="stylesheet" href="assets/css/coda-slider-2.0.css" type="text/css" media="screen" />
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="assets/script/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="assets/script/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="assets/script/jquery.coda-slider-2.0.js"></script>
		<script type="text/javascript" src="assets/script/homeSlider.js"></script>
		<script type="text/javascript" src="assets/script/analytics.js"></script>

				<title>Success- Emmett Murphy J. Artwork</title>

	</head>
	
	<body>
		<div id="main">
			<?php include 'assets/include/header.php'?>
		<div id="pagecontent">
		
		<center style="padding:40px"><h1>Your comments have been received and will be available as soon as they are processed by the moderator!  Thank you for your feedback.</h1><br /><br /><i><a href="archive?id=<? echo $assc; ?>">Back to Artwork</i></center>
		
		</div>
		<?php include 'assets/include/footer.php'?>
	</body>
</html>