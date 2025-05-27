<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// 1. Définir les champs Carbon Fields
function add_nuisible_fields() {
    Container::make('post_meta', 'Informations détaillées sur le nuisible')
        ->where('post_type', '=', 'nuisible')
        ->add_fields(array(

            Field::make( 'complex', 'risques', __( 'Risques' ) )
            ->add_fields( array(
                Field::make( 'select', 'titre', __( 'type de risques' ) )
                ->set_options( array(
                    'Risques sanitaires'=> 'Risques sanitaires',
                    'Risques matériels' => 'Risques matériels',
                    'Prévention' => 'Prévention',
                    'Traitement' => 'Traitement',
                ) ),
                Field::make('image','image', __('visuel')),
                Field::make( 'rich_text', 'content', __( 'contenu' ) ),
            ) )->set_layout('tabbed-vertical')
            ->set_header_template( '
    <% if (titre) { %>
     <%- titre %> 
    <% } %>
' )
            ,

            Field::make('rich_text', 'nuisible_latin_name', 'Nom scientifique')
                ->set_help_text('Entrez le nom scientifique du nuisible'),

            Field::make('textarea', 'informations', 'Informations')
                ->set_help_text('Ajoutez une description détaillée du nuisible'),

            Field::make('rich_text', 'symptoms', 'Symptômes')
                ->set_help_text('Ajoutez les symptômes sous forme de liste HTML ou utilisez l\'éditeur pour formater votre texte.'),

          
            Field::make( 'image', 'nuisible_image', 'Image du nuisible' )
                ->set_help_text( 'Ajoutez une image pour illustrer ce nuisible' ),
            
        ) );
}

add_action('carbon_fields_register_fields', 'add_nuisible_fields');

// 2. Étendre l'éditeur WYSIWYG (TinyMCE) pour ajouter les options de couleur
add_filter('tiny_mce_before_init', function($init) {
    if (isset($init['toolbar1'])) {
        $init['toolbar1'] .= ',forecolor,backcolor'; // Ajoute la sélection de couleur de texte et couleur de fond
    }
    return $init;
});

