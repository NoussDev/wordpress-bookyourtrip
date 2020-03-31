<?php
/**
 * Template Name: Page avec bannière
 * Template Post Type: page, post
 */
?>

<?php get_header() ?>

<?php if (have_posts()) : //si il y a des articles 
?>
    <?php while (have_posts()) : the_post(); // tant que j'ai des articles 
    ?>
    <p>Ici la bannière !</p>
        <h1><?php the_title() ?></h1>
        <p>
            <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width:100%; height:auto">
        </p>
        <p><?php the_content() ?></p>
<?php endwhile;
endif; ?>

<?php get_footer() ?>