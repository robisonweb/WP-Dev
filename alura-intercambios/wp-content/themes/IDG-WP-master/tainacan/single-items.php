<?php get_header(); ?>

	<main id="main-single">
		<div class="container">
			<div class="row">
				<?php the_breadcrumb(); ?>
			</div>

			<div class="row" id="content">
				<div class="col-12 pt-4 pb-4">
					<h1 class="page-title text-center"><?php the_title(); ?></h1>

					<?php if ( have_posts() ) : ?>
						<?php do_action( 'tainacan-interface-single-item-top' ); ?>
						<?php while ( have_posts() ) : the_post(); ?>
						
							<div class="tainacan-single-post collection-single-item">
								<article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
									<?php if ( tainacan_has_document() ) : ?>
										<div class="box-tainacan-document">
											<?php echo share_box(); ?>
											<?php tainacan_the_document(); ?>
										</div>
									<?php endif; ?>
								</article>
							</div>


							<?php if ( tainacan_has_document() ) : ?>
								<div class="tainacan-border"></div>
							<?php endif; ?>

							<?php
								$attachment = array_values(
									get_children(
										array(
											'post_parent' => $post->ID,
											'post_type' => 'attachment',
											'post_mime_type' => 'image',
											'order' => 'ASC',
											'numberposts'  => -1,
										)
									)
								);
							?>

							<?php if ( ! empty( $attachment ) ) : ?>

								<section class="box-carousel-attachments">
									<h3 class="box-carousel-attachments__title"><?php _e( 'Attachments', 'tainacan-interface' ); ?></h3>

									<div class="box-carousel-attachments__wrapper">
										<div class="box-carousel__control">
											<button type="button" class="control__next"><i class="mdi mdi-chevron-right"></i></button>
											<button type="button" class="control__prev"><i class="mdi mdi-chevron-left"></i></button>
										</div>

										<ul class="carousel-attachments">
											<?php foreach ( $attachment as $attachment ) { ?>
												<li>
													<a href="<?php echo $attachment->guid; ?>" target="_BLANK" style="background-image: url(<?php echo wp_get_attachment_image_url( $attachment->ID, 'tainacan-interface-item-attachments' ); ?>);"></a>
												</li>
											<?php }
											?>
										</ul>
									</div>
								</section>

								<div class="tainacan-title my-5">
									<div class="border-bottom border-silver tainacan-title-page" style="border-width: 1px !important;">
									</div>
								</div>
								
								<div class="tainacan-border"></div>

							<?php endif; ?>

							

							<div class="tainacan-single-post">
								<article role="article">
									<?php do_action( 'tainacan-interface-single-item-metadata-begin' ); ?>

									<ul class="box-acervo__metadata">
										<li>
											<div class="box-acervo__header">
												<h4 class="box-acervo__metadata-title"><?php _e( 'Thumbnail', 'tainacan-interface' ); ?></h4>
												<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'tainacan-medium-full' ) ?>">
											</div>
										</li>
										
										<?php
											$args = array(
												'before_title' => '<li><h4 class="box-acervo__metadata-title">',
												'after_title' => '</h4>',
												'before_value' => '<p>',
												'after_value' => '</p></li>',
											);
											//$field = null;
											tainacan_the_metadata( $args );
										?>
									</ul>
								</article>
							</div>


						<?php endwhile; ?>
					<?php else : ?>
						<?php _e( 'Nothing found', 'tainacan-interface' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</main>

<?php get_footer(); ?>
