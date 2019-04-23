<?php get_header();?>
<section id="post" class="bloco-post">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="grid-container">
		<div class="grid-x grid-margin-x grid-padding-x">
			<div class="cell small-12 medium-10 medium-offset-1 large-8 large-offset-2">
				<div class="post-item-box">
					<div class="post-item-data"><?php the_time('l, j F Y') ?></div>
					<h1 class="post-item-titulo"><?php the_title() ?></h1>
					<div class="post-item-autor">Por <?php the_author_posts_link(); ?></div>
					<p class="post-item-texto"><?php the_excerpt(); ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="grid-container full">
		<div class="grid-x">
			<div class="cell small-12">
				<div class="post-item-image">
					<?php the_post_thumbnail('full') ?>
				</div>
			</div>
		</div>
	</div>
	<div class="grid-container">
		<div class="grid-x grid-margin-x grid-padding-x">
			<div class="cell small-12 medium-10 medium-offset-1 large-8 large-offset-2">
				<div class="post-item-content">
					<?php the_content(); ?>
				</div>
				<ul class="post-item-like">
					<li class="facebook"><a href=""><i class="fab fa-facebook"></i> Facebook</a></li>
					<li class="twitter"><a href=""><i class="fab fa-twitter"></i> Tweeter</a></li>
				</ul>
			</div>
		</div>
	</div>
<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</section>


<?php get_template_part( 'template-parts/relacionados' ); ?>
<?php get_footer();?>