<?php

function ajouter_styles_personnalises() {
    wp_enqueue_style('style-personnalise', get_template_directory_uri() . '/assets/main.css');
}
add_action('wp_enqueue_scripts', 'ajouter_styles_personnalises');