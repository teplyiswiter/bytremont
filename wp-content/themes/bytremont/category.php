<?php
    /**
    *   Theme: Pure Bootstrap
    *   The category page template.
    *   This is the template that displays a category.
    *   @package Pure Bootstrap
    *   @version Pure Bootstrap 1.1.1
    */

get_header(); ?>
    <div class="container main-content default-page">
        <div id="content" class="col-sm-12 col-md-12">
            <h2><?php _e('Category','bytremont')?>: <?php the_category(', '); ?></h2>
            <p><?php echo category_description()?></p>
            <?php while(have_posts()): the_post() ?>
                <div class="col-sm-4 col-md-4 card">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="thumbnail">
                            <div class="crop">
                                <a href="<?php the_permalink(); ?>">
                                    <?php get_thumbnail_or_placeholder() ?>
                                </a>
                            </div>
                            <div class="caption">
                                <div class="the-excerpt">
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                            <div class="post-bottom">
                                <div class="post-meta">
                                    <div class="entry-date">
                                      <?php echo get_the_date(); ?>
                                    </div>
                                    <div class="post-tags">
                                        <?php
                                            $posttags = get_the_tags();
                                            if ($posttags) {
                                                foreach($posttags as $tag) {
                                                    echo '<small><a href="'.get_tag_link($tag->term_id).'"> <i class="fa fa-tag"></i> '. $tag->name . '</a></small>';
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-primary" role="button"><?php _e('read more', 'bytremont')?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php //get_sidebar('repairparts'); ?>
    </div>
<?php get_footer(); ?>
