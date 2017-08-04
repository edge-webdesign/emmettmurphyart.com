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
			$result = mysql_query("SELECT id FROM paintings WHERE type='postcard' ORDER BY  `paintings`.`id` DESC LIMIT 1") 
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
		<script type="text/javascript">
			Shadowbox.init({
  				  handleOversize: "resize",
  			  	modal: true
			});
		</script>
		<script type="text/javascript">
    function toggle_visibility() {
       var e = document.getElementById('framed');
       var f = document.getElementById('offwhitematte');

       if(e.style.display == 'block') {
          e.style.display = 'none';
          f.style.display = 'block';
        }
       else {
          e.style.display = 'block';
          f.style.display = 'none';
         }
    }
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
			echo '<i><a href="watercolor">Back to Archive (Additional Watercolors)</a></i>';
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

			
			
			
			
			echo '<br /><a href="#" style="width: 100px; height: 10px; padding: 10px 10px; text-align: left; -moz-border-top-left-radius: 5px; -webkit-border-top-left-radius: 5px; -moz-border-bottom-left-radius: 5px; -webkit-border-bottom-left-radius: 5px; font-size: 10px; color: #fff; text-transform: uppercase; text-decoration: none; font-family: Verdana; background-color: #1b587b;">Click to view:</a>';
			echo '<a href="assets/image/upload/';
			if($data[cropped]!="1")
				echo $data[imageurl];
			else
				echo 'orig_'.$data[imageurl];
			echo '" rel="lightbox" class="fancybutton" style="-moz-border-top-right-radius: 5px; -webkit-border-top-right-radius: 5px; -moz-border-bottom-right-radius: 5px; -webkit-border-bottom-right-radius: 5px;">Larger';	
			if($data[cropped]=="1")
				echo ' and Uncropped';
			echo '</a>';

			echo '<p>' . nl2br($data[longdescription]) . '</p><br />';
			if($data[status]==0) {
				echo '<span class="forsale">AVAILABLE: </span>';
				if($data[link])
					echo'<a href="'.$data[link].'" class="link">Click to Bid</a>';
				else
					echo '<a class="link" href="contact">Contact to Purchase</a>';
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
        $result = mysql_query("SELECT * FROM paintings WHERE type='postcard' ORDER BY  `paintings`.`id` DESC") 
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
                $linkurl = 'watercolor?id='.$row['id'];
                echo '<td>';
                echo '<div style="width:237px;height:165px;"><center><a href="'.$linkurl.'"><img alt="" style="max-width:237px;height:165px; "src="'.$imageurl.'" /></a>';
			    if($row['status']==1)
					echo'<span class="dot"><img src="assets/image/dot.png" width="16" height="16" alt="Zoom"></span>';
			    echo '</td>';

                $counter=$counter+1;
        } 

        // close table>
        echo "</tr></table><br /><i>Please feel free to <a href='contact'>suggest a postcard or painting subject or commission!</a></i>'<br /><br /></center>";

		}
			?>
		<?php include 'assets/include/footer.php'?>
	</body>
</html>