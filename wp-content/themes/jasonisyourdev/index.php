<?php 
/*
	Template Name: Home Page Template
*/

get_header(); 
$tagline = get_bloginfo('description');
?>
  <section class="hero-section">
    <div class="hero-header-float">
      <div class="w-layout-blockcontainer container home-hero-adjust w-container">
        <h1 class="heading">
        <?php
          if (!empty($tagline)) {
            echo esc_html($tagline);
          }
        ?>
        </h1>
      </div>
    </div>
    <div class="hero-camera">
      <div data-w-id="d22adaf8-540b-d01e-4ab2-e9073d500892" style="opacity:0" class="w-layout-grid hero-images"><img src="<?php echo get_template_directory_uri()?>/images/working-791849_1280.jpg" loading="lazy" id="w-node-_6798b248-fb6b-5d74-0917-5e1302afae5e-838e1e2c" sizes="100vw" alt="" srcset="<?php echo get_template_directory_uri()?>/images/working-791849_1280-p-500.jpg 500w, <?php echo get_template_directory_uri()?>/images/working-791849_1280-p-800.jpg 800w, <?php echo get_template_directory_uri()?>/images/working-791849_1280-p-1080.jpg 1080w, <?php echo get_template_directory_uri()?>/images/working-791849_1280.jpg 1280w" class="hero-image"><img src="<?php echo get_template_directory_uri()?>/images/code-1076536_1280.jpg" loading="lazy" id="w-node-bb08027f-eb6b-c82d-4a2e-127574d15416-838e1e2c" sizes="100vw" alt="" srcset="images/code-1076536_1280-p-500.jpg 500w, <?php echo get_template_directory_uri()?>/images/code-1076536_1280-p-800.jpg 800w, <?php echo get_template_directory_uri()?>/images/code-1076536_1280-p-1080.jpg 1080w, <?php echo get_template_directory_uri()?>/images/code-1076536_1280.jpg 1280w" class="hero-image"><img src="<?php echo get_template_directory_uri()?>/images/man-593333_1280.jpg" loading="lazy" id="w-node-_4e768d72-261e-e168-5c96-18a2c285070a-838e1e2c" sizes="100vw" alt="" srcset="<?php echo get_template_directory_uri()?>/images/man-593333_1280-p-500.jpg 500w, <?php echo get_template_directory_uri()?>/images/man-593333_1280-p-800.jpg 800w, <?php echo get_template_directory_uri()?>/images/man-593333_1280-p-1080.jpg 1080w, <?php echo get_template_directory_uri()?>/images/man-593333_1280.jpg 1280w" class="hero-image"><img src="<?php echo get_template_directory_uri()?>/images/stock-1863880_1280.jpg" loading="lazy" id="w-node-_9da8a886-c3de-5a22-9b74-995d196f0aa8-838e1e2c" sizes="100vw" alt="" srcset="<?php echo get_template_directory_uri()?>/images/stock-1863880_1280-p-500.jpg 500w, <?php echo get_template_directory_uri()?>/images/stock-1863880_1280-p-800.jpg 800w, <?php echo get_template_directory_uri()?>/images/stock-1863880_1280-p-1080.jpg 1080w, <?php echo get_template_directory_uri()?>/images/stock-1863880_1280.jpg 1280w" class="hero-image bottom"><img src="<?php echo get_template_directory_uri()?>/images/Mountain-escape.jpg" loading="lazy" id="w-node-_1abe61fa-a6c9-e3e6-6a3e-6c8b6c5210c6-838e1e2c" sizes="100vw" alt="" srcset="<?php echo get_template_directory_uri()?>/images/Mountain-escape-p-500.jpg 500w, <?php echo get_template_directory_uri()?>/images/Mountain-escape-p-800.jpg 800w, <?php echo get_template_directory_uri()?>/images/Mountain-escape-p-1080.jpg 1080w, <?php echo get_template_directory_uri()?>/images/Mountain-escape.jpg 2567w" class="hero-image bottom"><img src="<?php echo get_template_directory_uri()?>/images/analysis-1841158_1280.jpg" loading="lazy" id="w-node-_78372ac6-427f-fc4f-e300-c8715f8683be-838e1e2c" sizes="100vw" alt="" srcset="<?php echo get_template_directory_uri()?>/images/analysis-1841158_1280-p-500.jpg 500w, <?php echo get_template_directory_uri()?>/images/analysis-1841158_1280-p-800.jpg 800w, <?php echo get_template_directory_uri()?>/images/analysis-1841158_1280-p-1080.jpg 1080w, <?php echo get_template_directory_uri()?>/images/analysis-1841158_1280.jpg 1280w" class="hero-image bottom"></div>
    </div>
  </section>
  <section class="section original-hero-image">
    <div class="w-layout-blockcontainer container w-container"></div>
    <h1 class="heading">A dedicated and results-driven Senior Developer.</h1>
  </section>
  <section class="section-2">
    <div class="w-layout-blockcontainer container w-container">
      <h2 class="heading-2">Selected Projects</h2>
      <div class="paragraph">
      <?php  
            while(have_posts()){
              the_post();
              the_content(); 
            }
      ?>
      </div>
      <div class="w-dyn-list">

      <?php
        // Get the current project ID
        $current_post_id = get_the_ID();

        // Set up a custom query to get all projects
        $args = array(
            'post_type' => 'projects',  // You can change 'post' to your custom post type if needed
            'post_status' => 'publish',
            'posts_per_page' => -1  // Set to -1 to retrieve all projects
        );

        $custom_query = new WP_Query($args);

        // Check if there are projects
        if ($custom_query->have_posts()) {
            while ($custom_query->have_posts()) {
                $custom_query->the_post();
                // Your project content here

                $image_name = get_post_meta($post->ID, 'logo_image_name', true);
                $image_extension = get_post_meta($post->ID, 'logo_image_extension', true);
                $post_slug = get_post_field('post_name', $post->ID);
        ?>

                <div role="list" class="selected-projects-list w-dyn-items">
                  <div data-w-id="5b062868-69a8-d913-f6fb-54ae5c870018" role="listitem" class="collection-item w-dyn-item">
                    <a  href="<?php echo '/projects/' . $post_slug ?>" class="project-link-block w-inline-block">
                      <div class="project-details" style="background-color:<?php the_field('project_color');?>;">
                        <div class="project-client-preview">
                          <div class="button-text">View  </div>
                          <div class="button-text"><?php the_field('client_name')?></div>
                        </div>
                        <div class="project-type-preview"><?php the_field('project_type')?></div>
                        <h3 class="project-name-preview"><?php the_field('project_name')?></h3>
                        <p class="project-paragraph-preview">
                          <?php the_field('project_description')?>
                        </p>
                      </div>
                    </a>
                    <img alt="Logo" loading="lazy"  src="<?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension ?>" class="selected-projects-img">
                    <img alt="Logo" loading="lazy" data-w-id="0cff7729-c51f-f2e2-96ee-dd4cf73e21f8"  src="<?php echo get_template_directory_uri() . '/images/' . $image_name . '.' . $image_extension ?>" class="selected-projects-effect">
                  </div>
                </div>
        <?php
            }

            // Restore original project data
            wp_reset_postdata();

        } else {
            echo 'No posts found';
        }
        ?>

      </div>
    </div>
  </section>
  
<?php 
echo do_shortcode('[contact-form]');
get_footer(); 
?>