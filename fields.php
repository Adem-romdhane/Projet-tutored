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

            // Utilisation d'un éditeur WYSIWYG pour le champ 'symptoms'
            Field::make( 'rich_text', 'symptoms', 'Symptômes' )
                ->set_help_text( 'Ajoutez les symptômes sous forme de liste HTML ou utilisez l\'éditeur pour formater votre texte.' ),

            Field::make( 'rich_text', 'sanitar-risk', 'sanitar' )
                ->set_help_text( 'Ajoutez les risques sanitaires sous forme de liste HTML ou utilisez l\'éditeur pour formater votre texte.' ),

            Field::make( 'rich_text', 'material-risk', 'material' )
                ->set_help_text( 'Ajoutez les risques matériels sous forme de liste HTML ou utilisez l\'éditeur pour formater votre texte.' ),
            
            Field::make( 'textarea', 'nuisible_description', 'Description détaillée' )
                ->set_help_text( 'Ajoutez une description détaillée du nuisible' ),

            Field::make( 'image', 'nuisible_image', 'Image du nuisible' )
                ->set_help_text( 'Ajoutez une image pour illustrer ce nuisible' ),
            
            Field::make( 'image', 'sanitar_image', 'Image Risque Sanitaire' ),
            Field::make( 'image', 'material_image', 'Image Risque Matériel' ),
                

            Field::make( 'textarea', 'nuisible_prevention', 'Prévention' )
                ->set_help_text( 'Comment prévenir l\'apparition de ce nuisible ?' ),

            Field::make( 'textarea', 'nuisible_traitement', 'Traitement' )
                ->set_help_text( 'Quels traitements ou solutions existent pour éliminer ce nuisible ?' ),
        ) );
}

add_action( 'carbon_fields_register_fields', 'add_nuisible_fields' );
