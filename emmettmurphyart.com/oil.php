<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
		mysql_connect("localhost","root","#!clap2mink");
		mysql_select_db("emmettmurphyart");
		if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
			$id = $_GET['id'];
			$result = mysql_query("SELECT * FROM paintings WHERE id=$id");
			$data = mysql_fetch_array($result);
		}
		if (isset($_GET['id']) && $_GET['id'] =='latest') {
			$result = mysql_query("SELECT id FROM paintings WHERE type='painting' ORDER BY  `paintings`.`id` DESC LIMIT 1") 
            	or die(mysql_error());  
			$row = mysql_fetch_array($result);
			$id = $row['id'];
			$result = mysql_query("SELECT * FROM paintings WHERE id=$id");
			$data = mysql_fetch_array($result);

		}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="assets/css/shadowbox.css">
		<script type="text/javascript" src="assets/script/shadowbox.js"></script>
		<script type="text/javascript" src="assets/script/jquery.lightbox_me.js"></script>
<script type="text/javascript">
    function toggle_visibility(showMe) {
    	var toShow = document.getElementById(showMe);
   		var f1 = document.getElementById('framed');
       	var f2 = document.getElementById('framed2');
       	var f0 = document.getElementById('offwhitematte');
       	var f2text = document.getElementById('framed2text');
  		var b1 = document.getElementById('framebutton1');
       	var b2 = document.getElementById('framebutton2');
       	var b0 = document.getElementById('framebutton0');

        f0.style.display = 'none';
        f1.style.display = 'none';
        f2.style.display = 'none';
        f2text.style.display = 'none';
        
        toShow.style.display = 'block';
        if(showMe=='framed') {
   	     b0.style.display = '';
       	 b1.style.display = '';
       	 b2.style.display = '';
        }
        if(showMe=='framed2') {
   	     b0.style.display = '';
       	 b1.style.display = '';
       	 b2.style.display = '';
       	 f2text.style.display = '';
        }
        if(showMe=='offwhitematte') {
         b0.style.display = 'none';
       	 b1.style.display = '';
       	 b2.style.display = '';
        }

    }
