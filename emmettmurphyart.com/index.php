<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
		mysql_connect("localhost","root","#!clap2mink");
		mysql_select_db("emmettmurphyart");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<link rel="stylesheet" href="assets/css/coda-slider-2.0.css" type="text/css" media="screen" />
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="assets/script/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="assets/script/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="assets/script/jquery.coda-slider-2.0.js"></script>
		<script type="text/javascript" src="assets/script/homeSlider.js"></script>
		<script type="text/javascript" src="assets/script/analytics.js"></script>

		<title>Emmett Murphy J. Artwork</title>

	</head>
	
	<body>
	<noscript><h1>Please enable JavaScript!</h1><meta http-equiv="refresh" content="0; url=index-nojs" />
</noscript>
<?php $q = "SELECT * FROM paintings ORDER BY  `paintings`.`id` DESC LIMIT 1";
		$result = mysql_query($q);
		$data = mysql_fetch_array($result);
		echo '<div id="firstimage"><img alt="" src="assets/image/upload/'.$data[imageurl].'" /></div>';
		include('assets/include/header.php');
?>

		<div id="main">
			<div class="linebold"></div>
			<div class="line"></div>
		<div class="coda-slider-wrapper">
	<div class="coda-slider preload" id="home">
	<?php
		$q = "SELECT * FROM paintings ORDER BY  `paintings`.`id` DESC LIMIT 4";
		$result = mysql_query($q);
		for ($i = 1; $i <= 4; $i++) {
			$data = mysql_fetch_array($result);
			echo '<div class="panel">';
			echo '<div class="panel-wrapper">';
			echo '<center><div id="offwhitematte" style="display:block; padding:20px; background-color: #fefff1; max-width:640px;"><a href="';
			if($data['type']=='postcard')
				echo 'watercolor';
			else
				echo 'oil';
			echo '?id=' . $data[id] . '" class="link"><img alt="" src="assets/image/upload/'.$data[imageurl].'" class="shadow"/></a></div></center>';
			echo '<div class ="desc1">';
						echo '<div class ="slidernavleft"></div>';
						echo '<div class ="slidernavright"></div>';

			echo  '<div class="newh2"><br />' . $data[name] . '</div>';
			echo '<p class="description">' . nl2br($data[description]) . '</p>';
			echo '<div style="display:none;">'.$data[longdescription].'</div>';
			echo '<center style="margin-top:10px;"><a href="';
			if($data['type']=='postcard')
				echo 'watercolor';
			else
				echo 'oil';

			echo '?id=' . $data[id] . '" class="link">More Information &amp; Comments</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			//echo '<p>';
			if($data[status]==0) {
			
				echo '<span class="forsale">AVAILABLE: </span>';
				if($data[link])
					echo'<a href="'.$data[link].'" class="link">Click to Bid</a>';
				else
					echo '<a class="link" href="contact"> Contact to Purchase</a>';
				}
			else
				echo '<span class="forsale">SOLD</span></center>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	?>
			<div class="panel">
				<div class="panel-wrapper">
						<center><div class="offwhitematte"><a href="archive" class="link"><img alt="" src="assets/image/forecastrain.jpg" class="homepageimage"/></a></div></center>
					<div class ="desc1">
						<div class ="slidernavleft"></div>
						<div class ="slidernavright"></div>
						<div class="newh2"><br />For more art, please visit my <a href="archive">archive</a>.</div>
					</div>
				</div>
			</div>
		</div><!-- .coda-slider -->
</div><!-- .coda-slider-wrapper -->
<?php include('assets/include/footer.php');?>
	</body>
</html>