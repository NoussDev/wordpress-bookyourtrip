<?php get_header() ?>

<?php //wp_list_categories(['taxonomy' => "pays", "title_li" => ""]); ?>

<h1>Voir tous nos hôtels</h1>

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