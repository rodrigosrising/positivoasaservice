<?php
    $consultor = new WP_Query('pagename=fale-com-um-consultor');
?>

<?php while ( $consultor->have_posts() ) : $consultor->the_post();
    $formulario = get_field('formulario');
?>
<section id="consultor" class="consultor">
    <div class="consultor-content">
        <h3 class="title"><?php the_title() ?></h3>
        <?php the_content() ?>
        <div class="consultor-content-form">
            <?php echo do_shortcode($formulario) ?>
            <!-- <form action="">
                <input type="text" placeholder="Nome" class="i-nome">
                <input type="email" placeholder="Email" class="i-email">
                <input type="text" placeholder="Empresa" class="i-empresa">
                <input type="text" placeholder="CNPJ" class="i-cnpj">
                <input type="text" placeholder="Tamanho da Empresa" class="i-tamanho">
                <textarea name="" cols="30" rows="10" placeholder="Mensagem" class="i-mensagem"></textarea>
                <div class="i-submit">
                    <label>
                    <input id="remember" type="checkbox" name="remember" checked><span>Aceito receber mais informações</span>
                    </label>
                    <input type="submit" value="Enviar" class="button button-submit">
                </div>
            </form> -->
        </div>
    </div>
</section>
<?php endwhile; wp_reset_postdata(); ?>