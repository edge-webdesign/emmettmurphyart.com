<?php

		if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
			$id = $_GET['id'];
      		header("Location: oil?id=$id");
		}

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

				<title>Archive- Emmett Murphy J. Artwork</title>
	</head>
	
	<body>
		<div id="main">
			<?php include 'assets/include/header.php'?>
		<div id="pagecontent"><h1>Choose a Destination</h1>
		<table width="100%"  style="text-align:center">
		<tr><td width="50%"><a href="oil"><img src="assets/image/cherries.jpg" style="margin-bottom:10px;"  /></a><span class="boldItalics" style="padding-top:10px;"><a href="oil">View Oil Paintings</a></span>
</td><td width="50%"><a href="watercolor"><img src="assets/image/tulips.jpg" style="margin-bottom:10px;" /></a>		<span class="boldItalics"><a href="watercolor">View Watercolors</a></span>
</td></tr>
		</table>
		
		</div>
		<?php include 'assets/include/footer.php'?>
		</div>
	</body>
</html>