<?php
    $vocesabia = new WP_Query('pagename=voce-sabia');
?>

<?php while ( $vocesabia->have_posts() ) : $vocesabia->the_post();

$texto1 = get_field('area_de_texto_1');
$texto2 = get_field('area_de_texto_2');
$texto3 = get_field('area_de_texto_3');
$texto4 = get_field('area_de_texto_4');

$link1 = get_field('link_1');
$link2 = get_field('link_2');
$link3 = get_field('link_3');
$link4 = get_field('link_4');

$imagem1 = get_field('imagem_1');
$imagem1array = wp_get_attachment_image_src($imagem1, $size);
$imagem1Url = $imagem1array[0];
$imagem1Alt = get_post_meta($imagem1, '_wp_attachment_image_alt', true);

$imagem2 = get_field('imagem_2');
$imagem2array = wp_get_attachment_image_src($imagem2, $size);
$imagem2Url = $imagem2array[0];
$imagem2Alt = get_post_meta($imagem2, '_wp_attachment_image_alt', true);

$imagem3 = get_field('imagem_3');
$imagem3array = wp_get_attachment_image_src($imagem3, $size);
$imagem3Url = $imagem3array[0];
$imagem3Alt = get_post_meta($imagem3, '_wp_attachment_image_alt', true);

$imagem4 = get_field('imagem_4');
$imagem4array = wp_get_attachment_image_src($imagem4, $size);
$imagem4Url = $imagem4array[0];
$imagem4Alt = get_post_meta($imagem4, '_wp_attachment_image_alt', true);

$size = 'xxl'; // (thumbnail, medium, large, full or custom size)


?>
<section id="vocesabia" class="vocesabia">
    <div class="vs-bloco">
        <div class="vs-titulo">
            <h3 class="titulo"><?php the_title() ?></strong></h3>
        </div>
        <div class="vs-bloco-item elem1">
            <img src="<?php echo $imagem1Url ?>" alt="<?php echo $imagem1Alt ?>" class="vs-bloco-item-imagem">
        </div>
        <div class="vs-bloco-item elem4">
            <img src="<?php echo $imagem2Url ?>" alt="<?php echo $imagem2Alt ?>" class="vs-bloco-item-imagem">
        </div>
        <div class="vs-bloco-item elem5">
            <img src="<?php echo $imagem3Url ?>" alt="<?php echo $imagem3Alt ?>" class="vs-bloco-item-imagem">
        </div>
        <div class="vs-bloco-item elem8">
            <img src="<?php echo $imagem4Url ?>" alt="<?php echo $imagem4Alt ?>" class="vs-bloco-item-imagem">
        </div>
        <div class="vs-bloco-item elem2">
            <div class="vs-bloco-item-texto vs-t1">
            <p><?php echo $texto1 ?></p>
            <?php if( $link1 ) : ?><a href="<?php echo esc_url($link1); ?>" title="" class="seta seta-1"><img src="<?php echo get_template_directory_uri() ?>/assets/images/seta.svg" alt=""></a><?php endif; ?>
            </div>
        </div>
        <div class="vs-bloco-item elem3">
            <div class="vs-bloco-item-texto vs-t2">
            <p><?php echo $texto2 ?></p>
            <?php if( $link2 ) : ?><a href="<?php echo esc_url($link2); ?>" title="" class="seta seta-2"><img src="<?php echo get_template_directory_uri() ?>/assets/images/seta2.svg" alt=""></a><?php endif; ?>
            </div>
        </div>
        <div class="vs-bloco-item elem6">
            <div class="vs-bloco-item-texto vs-t1">
            <p><?php echo $texto3 ?></p>
            <?php if( $link3 ) : ?><a href="<?php echo esc_url($link3); ?>" title="" class="seta seta-1"><img src="<?php echo get_template_directory_uri() ?>/assets/images/seta.svg" alt=""></a><?php endif; ?>
            </div>
        </div>
        <div class="vs-bloco-item elem7">
            <div class="vs-bloco-item-texto vs-t2">
            <p><?php echo $texto4 ?></p>
            <?php if( $link4 ) : ?><a href="<?php echo esc_url($link4); ?>" title="" class="seta seta-2"><img src="<?php echo get_template_directory_uri() ?>/assets/images/seta2.svg" alt=""></a><?php endif; ?>
            </div>
        </div>
    </div>
    <div class="vs-info">
        <p class="vs-info-big">Evite problemas futuros com a <span>Positivo As A Service.</span></p>
    </div>
</section>
<?php endwhile; wp_reset_postdata(); ?>