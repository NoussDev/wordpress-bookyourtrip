<?php get_header() ?>

<?php if (have_posts()) : //si il y a des articles 
?>
    <?php while (have_posts()) : the_post(); // tant que j'ai des articles 
    ?>
        <h1><?php the_title() ?></h1>
        <?php if (get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY, true) === "1") : ?>
            <div class="alert alert-info">
                Cet article est sponsorisé !
            </div>
        <?php endif ?>
        <p>
            <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width:100%; height:auto">
        </p>
        <p><?php the_content() ?></p>

        <h2>Articles relatifs</h2>
        <div class="row">
            <?php
            $pays = array_map(function($term) { //comme un foreach. Je parcours le tableau
                return $term->term_id;
            }, get_the_terms(get_post(), "pays"));

            $query = new WP_Query([ //requete perso pour afficher les articles du même pays
                "post__not_in" => [get_the_ID()], //ne pas afficher l'article courant
                "post_type" => "post", //des articles
                "posts_per_page" => 3, //3 articles max
                "orderby" => "rand", //affichage aléatoire
                "tax_query" => [ //filtre par taxonomie
                    [
                        "taxonomy" => "pays",
                        "terms" => $pays,
                    ]
                    ],
                "meta_query" => [ //requete sur meta données - affiche seulement les articles sponso
                    [
                        "key" => SponsoMetaBox::META_KEY,
                        "compare" => "EXISTS"
                    ]
                ]
            ]);
            while ($query->have_posts()) : $query->the_post();
            ?>
                <div class="col-sm-4">
                    <?php get_template_part("parts/card", "post"); // == require("parts/card.php") sauf que réutilisable avec wordpress
                    ?>
                </div>
            <?php endwhile;
            wp_reset_postdata(); //permet de reset la valeur de the_post car il est égale à la valeur de l'article courant (ici l'article relatif)
            ?>
        </div>


<?php endwhile;
endif; ?>

<?php get_footer() ?>