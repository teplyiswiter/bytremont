<?php
    /* Template Name: contacts */ 
get_header(); ?>
    <div class="container main-content  default-page">
        <div id="content" class="col-sm-12 col-md-12">
          <div class="phones">
            <?php _e('Phones:', 'bytremont')?><br>  
            <?php echo bytremont_get_contacts()?>
          </div>
          <?php while(have_posts()): the_post() ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <?php if ( has_post_thumbnail()) : ?>
                  <div class="img-thumbnail">
                      <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
                  </div>
              <?php endif; ?>
              <div class="padding-top-20 padding-bottom-20">
                  <?php the_content(); ?>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
        <?php //get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
