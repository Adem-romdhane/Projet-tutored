<?php
get_header(); ?>

<main class="main">
  <section class="service-detail py-5">
    <div class="container">

    
      <?php
        // Boucle WordPress pour afficher un service individuel
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
          $service_icon = carbon_get_post_meta(get_the_ID(), 'service_icon');
           ?>
          
            <h1 class="mb-4"><?= ($service_icon) .' '.get_the_title(); ?></h1>


            <!-- Afficher la description complète -->
            <div class="service-full-description">
              <?php the_content() ?>
            </div>

            <!-- Afficher l'image à la une (s'il y en a une) -->
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="service-thumbnail">
                <?php the_post_thumbnail('large'); ?>
              </div>
            <?php endif; ?>

          <?php endwhile;
        else :
          echo '<p>Aucun service trouvé.</p>';
        endif;


      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>