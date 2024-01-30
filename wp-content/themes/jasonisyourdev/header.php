<?php
$page_id = get_the_ID();
// Necessary for webflow to wordpress conversions, if an animation is present, it will need this data-wf-page id. If an animation is not present, then the id is not needed.
$wfPage = ($page_id == 50)? "65b521340ad147f556542ef0" : "65a047c9531fb709838e1e2c";
?>

<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Wed Jan 24 2024 20:31:10 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page=<?php echo $wfPage ?> data-wf-site="65a047c9531fb709838e1e28">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <?php 
    wp_head(); 
  ?>
  <style>@media (min-width:992px) {html.w-mod-js:not(.w-mod-ix) [data-w-id="0cff7729-c51f-f2e2-96ee-dd4cf73e21f8"] {opacity:0;}}</style>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic","Inter:regular,600","DM Serif Display:regular"]  }});</script>
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="<?php echo get_template_directory_uri()?>/images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="<?php echo get_template_directory_uri()?>/images/webclip.png" rel="apple-touch-icon">
</head>
<body class="body">
  <div class="navbar-no-shadow">
    <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar-container w-nav">
      <div class="container-regular">
        <div class="navbar-wrapper">
          <a href="/" aria-current="page" class="navbar-brand w-nav-brand w--current"><img src="<?php echo get_template_directory_uri()?>/images/portforlio-logo-3-sm.svg" loading="lazy" width="266" alt="Portfolio Logo" class="image-2"></a>
          <nav role="navigation" class="nav-menu-wrapper w-nav-menu">
            <ul role="list" class="nav-menu w-list-unstyled">
              <li>
                <a href="<?php echo get_template_directory_uri() . '/documents/resume.pdf' ?>" class="nav-link" target="_blank">Resume</a>
              </li>
              <li>
                <a href="/about-me" class="nav-link">About Me</a>
              </li>
              <li>
                <div data-hover="false" data-delay="0" class="nav-dropdown w-dropdown">
                  <div class="nav-dropdown-toggle w-dropdown-toggle">
                    <div class="nav-dropdown-icon w-icon-dropdown-toggle"></div>
                    <div class="text-block-2">Projects</div>
                  </div>
                  <nav class="nav-dropdown-list shadow-three mobile-shadow-hide w-dropdown-list">

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
                      <a href="/projects/<?php echo $post_slug ?>" class="nav-dropdown-link w-dropdown-link"><?php the_field('project_name')?></a>
                    <?php
                        }
                        // Restore original projects data
                        wp_reset_postdata();
                    } 
                    ?>
                  </nav>
                </div>
              </li>
              <li class="mobile-margin-top-10">
                <div class="nav-button-wrapper">
                  <a href="/contact" class="button-primary w-button">Contact</a>
                </div>
              </li>
            </ul>
          </nav>
          <div class="menu-button w-nav-button">
            <div class="icon w-icon-nav-menu"></div>
          </div>
        </div>
      </div>
    </div>
  </div>