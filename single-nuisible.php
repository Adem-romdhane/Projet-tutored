<?php get_header(); ?>

<div class="container-lg">
    <div class="row">
                
    <div class="col-md-8 details order-2 order-md-1 py-5 mb-4">
    <h1 ><?php the_title(); ?></h1>
        <p><?php echo carbon_get_post_meta( get_the_ID(), 'informations' ); ?></p>
        <?php if(carbon_get_post_meta( get_the_ID(), 'nuisible_latin_name' )): ?>
        <h3>Nom scientifique :</h3>
        <?php echo carbon_get_post_meta( get_the_ID(), 'nuisible_latin_name' ); ?>
        <?php endif ?>
        <?php if(carbon_get_post_meta( get_the_ID(), 'nuisible_description' )): ?>
        <h3>Description détaillée :</h3>
        <p><?php echo carbon_get_post_meta( get_the_ID(), 'nuisible_description' ); ?>
        <?php endif ?>

    </div>
    <div class="col-md-4 image-section order-1 order-md-2">
        <?php 
        $image_id = carbon_get_post_meta( get_the_ID(), 'nuisible_image' );
        if ($image_id) {
            echo wp_get_attachment_image( $image_id, 'full', false, array( 'class' => 'nuisible-image' ) );
        }
        ?>
    </div>
</div>
</div>

<div class="container-lg bg-success-custom py-5 mb-5">
    <div class="row">
        <div class="col-md-8 mx-auto">

            <?php 
            $symptoms = carbon_get_post_meta(get_the_ID(), 'symptoms');
            if ($symptoms) : 
            ?>
                <h2 class="text-center text-dark">Quels sont les signes indiquant la présence de <?php the_title(); ?></h2>
                <div class="symptoms-content">
                    <?php echo $symptoms; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>



<div class="container-lg">
  <div class="row">
    <?php $risques= carbon_get_post_meta( get_the_ID(), 'risques' ); ?>
    <?php foreach ($risques as $item): ?>
    <div class="col-md-6 mb-4">
      <h2 class="text-center"><?php echo $item['titre'];?></h2>
      <?php echo $item['content'];?>
      <?php echo wp_get_attachment_image($item['image'], 'full','', array( "class" => "rounded-4" )); ?>
    </div>
    <?php endforeach ?>
  </div>
</div>


<?php get_footer(); ?>
