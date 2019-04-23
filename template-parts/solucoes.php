<?php
    $solucoes = new WP_Query('pagename=solucoes-customizadas');
?>

<?php while ( $solucoes->have_posts() ) : $solucoes->the_post();

$notebook = get_field('notebook');
$notebookArray = wp_get_attachment_image_src($notebook, $size);
$notebookUrl = $notebookArray[0];
$notebookAlt = get_post_meta($notebook , '_wp_attachment_image_alt', true);
$desktop = get_field('desktop');
$desktopArray = wp_get_attachment_image_src($desktop, $size);
$desktopUrl = $desktopArray[0];
$desktopAlt = get_post_meta($desktop , '_wp_attachment_image_alt', true);
$mobile = get_field('mobile');
$mobileArray = wp_get_attachment_image_src($mobile, $size);
$mobileUrl = $mobileArray[0];
$mobileAlt = get_post_meta($mobile , '_wp_attachment_image_alt', true);
$allinone = get_field('all_in_one');
$allinoneArray = wp_get_attachment_image_src($allinone, $size);
$allinoneUrl = $allinoneArray[0];
$allinoneAlt = get_post_meta($allinone , '_wp_attachment_image_alt', true);
$servidor = get_field('servidores');
$servidorArray = wp_get_attachment_image_src($servidor, $size);
$servidorUrl = $servidorArray[0];
$servidorAlt = get_post_meta($servidor , '_wp_attachment_image_alt', true);
$size = 'xl'; // (thumbnail, medium, large, full or custom size)

?>
<section id="solucoes" class="page-section solucoes">
    <div class="solucoes-container">
        <div class="solucoes-box">
            <h2 class="solucoes-titulo"><?php the_title() ?></h2>
            <div class="solucoes-cover hide-for-large">
                <div class="solucoes-item">
                    <div class="solucoes-item-texto">
                        <?php the_content() ?>
                    </div>
                    <a href="javascript:void(0);" title="title" id="solucoes-btn" class="button secondary">Equipamentos Disponíveis para Locação</a>
                </div>
            </div>
            <div class="solucoes-box-content show-for-large">
                <div class="solucoes-item">
                    <div class="solucoes-item-texto">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="texto-equipamentos show-for-large">
            <h5><strong>Equipamentos Disponíveis<br>para Locação</strong></h5>
        </div>
        <div id="sbig" data-slider-id="1" class="owl-carousel owl-theme owl-solucoes">
            <div class="solucoes-item">
                <div class="solucoes-item-imagem">
                    <img src="<?php echo $notebookUrl ?>" alt="<?php echo $notebookAlt ?>">
                </div>
            </div>
            <div class="solucoes-item">
                <div class="solucoes-item-imagem">
                    <img src="<?php echo $desktopUrl ?>" alt="<?php echo $desktopAlt ?>">
                </div>
            </div>
            <div class="solucoes-item">
                <div class="solucoes-item-imagem">
                    <img src="<?php echo $mobileUrl ?>" alt="<?php echo $mobileAlt ?>">
                </div>
            </div>
            <div class="solucoes-item">
                <div class="solucoes-item-imagem">
                    <img src="<?php echo $allinoneUrl ?>" alt="<?php echo $allinoneAlt ?>">
                </div>
            </div>
            <div class="solucoes-item">
                <div class="solucoes-item-imagem">
                    <img src="<?php echo $servidorUrl ?>" alt="<?php echo $servidorAlt ?>">
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; wp_reset_postdata(); ?>