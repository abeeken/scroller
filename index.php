<?php
	//Scrolling columns prototype
	
	//Some variables
	$no_columns = 7;
	$inner_width = 320*$no_columns;
	
?>

<html>
	<head>
		<!-- Include links to the Scriptaculous and Prototype libraries. You'll need to rewrite these for your own file structure. -->
		<script src="../common_javascripts/prototype.js" type="text/javascript"></script>
		<script src="../common_javascripts/scriptaculous.js" type="text/javascript"></script>
		
		<script src="scroller.js" type="text/javascript"></script>
		
		<style>
			#scroller-outer{
				width: 960px;
				border: solid 1px red;
				overflow: hidden;
			}
			
			.scroller-column{
				width: 300px;
				float: left;
				margin: 10px;
			}
			
			#scroller-inner{
				width: <?php echo $inner_width; ?>px;
			}
		</style>
	</head>
	<body>
		<h1>Scroller</h1>
		<p>This is an example of how the scroller class can be used.</p>
		<p>It uses the scriptaculous libraries to control movement and requires a double layer div.</p>
		<p>The outer layer div is fixed width - this should be the column width * the number of columns you want to show at any time. This then has an overflow:hidden value so that it hides the columns we don't want to see.</p>
		<p>In this example, we have 7 columns at 320px wide (300px with a 10px margin all the way round). We want to show 3 columns at a time, so our outer div is 960px wide.</p>
		<p>The inner layer should be the width of the number of colums * the column width. This then goes "behind" the outer div and will be the part that moves.</p>
		<p>The columns are also floated left so that they sit in a neat little line!</p>
		<p>I've semi-programatically calculated the number of columns and the inner width, so you can see how this could be applied to, for example, a content management system.</p>
		<p>Once we have our scroller constructed, we call our scroller class like so:</p>
		<ul>
			<li>myscroll = new scroller(</li>
			<li> &rarr; name of the <strong>inner scroll element</strong>; the bit that's actually going to move,</li>
			<li> &rarr; width of the outer div,</li>
			<li> &rarr; width of an individual column,</li>
			<li> &rarr; number of columns,</li>
			<li> &rarr; a loop back boolean, true or false - if true, when you try and scroll past the end of the scroller in either direction, it loops back on itself</li>
			<li>)</li>
		</ul>
		<p>We then set up left and right scroll elements which, when clicked, will perform the shifting. In this example I've used span's.</p>
		<p>These need to have onclick values of myscroll.left_scroll() - shifts the inner div to the left; and myscroll().right_scroll() - shifts the div to the right.</p>
		<p>Try that on the example below to see the magic work - take it and apply it to your site! Hope you find this useful.</p>
		<p>I know this is probably not the best way to do this kind of thing but I'm still learning when it comes to building my own functions like this. Any suggestions on how to improve it would be ace!</p>
		<div id="scroller-outer">
			<div id="scroller-inner">
				<?php 
					$i = 0;
					do{ ?>
						<div class="scroller-column">
							<h2>Col <?php echo $i+1; ?></h2>
							<ul>
								<li>One</li>
								<li>Two</li>
								<li>Three</li>
								<li>Four</li>						
							</ul>
						</div>
				<?php $i++; 
					} while ($i < $no_columns); ?>
				
			</div>
		</div>
		
		<script>myscroll = new scroller('scroller-inner',960,320,<?php echo $no_columns ?>,true)</script>
		
		<div id="controls">
			<p><span onclick="myscroll.left_scroll();">&larr;</span> | <span onclick="myscroll.right_scroll();">&rarr;</span></p>
		</div>
		<p><i><a href="http://www.andrewbeeken.co.uk">Visit my website at andrewbeeken.co.uk to find out more!</a></i></p>
	</body>
</html>