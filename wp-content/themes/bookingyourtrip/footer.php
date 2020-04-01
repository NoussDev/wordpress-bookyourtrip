        </div>

        <footer>
        <?php wp_nav_menu([
          "theme_location" => "footer", 
          "container" => false, 
          "menu_class" =>"navbar-nav mr-auto"
          ]) // je dis que le menu que j'utilise = au menu qui est dans functions.php ?>
        </footer>
        <div>
            <?= get_option("agence_horaire"); //afficher les horaires ?>
        </div>
        <?php wp_footer() ?>
    </body>
</html>