<?php

class SponsoMetaBox{

    const META_KEY = "byt_sponso";
    const NONCE = "_byt_sponso_nonce";

    public static function register(){
        add_action("add_meta_boxes",[self::class, "add"], 10, 2); //action de création de box => "bookingyourtrip_add_custom_box"
        add_action("save_post", [self::class, "save"]); // action à la sauvegarde d'un article =>  "bookingyourtrip_save_sponso"
    }

    public static function add($postType, $post){
        if($postType === "post" && current_user_can("publish_posts", $post)){ //si il ne peut pas publier d'article, il ne voit pas la box sponso
            add_meta_box(self::META_KEY, "Sponsoring", [self::class, "render"], "post","side"); //render => bookingyourtrip_render_sponso_box
            //ajoute une box "Sponsoring" ou j'appel la fonctione render_sponso, sur les articles dans la barre sur le côté
        }
    }

    public static function render($post){
        $value = get_post_meta($post->ID, self::META_KEY, true);
        wp_nonce_field(self::NONCE, self::NONCE);
        ?>
            <input type="hidden" value="0" name="<?= self::META_KEY ?>">
            <input type="checkbox" value="1" name="<?= self::META_KEY ?>" <?= checked($value,"1") ?>>
            <label for="bytsponso">Cet article est sponsorisé ?</label>
        <?php
    }

    public static function save($post_id){
        if(
            array_key_exists(self::META_KEY, $_POST) && 
            current_user_can("publish_posts", $post_id) && 
            wp_verify_nonce($_POST[self::NONCE],self::NONCE)
            ){ // variable existe et l'utilisateur à le droit de publier des articles ? + token csrf
            if($_POST['byt_sponso'] === "0"){
                delete_post_meta($post_id, self::META_KEY);
            }else{
                update_post_meta($post_id, self::META_KEY, 1);
            }
        }
    }
}