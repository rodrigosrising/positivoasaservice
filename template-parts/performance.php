<?php
$performance = new WP_Query('pagename=performance');
?>
<?php while ( $performance->have_posts() ) : $performance->the_post();
$bannerPerformance = get_field('banner_performance');
$bannerPerformanceArray = wp_get_attachment_image_src($bannerPerformance, $size);
$bannerPerformanceUrl = $bannerPerformanceArray[0];
$bannerPerformanceAlt = get_post_meta($bannerPerformance , '_wp_attachment_image_alt', true);
$size = 'xxxl';

$windows = get_field('windows');
$windowsArray = wp_get_attachment_image_src($windows, $size);
$windowsUrl = $windowsArray[0];
$windowsAlt = get_post_meta($windows , '_wp_attachment_image_alt', true);
$linkWindows = get_field('link_windows');

$intel = get_field('intel');
$intelArray = wp_get_attachment_image_src($intel, $size);
$intelUrl = $intelArray[0];
$intelAlt = get_post_meta($intel , '_wp_attachment_image_alt', true);
$linkIntel = get_field('link_intel');

?>
<section id="performance" class="performance">
    <div class="performance-imagem">
        <img src="<?php echo $bannerPerformanceUrl ?>" alt="<?php echo $bannerPerformanceAlt ?>">
    </div>
    <div class="performance-container">
        <div class="performance-texto">
            <h3 class="titulo"><?php the_title() ?></h3>
            <?php the_content() ?>
        </div>
        <div class="performance-marcas">
            <div class="performance-marcas-lista">
                <a href="<?php echo esc_url($linkWindows['url']); ?>" target="_blank" title="<?php echo esc_attr($linkWindows['title']); ?>">
                    <img src="<?php echo $windowsUrl ?>" alt="<?php echo $windowsAlt ?>">
                </a>
                <a href="<?php echo esc_url($linkIntel['url']); ?>" target="_blank" title="<?php echo esc_attr($linkIntel['title']); ?>">
                    <img src="<?php echo $intelUrl ?>" alt="<?php echo $intelAlt ?>">
                </a>
            </div>
        </div>
    </div>
</section>
<?php endwhile; wp_reset_postdata(); ?>