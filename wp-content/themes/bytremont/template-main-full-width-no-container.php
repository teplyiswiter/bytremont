<?php
/**
 * Theme: Pure Bootstrap
 * The full page width template.
 * This is the template that displays all pages by default.
 * Template Name: Main, Full - No Container
 * @package Pure Bootstrap
 * @version Pure Bootstrap 1.1.1
 */
get_header(); ?>
    <div class="main-content">
        <div class="container">
          <div class="row electronics">
            <div class="col-sm-4 hidden-sm hidden-xs"><img src="<?php echo get_template_directory_uri()."/img/refr_w2.png";?>" class="refr" width="130" alt="Холодильник"></div>
            <div class="col-sm-4 hidden-sm hidden-xs"><img src="<?php echo get_template_directory_uri()."/img/tv_w.png";?>" class="tv" width="230" alt="Телевизор"></div>
            <div class="col-sm-4 hidden-sm hidden-xs"><img src="<?php echo get_template_directory_uri()."/img/mult.png";?>" class="mult" width="130" alt="Мультиварка"></div>
            <div class="col-sm-12 mobile hidden-md hidden-lg">
              <img src="<?php echo get_template_directory_uri()."/img/electronics-w.png";?>" alt="Электроника">
            </div>
          </div>
        </div>
        <div class="container">
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="section-heading-title">
                        <?php echo get_field('services')?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="service-area">
                        <div class="media">
                            <div class="service-icon"><span><i class="fa fa-phone"></i><span></div>
                            <div class="media-body">
                                <h3>
                                    <?php echo get_field('step1_title')?>
                                </h3>
                                <?php echo get_field('step1_text')?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-area">
                        <div class="media">
                            <div class="service-icon"><span><i class="fa fa-trademark"></i></span></div>
                            <div class="media-body">
                                <h3>
                                    <?php echo get_field('step2_title')?>
                                </h3>
                                <?php echo get_field('step2_text')?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-area">
                        <div class="media">
                            <div class="service-icon"><span><i class="fa fa-car"></i></span></div>
                            <div class="media-body">
                                <h3>
                                    <?php echo get_field('step3_title')?>
                                </h3>
                                <?php echo get_field('step3_text')?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <?php echo get_field('extra_info')?>
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-12">
                  <?php while(have_posts()): the_post() ?>
                  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                      <?php remove_filter ('the_content', 'wpautop'); ?>
                      <?php the_content(); ?>
                  </div>
                  <?php endwhile; ?>
              </div>
            </div>
            
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 contact_form">
                    <?php echo do_shortcode("[contact-form-7 id=\"103\" title=\"Контактная форма\"]")?>
                </div>
                <div class="col-md-2"></div>
            </div>
            
        </div>
    </div>
    <?php get_footer(); ?>