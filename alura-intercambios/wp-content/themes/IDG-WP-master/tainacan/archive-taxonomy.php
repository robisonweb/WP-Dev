<?php
$current_term = tainacan_get_term();
$current_taxonomy = get_taxonomy( $current_term->taxonomy );
?>
<?php get_header(); ?>
	<main id="main-single">
		<div class="container">
			<div class="row">
				<?php the_breadcrumb(); ?>
			</div>

			<div class="row" id="content">
				<div class="col-12 pt-4 pb-4">
					<h1 class="page-title text-center"><?php echo $current_taxonomy->label; ?>: <span><?php tainacan_the_term_name(); ?></span></h1>
					<?php echo share_box('',true); ?>
				</div>
			</div>
		</div>

		<div class="pt-4 pb-4">
			<p>
				<?php tainacan_the_term_description(); ?>
			</p>

			<?php tainacan_the_faceted_search(); ?>
		</div>
	</main>

<?php get_footer(); ?>