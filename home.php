<?php get_header();?>
<section id="blog" class="bloco-blog">
	<div class="grid-container">
		<div class="grid-x grid-margin-x grid-padding-x">
			<div class="cell small-12">
				<div class="box-search">
					<p class="blog-title text-center">Boa Leitura</p><span class="search-button">Pesquisar <i class="fas fa-search"></i></span>
				</div>
			</div>
		</div>
	</div>

	<?php
	$destaque = array(
		'post_type' 		=> 'post',
		'post_status' 		=> 'publish',
		'posts_per_page' 	=> 2,
		'orderby' 			=> 'date',
		'order'   			=> 'ASC',
		// 'offset' => 2,
	);
	$query1 = new WP_Query( $destaque );
	?>
	<?php if ( $query1->have_posts() ) : ?>
	<div class="blog-destaque">
		<div class="grid-container">
			<div class="grid-x grid-margin-x grid-padding-x">
				<?php while ( $query1->have_posts() ) : $query1->the_post(); ?>
				<div class="cell small-12 medium-6">
					<div class="blog-destaque-item">
						<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail('destaque') ?>
							<div class="blog-destaque-item-info">
							<h3 class="blog-destaque-item-titulo"><?php the_title() ?></h3>
							</div>
						</a>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	<?php endif; wp_reset_postdata(); ?>

	<div class="grid-container">
		<div class="grid-x">
			<div class="cell small-12 medium-10 medium-offset-1">
				<div class="lista-posts">
					<div class="grid-container">
						<div class="grid-x grid-margin-x grid-padding-x">
						<?php
							$lista_posts = array(
								'post_type' 		=> 'post',
								'post_status' 		=> 'publish',
								'orderby' 			=> 'post_date',
								'order'   			=> 'ASC',
								'offset' 			=> 2,
							);
							$query2 = new WP_Query( $lista_posts );
						?>
						<?php if ( $query2->have_posts() ) : while ( $query2->have_posts() ) : $query2->the_post(); ?>
							<div class="cell small-12 medium-6 large-4">
								<div class="lista-posts-item">
									<h4 class="lista-posts-item-titulo"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></h4>
									<span class="lista-posts-item-meta"><?php the_time('l, j F Y') ?></span>
									<p class="lista-posts-item-texto"><?php the_excerpt() ?></p>
									<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="button button-mais">Mais</a>
								</div>
							</div>
						<?php endwhile; else : ?>
							<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer();?>