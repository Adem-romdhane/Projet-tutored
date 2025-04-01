<?php get_header(); ?>

<h1 style="color: green; font-family: 'Poppins', sans-serif; font-weight: 600;"><?php the_title(); ?></h1>

<?php if (has_post_thumbnail()) { the_post_thumbnail(); } ?>



<!--<a href="<?php echo get_post_type_archive_link( 'nuisible' ); ?>">Retour à la liste des nuisibles</a>-->

<div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Description</h3>
                    <p><?php the_content(); ?></p>
    <p><strong>Nom scientifique : </strong><?php echo carbon_get_post_meta( get_the_ID(), 'nuisible_latin_name' ); ?></p>
    <p><strong>Description détaillée : </strong><?php echo carbon_get_post_meta( get_the_ID(), 'nuisible_description' ); ?></p>

    

    <p><strong>Prévention : </strong><?php echo carbon_get_post_meta( get_the_ID(), 'nuisible_prevention' ); ?></p>
    <p><strong>Traitement : </strong><?php echo carbon_get_post_meta( get_the_ID(), 'nuisible_traitement' ); ?></p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                  <?php 
    $image_id = carbon_get_post_meta( get_the_ID(), 'nuisible_image' );
    if ($image_id) {
        echo wp_get_attachment_image( $image_id, 'full' );
    }
    ?>
                  </div>
                </div>

<?php get_footer(); ?>
