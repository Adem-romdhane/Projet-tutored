<?php get_header(); ?>






<!--<a href="<?php echo get_post_type_archive_link( 'nuisible' ); ?>">Retour à la liste des nuisibles</a>-->

<!--<div class="row">
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
          echo wp_get_attachment_image( $image_id, 'full', false, array( 'class' => 'nuisible-image' ) );

       // echo wp_get_attachment_image( $image_id, 'full' );
    }
    ?>
                  </div>
                </div>-->
                <div class="row">
                
    <div class="col-lg-8 details order-2 order-lg-1">
    <h1 ><?php the_title(); ?></h1>
        <h3>Quelques informations sur les <?php the_title(); ?> </h3>
        <p><?php the_content(); ?></p>
        <h3>Nom scientifique :</h3><?php echo carbon_get_post_meta( get_the_ID(), 'nuisible_latin_name' ); ?>
        <h3>Description détaillée :</h3><p><?php echo carbon_get_post_meta( get_the_ID(), 'nuisible_description' ); ?>
        
    </div>
    <div class="col-lg-4 image-section order-1 order-lg-2">
        <?php 
        $image_id = carbon_get_post_meta( get_the_ID(), 'nuisible_image' );
        if ($image_id) {
            echo wp_get_attachment_image( $image_id, 'full', false, array( 'class' => 'nuisible-image' ) );
        }
        ?>
    </div>
</div>

<div class="symptomes">
    <h2 class="centered">Quels sont les signes indiquant la présence de <?php the_title(); ?></h2>
    <div class="symptoms-content">
        <?php echo carbon_get_post_meta( get_the_ID(), 'symptoms' ); ?>
    </div>
</div>

<div class="risques">
  <div class="risques-sanitaires">
    <h2>Risques sanitaires</h2>
    <?php echo carbon_get_post_meta( get_the_ID(), 'sanitar-risk' ); ?>
    <?php 
      $sanitar_image_id = carbon_get_post_meta( get_the_ID(), 'sanitar_image' ); // Récupère l'ID de l'image
      if ($sanitar_image_id) {
        echo wp_get_attachment_image($sanitar_image_id, 'full', false, array('class' => 'image-risque')); // Affiche l'image
      }
    ?>
  </div>

  <div class="risques-matériels">
    <h2>Risques matériels</h2>
    <?php echo carbon_get_post_meta( get_the_ID(), 'material-risk' ); ?>
    <?php 
      $material_image_id = carbon_get_post_meta( get_the_ID(), 'material_image' ); // Récupère l'ID de l'image
      if ($material_image_id) {
        echo wp_get_attachment_image($material_image_id, 'full', false, array('class' => 'image-risque')); // Affiche l'image
      }
    ?>
  </div>
</div>


<!--<h3>Prévention :</h3><?php echo carbon_get_post_meta( get_the_ID(), 'nuisible_prevention' ); ?>
        <h3>Traitement :</h3><?php echo carbon_get_post_meta( get_the_ID(), 'nuisible_traitement' ); ?>-->
        <div class="flex-container">
  <div class="bloc-prevention">
    <h3>Prévention</h3>
    <?php echo carbon_get_post_meta( get_the_ID(), 'nuisible_prevention' ); ?>
  </div>
  <div class="bloc-traitement">
    <h3>Traitement</h3>
    <?php echo carbon_get_post_meta( get_the_ID(), 'nuisible_traitement' ); ?>
  </div>
</div>

<?php get_footer(); ?>
