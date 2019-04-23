<?php
	$args = array(
		'post_type' 		=> 'empresas',
		'post_status' 		=> 'publish',
		'posts_per_page' 	=> -1,
	);
	$empresas = new WP_Query( $args );
?>
<?php if ( $empresas->have_posts() ) : ?>
<section id="empresas" class="empresas">
    <div class="empresas-container">
        <div class="owl-thumbs owl-theme owl-empresas">
            <?php while ( $empresas->have_posts() ) : $empresas->the_post(); ?>
            <div class="empresas-item">
                <a href="<?php the_field('link') ?>" target="_blank" title="<?php the_title( )?>"><?php the_post_thumbnail() ?></a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; wp_reset_postdata(); ?>