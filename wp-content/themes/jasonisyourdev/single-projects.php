<?php 
/*
	Template Name: Project Detail Template
*/

get_header(); 

?>
  <section class="section">
    <div class="w-layout-blockcontainer container w-container">
      <h1 class="heading project-page-heading"><?php the_title(); ?></h1>
    </div>
  </section>
  <section class="section-2">
    <div class="w-layout-blockcontainer container w-container">
      <div class="w-layout-grid project-side-by-side">
        <div id="w-node-ed331a0a-c3ef-2a2c-7995-0afe88c691a7-438463e2">
          <div class="project-label">Client</div>
          <div class="project-info"><?php the_field('client_name') ?></div>
          <div class="project-label">Project type</div>
          <div class="project-info"><?php the_field('project_type') ?></div>
          <div class="project-label">Project Year</div>
          <div class="project-info"><?php the_field('project_year') ?><br>‍</div>
        </div>
        <div id="w-node-ded0eb5a-735a-cde7-8365-71ac190fa4d4-438463e2">
          <div class="project-desc">
            <?php
            
            while(have_posts()){
              the_post();
              the_content(); 
            }
            ?>
          </div>
          <a href="<?php the_field('project_link') ?>" class="link-block-2 w-inline-block">
            <div class="text-inside-link">View Project</div><img src="<?php echo get_template_directory_uri()?>/images/Arrow.svg" loading="lazy" width="19" alt="View Project Arrow Icon">
          </a>
        </div>
      </div>
    </div>
  </section>
  <section class="section-2">
    <div class="w-layout-blockcontainer container w-container">
    <?php
        $image_name = get_post_meta($post->ID, 'image_name', true);
        $image_extension = get_post_meta($post->ID, 'image_extension', true);

        $image_sizes = array(500, 800, 1080, 1600, 2000, 2421);

        echo '<img alt="Screenshot of Website" loading="lazy" sizes="
                (max-width: 479px) 100vw,
                (max-width: 767px) 95vw,
                (max-width: 991px) 728px,
                (max-width: 1919px) 940px,
                1600px
            " srcset="';

        foreach ($image_sizes as $size) {
            echo get_template_directory_uri() . '/images/' . $image_name . '-p-' . $size . '.' . $image_extension . ' ' . $size . 'w, ';
        }

        echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension . ' 2421w" src="' . get_template_directory_uri() . '/images/Sunset.jpg">';
    ?>
    </div>
  </section>
  <section class="section-2">
    <div class="w-layout-blockcontainer container w-container">
      <h2 class="heading-2 project-heading">Other Projects</h2>
      <div class="collection-list-wrapper-3">
        <div class="other-projects">
        <?php
        // Get the current post ID
        $current_post_id = get_the_ID();

        // Set up a custom query to get all posts except the current one
        $args = array(
            'post_type' => 'projects',  // You can change 'post' to your custom post type if needed
            'post_status' => 'publish',
            'posts_per_page' => -1,  // Set to -1 to retrieve all posts
            'post__not_in' => array($current_post_id),
        );

        $custom_query = new WP_Query($args);

        // Check if there are posts
        if ($custom_query->have_posts()) {
            while ($custom_query->have_posts()) {
                $custom_query->the_post();
                // Your post content here

                $image_name = get_post_meta($post->ID, 'image_name', true);
                $image_extension = get_post_meta($post->ID, 'image_extension', true);
                $post_slug = get_post_field('post_name', $post->ID);
        ?>

                <div class="collection-item-3">
                  <a href="<?php echo '/projects/' . $post_slug ?>" class="link-block w-inline-block link-hover-effect">
                    
                    <img 
                        src="<?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension ?>" 
                        loading="lazy" 
                        sizes="(max-width: 479px) 100vw, (max-width: 767px) 92vw, (max-width: 991px) 354px, (max-width: 1919px) 455px, 785px" 
                        srcset="
                            <?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension . ' 500w'?>,
                            <?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension . ' 800w'?>,
                            <?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension . ' 1080w'?>,
                            <?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension . ' 1600w'?>,
                            <?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension . ' 2000w'?>,
                            <?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension . ' 2421w'?>"
                        alt="" 
                        class="project-image"
                    >
                    <img 
                        src="<?php echo get_template_directory_uri() . '/images/' . $image_name . $image_extension ?>" 
                        loading="lazy" 
                        sizes="(max-width: 479px) 100vw, (max-width: 767px) 92vw, (max-width: 991px) 354px, (max-width: 1919px) 455px, 785px" 
                        srcset="
                            <?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension . ' 500w'?>,
                            <?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension . ' 800w'?>,
                            <?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension . ' 1080w'?>,
                            <?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension . ' 1600w'?>,
                            <?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension . ' 2000w'?>,
                            <?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension . ' 2421w'?>"
                        alt="" 
                        class="selected-projects-effect"
                    >

                    <div class="div-block-2" style="background-color:<?php the_field('project_color');?>">
                      <div class="project-info project-text project-caption"><?php the_field('project_type')?></div>
                      <div class="project-label project-caption"><?php the_field('client_name')?></div>
                    </div>
                  </a>
                </div>
        <?php
            }

            // Restore original post data
            wp_reset_postdata();

        } else {
            echo 'No posts found';
        }
        ?>
  
        </div>
      </div>
    </div>
  </section>
<?php 
 echo do_shortcode('[contact-form]');
 get_footer(); 
?>