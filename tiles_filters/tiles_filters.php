<?php

/*

Description:

Add JavaScript functionality that will filter displayed tiles to active category.

Active category should be highlighted.
"All" category should display all tiles.
Any kind of animation between category swap is welcomed.

Tips:
- display only tiles from active category. Imagine the grid as a wall of images. You don’t want to display empty white space to the end user.
- don’t modify existing code. You often won’t have the possibility to adjust markup as you like/need.
- the categories aren’t set in stone. What if there was an additional category?
- remember that HTML stands for content, CSS for looks and JS for behavior. Don’t mix them up.
- #perfmatters.
- look at this exercise as a part of a larger dynamic application. Don’t create code that only “works”. Try to use best practices.

*/

$categories = array( 'all', 'red', 'blue', 'green', 'yellow' );

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tiles filters</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<style>
		/* DEFAULTS - don't modify */
		body {
			width: 800px;
			margin: 0 auto;
			text-align: center;
			padding: 1em;
		}

		ul {
			list-style: none;
			padding: 0;
			margin: 0;
		}

		li {
			display: inline-block;
		}

		.categories {
			margin-bottom: 1em;
		}

		.categories a {
			display: inline-block;
			text-decoration: none;
			text-transform: uppercase;
			font-weight: bold;
			color: #333333;
			margin: 0 1em;
			padding: .5em;
		}

		.tiles li {
			padding: 1em;
			width: 25%;
			float: left;
			box-sizing: border-box;
			color: #ffffff;
		}

		.cat-red { background: #e74c3c; }
		.cat-blue { background: #3498db; }
		.cat-green { background: #2ecc71; }
		.cat-yellow { background: #f1c40f; }
		/* DEFAULTS - END */

		/* YOUR STYLES BELOW */
		.activeMenu{background: #797979;}
		.checked{background: #797979;color:black!important;}
	</style>
</head>
<body>

	<ul class="categories">
		<?php foreach ( $categories as $category ) : ?>
			<li><a href="#cat-<?php echo $category ?>"><?php echo $category ?></a></li>
		<?php endforeach; ?>
	</ul>

	<ul class="tiles">
		<?php for ( $i = 0; $i < 20; $i++ ) : ?>
			<li class="cat-<?php echo $categories[ rand( 1, 4 ) ]; ?>">Tile - <?php echo $i; ?></li>
		<?php endfor; ?>
	</ul>
	<div id="demo"></div>
 <script>
$(document).ready(function(){
	$("ul li a").click(function() {
	  $('li a').removeClass("activeMenu");
	  $(this).addClass('activeMenu');
	});
	$('a').click(function (event){ 
	     event.preventDefault();
	     var cat = $(this).attr('href');
	     var color = cat.substring(1,100);
	     $.ajax({
	        url: $(this).attr('href')
	        ,success: function(response) {
	        	$('li').removeClass('checked');
	            $('.tiles .'+color).addClass('checked');
	        }
	     })
	     return false;
	});
}); 
</script> 
</body>
</html>