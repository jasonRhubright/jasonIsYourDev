  <section class="section-2 footer">
    <div class="w-layout-blockcontainer container w-container">
      <div class="footerholder"><img src="<?php echo get_template_directory_uri()?>/images/portforlio-logo.svg" loading="lazy" width="249" alt="Portfolio Logo" class="image-3">
        <p class="paragraph-3">© 2024 · JasonIsYourDev.com. All rights reserved.</p>
        <div class="footer-link-wrapper">
          <div class="footer-list">
          <?php
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
                    $post_slug = get_post_field('post_name', $post->ID);
            ?>
              <div class="footer-item">
                <a href="/projects/<?php echo $post_slug ?>" class="footer-link-block w-inline-block">
                  <div class="text-block-3"><?php the_field('project_name')?></div>
                </a>
              </div>
                    
            <?php
                }
                // Restore original projects data
                wp_reset_postdata();
            } 
            ?>
          </div>
        </div>
      </div>
      <div class="social">
        <a href="https://www.linkedin.com/in/jason-r-3abb6089/" target="_blank" class="social-link w-inline-block"><img src="<?php echo get_template_directory_uri()?>/images/LinkedIn.svg" loading="lazy" width="49" alt="LinkedIn Logo" class="image-4"></a>
      </div>
    </div>
  </section>
  <?php wp_footer(); ?>
</body>
</html>