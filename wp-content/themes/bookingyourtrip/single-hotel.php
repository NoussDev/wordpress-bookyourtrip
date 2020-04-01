<?php get_header() ?>

<?php if (have_posts()) : //si il y a des articles 
?>
    <?php while (have_posts()) : the_post(); // tant que j'ai des articles 
    ?>
        <h1><?php the_title() ?></h1>
        <?php if(get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY, true) === "1"):?>
            <div class="alert alert-info">
                Cet article est sponsorisé !
            </div>
        <?php endif ?>
        <p>
            <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width:100%; height:auto">
        </p>
        <p><?php the_content() ?></p>
<?php endwhile;
endif; ?>

<?php get_footer() ?>