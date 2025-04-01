
<?php 
    /**
     * Fonction qui permet de charger le css, les fonctions javascript, les polices d'écritures... 
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
    
    function ajouter_nuisibles_au_menu($items, $args) {
        if ($args->theme_location == 'menu-haut') { // Vérifie que l'on modifie le bon menu
            // On vérifie s'il y a déjà des éléments de type nuisible
            $types_nuisibles = get_terms(array(
                'taxonomy' => 'type_nuisible',
                'hide_empty' => false
            ));
    
            foreach ($types_nuisibles as $type) {
                // Ajouter la catégorie principale au menu
                $menu_item = '<li class="menu-item menu-item-has-children">';
                $menu_item .= '<a href="#">' . esc_html($type->name) . '</a>';
                $menu_item .= '<ul class="sub-menu">';
    
                // Récupérer les nuisibles liés à cette catégorie
                $nuisibles = get_posts(array(
                    'post_type' => 'nuisible',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'type_nuisible',
                            'field' => 'term_id',
                            'terms' => $type->term_id,
                        ),
                    ),
                    'posts_per_page' => -1
                ));
    
                foreach ($nuisibles as $nuisible) {
                    $menu_item .= '<li><a href="' . get_permalink($nuisible->ID) . '">' . esc_html($nuisible->post_title) . '</a></li>';
                }
    
                $menu_item .= '</ul>';
                $menu_item .= '</li>';
    
                // Ajouter le menu uniquement si ce n'est pas déjà ajouté
                if (strpos($items, esc_html($type->name)) === false) {
                    $items .= $menu_item;
                }
            }
        }
        return $items;
    }

    // Activer Elementor pour le type de contenu "nuisible"
function activer_elementor_nuisible() {
    // Vérifie si Elementor est activé
    if (defined('ELEMENTOR_PATH') && class_exists('Elementor\Plugin')) {
        // Ajouter le support d'Elementor pour le type de contenu 'nuisible'
        add_post_type_support('nuisible', 'elementor');
    }
}
add_action('init', 'activer_elementor_nuisible');

require_once get_template_directory() . '/fields.php';  // Ou le chemin correct si vous placez fields.php dans un sous-dossier


// Inclure le fichier contenant les champs personnalisés pour le type 'nuisible'
//require_once get_template_directory() . '/fields.php';  // Ou le chemin correct si vous placez fields.php dans un sous-dossier




