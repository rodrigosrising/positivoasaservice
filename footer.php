</main><!--main-->
<!--main-->
<?php
	// logo
	$logoFooter = get_field('logo_rodape', 'option');
	$logoFooterArray = wp_get_attachment_image_src($logoFooter, $size);
	$logoFooterUrl = $logoFooterArray[0];
	$logoFooterAlt = get_post_meta($logoFooter, '_wp_attachment_image_alt', true);
	$size = 'xl';

	// links
	$linkTermos = get_field('link_termos', 'option');
	$linkPrivacidade = get_field('link_privacidade', 'option');

    // Redes Sociais
    $linkedin = get_field('linkedin', 'option');
	$instagram = get_field('instagram', 'option');
	$facebook = get_field('facebook', 'option');
	$twitter = get_field('twitter', 'option');
	$youtube = get_field('youtube', 'option');
?>
<footer class="footer">
	<div class="footer-content">
		<div class="footer-content-item elem1">
			<a href="<?php echo site_url() ?>" title="<?php echo bloginfo('name')?>">
				<img src="<?php echo $logoFooterUrl ?>" alt="<?php echo $logoFooterAlt ?>" class="logo-footer">
			</a>
		</div>
		<div class="footer-content-item elem2">
			<ul class="social-media">
                <?php if($linkedin) : ?><li><a href="<?php echo esc_url($linkedin); ?>" title="LinkedIn"><img src="<?php echo get_template_directory_uri() ?>/assets/images/linkedin.png" alt="LinkedIn"></a></li><?php endif; ?>
                <?php if($instagram) : ?><li><a href="<?php echo esc_url($instagram); ?>" title="Instagram"><img src="<?php echo get_template_directory_uri() ?>/assets/images/instagram.svg" alt="Instagram"></a></li><?php endif; ?>
                <?php if($facebook) : ?><li><a href="<?php echo esc_url($facebook); ?>" title="Facebook"><img src="<?php echo get_template_directory_uri() ?>/assets/images/facebook.svg" alt="Facebook"></a></li><?php endif; ?>
                <?php if($twitter) : ?><li><a href="<?php echo esc_url($twitter); ?>" title="Twitter"><img src="<?php echo get_template_directory_uri() ?>/assets/images/twitter.svg" alt="Twitter"></a></li><?php endif; ?>
                <?php if($youtube) : ?><li><a href="<?php echo esc_url($youtube); ?>" title="Youtube"><img src="<?php echo get_template_directory_uri() ?>/assets/images/youtube.svg" alt="YouTube"></a></li><?php endif; ?>
			</ul>
		</div>
		<div class="footer-content-item elem3">
			<p><a href="<?php echo esc_url($linkTermos['url']); ?>" title="<?php echo esc_attr($linkTermos['title']); ?>">Termos de Uso</a> | <a href="<?php echo esc_url($linkPrivacidade['url']); ?>" title="<?php echo esc_attr($linkPrivacidade['title']); ?>">Privacidade</a></p>
			<span class="sblock">© POSITIVO TECNOLOGIA S/A</span>
			<span class="sblock">Todos os direitos reservados.</span>
			<span class="sblock">Fotos meramente ilustrativas.</span>
		</div>
		<div class="footer-content-item elem4">
			<a href="<?php echo site_url() ?>" title="<?php echo bloginfo('name')?>" class="copy"><span>positivoasaservice</span>.com.br</a>
		</div>
	</div>
</footer><!--footer-->
<a href="#consultor" title="Fale com um consultor" data-smooth-scroll data-offset="103" data-animation-easing="swing" class="fale">
	<div class="ico"><img src="<?php echo get_template_directory_uri() ?>/assets/images/ico-consultures.svg" alt="Fale com um consultor" width="25"></div>
	<div class="texto">Fale com um consultor</div>
</a>
<!--footer-->
<?php wp_footer( ); ?>
</body>
</html>
