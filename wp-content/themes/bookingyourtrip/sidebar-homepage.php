<?php if (!dynamic_sidebar("homepage")) : //récupère la sidebar créer dans wordpress avec les widgets, si elle est vide, sidebar par défaut
?>

    <div class="p-4">
        <h4 class="font-italic">Rechercher</h4>
        <ol class="list-unstyled mb-0">
            <?php get_search_form(); ?>
        </ol>
    </div>

    <div class="p-4">
        <h4 class="font-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
            <?php wp_get_archives(["type" => 'monthly']); ?>
        </ol>
    </div>

<?php endif ?>