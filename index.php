<!DOCTYPE html>
<html>
<head>
	<title>Meme-inator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<!--[if lte IE 8]>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
<![endif]-->
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
	<link href="meme_styles.css" type="text/css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script>
		var fontcolor='white';
		var fontstroke=2;
	</script>
	<script src="meme.js"></script>
	<script src="meme_app.js"></script>
</head>
<body>
<?php 
// Turn off all error reporting
error_reporting(0);

// Handle meme submission
$img = $_POST['saveinput'];
if ($img){ 
	$img = substr(explode(";",$img)[1], 7);
	$imgfile='img.png';
	file_put_contents($imgfile, base64_decode($img));
	echo 'OK! <br> <a href="'.$imgfile.'"><img src="'.$imgfile.'"></a>';
}
?>
	<h1>Make a Meme</h1> 	
	<form action="index.php" method="post" enctype="multipart/form-data" class="pure-form">
		<!-- <label for="img">Link to Image:</label> <br> 
		<input id="img" name="img" placeholder="meme.png" value="meme.png" maxlength="255" style="width:75%;">
		<hr> -->
		
        <div class="pure-g captions">
			<div class="pure-u-1 pure-u-md-1-3">
				<p>
					<label for="img">Image to caption</label>
					 <select id="img" name="img" class="pure-u-23-24">
						<option value="meme.png">Super Doggy</option>
						<option value="blank.png">Blank</option>
					</select>	
				</p>
				<p>
					<label for="fontf">Font</label>
					<select id="fontfam" class="pure-u-23-24" name="fontf">
						<option style="font-family:'Impact';">Impact</option>
						<option style="font-family:'Britannic Bold';">Britannic Bold</option>
						<option style="font-family:'Broadway';">Broadway</option>
						<option style="font-family:'Gill Sans Ultra Bold';">Gill Sans Ultra Bold</option>
						<option style="font-family:'Keep Calm Medium';">Keep Calm Medium</option>
					</select>
				</p>
				<hr>
				<p>
					<label for="top"><b>Top Caption</b></label>
					<input name="top" id="top-line" class="pure-u-23-24" placeholder="Top Caption" maxlength="75"> 
				</p>
				<p>				
					<label for="bottom"><b>Bottom Caption</b></label>			
					<input name="bottom" id="bottom-line" class="pure-u-23-24" placeholder="Bottom Caption" maxlength="75">
				</p>
				<hr>
				<p>
					<button type="reset" value="X" class="button-error pure-button">X</button>
					<a href="" download="meme.png" class="save button-secondary pure-button button-xlarge">Save this</a>		
					<button type="submit" id="submit" class="pure-button button-success button-xlarge">Share Your Creation! &raquo;</button>
							
				</p>
				
			</div>
			<div class="pure-u-1 pure-u-md-2-3">
				<canvas id="canvas" class="show pure-img"></canvas>	
			</div>
		</div>		

		<button class="show" id="Add" style="display:none;" />Copy a Direct Link Now &raquo;</button>
		
		<p> <a href="" id="Content" class="content" style="display:none;"> </a> </p> <!-- JS will update this, but we will hide it for now -->
		<input type="hidden" type="file" value="" class="saveinput" name="saveinput" /> <!-- Submit for upload, the data -->
		
	</form>
</body>
</html>
