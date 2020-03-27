        </div>

        <footer>
        <?php wp_nav_menu([
          "theme_location" => "footer", 
          "container" => false, 
          "menu_class" =>"navbar-nav mr-auto"
          ]) // je dis que le menu que j'utilise = au menu qui est dans functions.php ?>
        </footer>
        <?php wp_footer() ?>
    </body>
</html>