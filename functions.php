<?php 
    /**
     * Fonction qui permet de charger le css, les bibliothèques css, les fonctions javascript, les polices d'écritures... 
     */
    function theme_enqueue_styles_scripts() {
        // Charger les polices Google
        wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap', [], null);

        // Charger Bootstrap et autres bibliothèques CSS
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', [], null);
        wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css', [], null);
        wp_enqueue_style('aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css', [], null);
        wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/vendor/fontawesome-free/css/all.min.css', [], null);
        wp_enqueue_style('glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css', [], null);
        wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', [], null);

        //Test
        wp_enqueue_style('flaticon-icons', 'https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css', [], null);
    
        
        // Charger le CSS principal du thème
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css', [], null);

        // Charger les scripts JS
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', ['jquery'], null, true);
        wp_enqueue_script('aos', get_template_directory_uri() . '/assets/vendor/aos/aos.js', [], null, true);
        wp_enqueue_script('glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', [], null, true);
        wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', [], null, true);
        wp_enqueue_script('purecounter', get_template_directory_uri() . '/assets/vendor/purecounter/purecounter_vanilla.js', array(), null, true);

        
        // Charger le script principal du thème
        wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', [], null, true);
    }

    add_action('wp_enqueue_scripts', 'theme_enqueue_styles_scripts');

    /**
     * Fonction pour crée le menu pour le header et footer
     */
    function create_menu() {
        register_nav_menus(
            array(
                'menu-haut' => 'Menu Header', 
                'menu-bas'  => 'Menu Footer'
            )
        );
    }
    add_action('after_setup_theme', 'create_menu');
    



