<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

function add_nuisible_fields() {
    // Ajouter un container pour les champs du type de contenu 'nuisible'
    Container::make( 'post_meta', 'Informations détaillées sur le nuisible' )
        ->where( 'post_type', '=', 'nuisible' )  // Limite à notre type de contenu 'nuisible'
        ->add_fields( array(
            Field::make( 'text', 'nuisible_latin_name', 'Nom scientifique' )
                ->set_help_text( 'Entrez le nom scientifique du nuisible' ),
            Field::make( 'textarea', 'nuisible_description', 'Description détaillée' )
                ->set_help_text( 'Ajoutez une description détaillée du nuisible' ),
            Field::make( 'image', 'nuisible_image', 'Image du nuisible' )
                ->set_help_text( 'Ajoutez une image pour illustrer ce nuisible' ),
            Field::make( 'textarea', 'nuisible_prevention', 'Prévention' )
                ->set_help_text( 'Comment prévenir l\'apparition de ce nuisible?' ),
            Field::make( 'textarea', 'nuisible_traitement', 'Traitement' )
                ->set_help_text( 'Quels traitements ou solutions existent pour éliminer ce nuisible?' ),
        ) );
}

add_action( 'carbon_fields_register_fields', 'add_nuisible_fields' );

