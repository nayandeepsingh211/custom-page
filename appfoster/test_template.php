<?php get_header();?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				$data = file_get_contents('https://raw.githubusercontent.com/LearnWebCode/json-example/master/animals-1.json');
				$data = json_decode($data);
			?>
			<table style="width:100%; ">
				<tr><th>Name</th><th>Species</th><th>Food</th></tr>
				<?php foreach($data as $k => $v){ ?>
					<tr>
						<td><?php echo $v->name?></td>
						<td><?php echo $v->species?></td>
						<td>
							<table>
								<tr><td>Likes</td></tr>
								<tr><td><table>
									<?php
										$food = $v->foods;//print_r($food->likes);
										$likes = $food->likes;
										foreach($likes as $l){ ?>
											<tr><td><?php echo $l;?></td></tr>

									<?php     }

									?>
								</table></td></tr>
								<tr><td>Dislikes</td></tr>
								<tr><td><table>
									<?php
										$food1 = $v->foods;//print_r($food->likes);
										$dislikes = $food1->dislikes;
										foreach($dislikes as $d){ ?>
											<tr><td><?php echo $d;?></td></tr>

									<?php     }

									?>
								</table></td></tr>
							</table>
							<?php //foreach($foo)?>

						</td>
					</tr>
				<?php } ?>
			</table>
			<?php
				/*echo "<pre>";
				print_r($data);
				echo "</pre>";*/
			?>


		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
<?php
get_footer();
?>
