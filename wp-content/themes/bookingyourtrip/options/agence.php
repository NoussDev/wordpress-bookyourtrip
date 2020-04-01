<?php

class AgenceMenuPage {

    const GROUP = "agence_options";

    public static function register(){
        add_action("admin_menu",[self::class, "addMenu"]);
        add_action("admin_init",[self::class, "registerSettings"]);
    }

    public static function registerSettings(){
        register_setting(self::GROUP,"agence_horaire");
        add_settings_section("agence_options_section", "Paramètres", function(){
            echo "Vous pouvez ici gérer les paramètres liés à l'agence de voyage.";
        }, self::GROUP);

        add_settings_field("agence_options_horaires", "Horaires d'ouverture", function(){
            ?>
                <textarea name="agence_horaire" cols="30" rows="10" style="width:100%"><?= get_option("agence_horaire") ?></textarea>
            <?php
        }, self::GROUP, "agence_options_section"); // add_settings_field(nom du champ, label du champ, ce qu'affiche le champ, son group, sa section)
    }

    // Enregistrer un menu
    public static function addMenu(){
        add_options_page("Gestion de l'agence", "Agence", "manage_options",self::GROUP, [self::class, "render"]); // j'enregistre une page
    }

    //je rend le contenu de la page
    public static function render(){
        ?>
        <h1>Gestion de l'agence</h1>
        <form action="options.php" method="post">
            <?php 
                settings_fields(self::GROUP); 
                do_settings_sections(self::GROUP) 
             ?>

            <?php submit_button() ?>
        </form>
        <?php
    }
}