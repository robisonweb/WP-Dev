<?php get_header(); ?>
	<main id="main-single">
		<div class="container">
			<div class="row">
				<?php the_breadcrumb(); ?>
			</div>

			<div class="row" id="content">
				<div class="col-12 pt-4 pb-4">
					<h1 class="page-title text-center">Acervo</h1>
					<?php echo share_box('',true); ?>
				</div>
			</div>
		</div>

		<div class="pt-4 pb-4">
			<?php tainacan_the_faceted_search(); ?>
		</div>
	</main>

<?php get_footer(); ?>