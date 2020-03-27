<?php get_header() ?>

<?php if (have_posts()) : //si il y a des articles 
?>
    <div class="row">
        <?php while (have_posts()) : the_post(); // tant que j'ai des articles 
        ?>
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <?php the_post_thumbnail("medium", ['class' => 'card-img-top', "alt" => "", "style" => "height:auto;"]) ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title() ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php the_category() ?></h6>
                        <p class="card-text">
                            <?php the_excerpt("En voir plus") ?>
                        </p>
                        <a href="<?php the_permalink() ?>" class="card-link">Voir plus</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        <?php endwhile ?>
    </div>
<?php else : //si pas d'article alors on affiche 
?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php get_footer() ?>