</script>
		<script type="text/javascript">
			Shadowbox.init({
  				  handleOversize: "resize",
  			  	modal: true
			});
			  $('shadowbox_body_inner').addEvent('click', function(e){ 
    new Event(e).stop(); 
    Shadowbox.close(); 
  }); 

		</script>

		<script type="text/javascript" src="assets/script/analytics.js"></script>

		<?php
			if($data[name])
				echo '<title>'.$data[name].'- Emmett Murphy J. Artwork</title>';
			else
				echo '<title>Archive- Emmett Murphy J. Artwork</title>'; ?>

	</head>
	
	<body>
		<div id="main">

			<?php include 'assets/include/header.php'?>
	<?php
		if ($data) {
			echo '<div id="picture">';
			echo '<i><a href="oil">Back to Archive (Additional Oil Paintings)</a></i>';
			echo '<div class="h22">' . $data[name] . '</div>';
			echo '<center><div id="offwhitematte" style="display:block; padding:20px; background-color: #fefff1; max-width:640px;"><a href="assets/image/upload/';
			if($data[cropped]!="1")
				echo $data[imageurl];
			else
				echo 'orig_'.$data[imageurl];
			echo '" rel="shadowbox" title="'.$data[name].'" ><img alt="" src="assets/image/upload/'.$data[imageurl].'" class="shadow"/></a></div></center>';
						
		echo '<center><div id="framed" style="display:none"><a href="assets/image/upload/';
			if($data[cropped]!="1")
				echo $data[imageurl];
			else
				echo 'orig_'.$data[imageurl];
			echo '" rel="shadowbox" title="'.$data[name].'" ><img alt="" src="assets/image/upload/'.$data[imageurl].'" class="framedhomepageimage"/></a></div></center>';

		echo '<center><div id="framed2" style="display:none"><a href="assets/image/upload/';
			if($data[cropped]!="1")
				echo $data[imageurl];
			else
				echo 'orig_'.$data[imageurl];
			echo '" rel="shadowbox" title="'.$data[name].'" ><img alt="" src="assets/image/upload/'.$data[imageurl].'" class="framed2homepageimage"/></a></div></center>';

			
			
			
			echo '<br /><i>Use the buttons below to view the painting larger or in an example picture frame:</i><br /><br /><a href="#" style="width: 100px; height: 10px; padding: 10px 10px; text-align: left; -moz-border-top-left-radius: 5px; -webkit-border-top-left-radius: 5px; -moz-border-bottom-left-radius: 5px; -webkit-border-bottom-left-radius: 5px; font-size: 10px; color: #fff; text-transform: uppercase; text-decoration: none; font-family: Verdana; background-color: #1b587b;">Click to view:</a><a href="#framed" onclick="toggle_visibility(\'offwhitematte\')" class="fancybutton" id="framebutton0" style="display:none;">Normal</a>';
			echo '<a href="assets/image/upload/';
			if($data[cropped]!="1")
				echo $data[imageurl];
			else
				echo 'orig_'.$data[imageurl];
			echo '" rel="lightbox" class="fancybutton">Larger';	
			if($data[cropped]=="1")
				echo ' and Uncropped';
			echo '</a>';
			echo '<a href="#framed" onclick="toggle_visibility(\'framed\')" id="framebutton1" class="fancybutton">Frame 1</a>';
			echo '<a href="#framed2" onclick="toggle_visibility(\'framed2\')" class="fancybutton" id="framebutton2" style="-moz-border-top-right-radius: 5px; -webkit-border-top-right-radius: 5px; -moz-border-bottom-right-radius: 5px; -webkit-border-bottom-right-radius: 5px;">Frame 2</a>';
			echo '';

	echo '<br /><br /><div id="framed2text" style="display:none"><i>Floating style Frame #2 is for paintings with image not cropped by rabbet.</i><br /></div><p>' . nl2br($data[longdescription]) . '</p>';
			if($data[status]==0) {
				echo '<span class="forsale">AVAILABLE: </span>';
				if($data[link])
					echo'<a href="'.$data[link].'" class="link">Click to Bid</a>';
				else
					echo '<a class="link" href="contact"> Contact to Purchase</a>';
			}
			else
				echo '<span class="forsale">SOLD</span>';

			$result = mysql_query("SELECT * FROM comments WHERE assc=$id AND visible=1");
			$row = mysql_fetch_array($result);
			if ($row) {
				echo '<h3>Comments</h3>';
				echo '<table class="commentstbl"	>';
				echo '<tr>';
				echo "<td align='right'><strong>" . $row['name'].":</strong></td>";
				echo "<td>".$row['comment']."</td>";
				echo '</tr>';
				while($row = mysql_fetch_array($result)) {
					echo '<tr>';
					echo "<td align='right'><strong>" . $row['name'].":</strong></td>";
					echo "<td>".$row['comment']."</td>";
					echo '</tr>';
				}
				echo '</table>';
			}

			echo '<div id="comment">';
			echo '<h4>Add a Comment</h4>';
			echo '<form name="newcomment" action="comment.php" method="post">';
			echo '<input type="hidden" name="assc" value="'.$id.'">';
			echo '<strong>Name: </strong><br /><input type="text" class="subscribe" name="name" style="width:400px" /><br/>';
			echo '<strong>Email: </strong><br /><input type="text" class="subscribe" name="email" placeholder="(this will remain confidential)" style="width:400px" /><br/>';
			echo '<strong>Comments: </strong><br /> <textarea class="subscribe" name="comment" style="width:400px;height:60px;"></textarea>';
			echo '<br /><input type="submit" value="Comment" /><br /><br />';
			echo '</form>';
			echo '</div>';
			echo '</div>';
		}
		else {
        $result = mysql_query("SELECT * FROM paintings WHERE type='painting' ORDER BY  `paintings`.`id` DESC") 
                or die(mysql_error());  
		echo'<div style="text-align:center; font-size:14pt;"><i><img src="assets/image/dot.png" width="16" height="16" style="top:12px"/> marks a sold painting.</i></div>';

        // display data in table
        echo "<center><table border='0' width='670' cellpadding='10'>";
       	echo '<tr>';
        // loop through results of database query, displaying them in the table
        $counter =0;
        while($row = mysql_fetch_array( $result )) {
                if($counter==3) {
                	echo'</tr><tr>';
                	$counter=0;
                }
                $imageurl = 'assets/image/upload/' . $row['imageurl'];
                $linkurl = 'oil?id='.$row['id'];
                echo '<td>';
                echo '<div style="width:237px;height:165px;"><center><a href="'.$linkurl.'"><img alt="" style="max-width:237px;height:165px; "src="'.$imageurl.'" /></a>';
			    if($row['status']==1)
					echo'<span class="dot"><img src="assets/image/dot.png" width="16" height="16" alt="Zoom"></span>';
			    echo '</td>';

                $counter=$counter+1;
        } 

        // close table>
        echo "</tr></table><br /><i>Please feel free to <a href='contact'>suggest a painting subject or commission!</a></i>'<br /><br /></center>";

		}
		
	?>
		<?php include 'assets/include/footer.php'?>
	</body>
</html>