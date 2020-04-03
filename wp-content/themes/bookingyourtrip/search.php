<?php get_header() ?>

<form class="form-inline">
  <input type="text" name="s" class="form-control mb-2 mr-sm-2" value="<?= get_search_query() ?>" placeholder="Votre recherche">

  <div class="form-check mb-2 mr-sm-2">
    <input class="form-check-input" type="checkbox" value="1" name="sponso" id="customControlAutosizing" <?= checked(get_query_var("sponso"),"1") ?>>
    <label class="form-check-label" for="customControlAutosizing">
      Article sponsorisé seulement
    </label>
  </div>

  <button type="submit" class="btn btn-primary mb-2">Rechercher</button>
</form>

<h1 class="mb-4">Résultat pour votre recherche "<?= get_search_query() ?>"</h1>

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








