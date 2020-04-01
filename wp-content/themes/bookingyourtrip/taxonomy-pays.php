<?php get_header() ?>

<h2><?= esc_html(get_queried_object()->name) ?></h2>
<p> <?= esc_html(get_queried_object()->description) ?></p>

<?php get_template_part("parts/filtre-pays"); ?>

<?php if (have_posts()) : //si il y a des articles 
?>
    <div class="row">
        <?php while (have_posts()) : the_post(); // tant que j'ai des articles 
        ?>
            <div class="col-sm-4">
                <?php get_template_part("parts/card", "post"); // == require("parts/card.php") sauf que réutilisable avec wordpress?> 
            </div>
        <?php endwhile ?>
    </div>

    <?php bookingyourtrip_pagination() //fonction perso dans functions.php ?>
<?php else : //si pas d'article alors on affiche 
?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php get_footer() ?>