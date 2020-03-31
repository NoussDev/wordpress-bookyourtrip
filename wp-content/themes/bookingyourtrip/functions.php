<?php

//mes fonctions
function bookingyourtrip_support(){
    add_theme_support('title-tag');//supporte le titre de la page/article
    add_theme_support("post-thumbnails"); //supporte les images mise en avant
    add_theme_support('menus');
    register_nav_menu('header','En tête du menu');
    register_nav_menu('footer','Pied de page');

    add_image_size("card-header", 350, 215, true); //on génère un format d'image
    //remove_image_size("medium"); possiblité de supprimer les formats de wordpress
    //add_image_size("medium", 500, 500) //pour les recréer
}

function bookingyourtrip_register_assets(){
    wp_register_style('bootstrap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"); //il trouve le css
    wp_register_script("bootstrap","https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", ["popper","jquery"], false, true); // je dis que bootstrap à besoin de popper et jquery
    wp_register_script("popper","https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", [], false, true);
    wp_deregister_script("jquery"); //je n'utilise pas le jquery intégrer à wordpress
    wp_register_script("jquery","https://code.jquery.com/jquery-3.4.1.slim.min.js", [], false, true);

    wp_enqueue_style("bootstrap");//charge bootstrap css
    wp_enqueue_script("bootstrap");//charge bootstrap js (avec popper et jquery)
}

function bookingyourtrip_title_separator(){
    // change le titre de la page de " - " en " | "
    return " | ";
}

function bookingyourtrip_menu_class($classes){
    //ajoute la class "nav-item" de bootstrap à mon menu
    $classes[]= 'nav-item';
    return $classes;
}

function bookingyourtrip_menu_link($attrs){
    //ajoute la class "nav-item" de bootstrap à mon menu
    $attrs['class']= 'nav-link';
    return $attrs;
}

//création d'une fonction de pagination personnalisé car on ne peut pas changer les classes nativement avec wordpress
function bookingyourtrip_pagination(){
    $pages = paginate_links(["type" => "array"]); //je récupère la liste des liens sous forme de tableau
    if(empty($pages)){
        return;
    }
    echo '<nav aria-label="Pagination" class="my-4">';
        echo '<ul class="pagination">';
    foreach($pages as $page){
        $active = strpos($page, 'current'); //si il y a "current" alors je place active de bootstrap dans la classe
        $class= "page-item";
        if($active){
            $class.=' active';
        }
            echo '<li class="' . $class . '">';
                echo str_replace('page-numbers','page-link',$page); //je remplace la classe "page-numbers" native de wordpress par "page-link" de bootstrap
            echo '</li>';
    }
        echo '</ul>';
    echo '</nav>';
}


//mes actions
add_action('after_setup_theme','bookingyourtrip_support'); //titre à la page
add_action('wp_enqueue_scripts','bookingyourtrip_register_assets'); //génère mon css et js
add_filter("document_title_separator", "bookingyourtrip_title_separator"); //le filtre me permet de changer le title séparator en ma fonction (qui retourn |)
add_filter("nav_menu_css_class", "bookingyourtrip_menu_class"); //ajoute une class css à mon menu
add_filter("nav_menu_link_attributes", "bookingyourtrip_menu_link"); //ajoute une class css au lien du menu


require_once ("metaboxes/sponso.php");
SponsoMetaBox::register();


