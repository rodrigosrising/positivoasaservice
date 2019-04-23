<?php
    $cases = new WP_Query('pagename=cases');
?>
<?php while ( $cases->have_posts() ) : $cases->the_post();
$destaque = get_field('destaque');
$nome = get_field('nome');

// get iframe HTML
$video = get_field('video');

// use preg_match to find iframe src
preg_match('/src="(.+?)"/', $video, $matches);
$src = $matches[1];

// add extra params to iframe src
$params = array(
    'controls' => 0,
    'hd' => 1,
    'autohide' => 1,
);

$new_src = add_query_arg($params, $src);
$video = str_replace($src, $new_src, $video);

// add extra attributes to iframe html
$attributes = 'frameborder="0"';
$video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $video);
?>
<section id="cases" class="page-section cases">
    <div id="diogo-santos" class="cases-carreira">
        <div class="cases-chamada">
            <div class="cases-chamada-box">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/aspas1.png" class="cases-aspas cases-aspas-1" alt="quote">
                <h2 class="titulo"><?php echo $destaque ?></h2>
                <p><?php echo $nome ?></p>
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/aspas2.png" class="cases-aspas cases-aspas-2" alt="quote">
            </div>
        </div>
    </div>
    <div class="cases-video-link">
        <?php the_content()?>
        <a href="javascript:void(0)" class="cases-video-link-bg">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/bg-link-video-diogo.jpg" alt="Diego Santos">
        </a>
    </div>
    <div class="cases-video-container" id="videoPlayer">
        <a href="javascript:void(0)" class="cases-video-fechar">X</a>
        <?php echo $video; ?>
    </div>
</section>
<?php endwhile; wp_reset_postdata(); ?>
