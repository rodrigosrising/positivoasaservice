<div class="hero">
	<?php if( have_rows('slides', 'option') ): ?>
	<div class="owl-carousel owl-theme owl-hero">
		<?php while ( have_rows('slides', 'option') ) : the_row();
			$imagem = get_sub_field('imagem');
			$imagemArray = wp_get_attachment_image_src($imagem, $size);
			$imagemUrl = $imagemArray[0];
			$size = 'xxxl';
			$ativo = get_sub_field('ativo');

		?>
		<?php if( $ativo ) : ?><div style="background-image:url('<?php echo $imagemUrl ?>" class="hero-item"></div><?php endif; ?>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
</div>
