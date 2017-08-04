<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
		mysql_connect("localhost","root","#!clap2mink");
		mysql_select_db("emmettmurphyart");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<title>Emmett Murphy J. Artwork</title>

	</head>
	
	<body>
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
		for ($i = 1; $i <= 1; $i++) {
			$data = mysql_fetch_array($result);
			echo '<div class="panel">';
			echo '<div class="panel-wrapper">';
			echo '<center><div class="offwhitematte"><a href="archive?id=' . $data[id] . '" class="link"><img alt="" src="assets/image/upload/'.$data[imageurl].'" class="homepageimage"/></a></div></center>';
			echo '<div class ="desc1">';
						echo '<div class ="slidernavleft"></div>';
						echo '<div class ="slidernavright"></div>';

			echo  '<div class="newh2"><br />' . $data[name] . '</div>';
			echo '<p class="description">' . nl2br($data[description]) . '</p>';
			echo '<div style="display:none;">'.$data[longdescription].'</div>';
			echo '<center style="margin-top:10px;"><a href="archive?id=' . $data[id] . '" class="link">More Information &amp; Comments</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			//echo '<p>';
			if($data[status]==0) 
			
				echo '<span class="forsale">AVAILABLE: </span><a href="'.$data[link].'" class="link">Click to Bid</a> <i>or</i> <a class="link" href="contact">Contact to Purchase</a></center>';
			else
				echo '<span class="forsale">SOLD</span></center>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	?>
		</div><!-- .coda-slider -->
</div><!-- .coda-slider-wrapper -->

<?php include('assets/include/footer.php');?>
	</body>
</html>