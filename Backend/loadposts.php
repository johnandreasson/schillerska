<?php 
	require 'connect.php';
	header("Access-Control-Allow-Origin: *");

	$offset = is_numeric($_POST['offset']) ? $_POST['offset'] : die();
    $postnumbers = is_numeric($_POST['number']) ? $_POST['number'] : die();

	$query = mysql_query("SELECT * FROM _posts WHERE post_status='publish' AND post_type='post' ORDER BY post_date DESC LIMIT ".$postnumbers." OFFSET ".$offset);
	while ($row = mysql_fetch_assoc($query)) { ?>

		<p>
			<div class="inlagg">
				<div class="inlaggwrapper wrapper">    
					<div class="title">
						<h2><?php echo $row['post_title']; ?></h2>
					</div>

					<div class="inlaggcontent">
						<?php echo $row['post_content'];?>
					</div>

					<div class="meta">
						<br>Skrivet: <?php echo $row['post_date']; ?>
					</div>
				</div>
			</div>
		</p>
	<?php } ?>