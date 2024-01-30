<?php 
/*
	Template Name: About Me Template
*/

get_header(); 

?>
  <section class="section-2">
    <div class="w-layout-blockcontainer container w-container">
      <div id="w-node-a8616810-6107-8f4d-9f9c-6c76cd6258ef-56542ef0" class="w-layout-layout quick-stack wf-layout-layout">
        <div id="w-node-f6fef31b-db29-6979-2e22-f9388e6610e1-56542ef0" class="w-layout-cell">
          <div data-w-id="38e28a71-409d-f2f1-6c35-76533adcf0eb" class="about-me-image-1"><img src="<?php echo get_template_directory_uri()?>/images/family1.jpg" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 95vw, (max-width: 991px) 728px, (max-width: 1919px) 940px, 1600px" srcset="<?php echo get_template_directory_uri()?>/images/family1.jpg 500w, <?php echo get_template_directory_uri()?>/images/family1.jpg 800w, <?php echo get_template_directory_uri()?>/images/family1.jpg 1080w, <?php echo get_template_directory_uri()?>/images/family1.jpg 1440w" alt="Jason's kids" class="image-8"></div>
        </div>
        <div id="w-node-b329da94-44c4-4167-32e4-59611888c588-56542ef0" class="w-layout-cell cell">
          <div data-w-id="79e0ea2c-ae6b-fd78-9e04-7495796393fe" class="about-me-header">
            <h1 class="larger-heading about-me">About Me</h1>
          </div>
          <div data-w-id="d6b2d644-d81e-95f8-e8a9-4478c8bc2bcf" class="about-me-desc">
            <div class="paragraph">
            <?php
            
            while(have_posts()){
              the_post();
              the_content(); 
            }
            ?>
            </div>
            <div class="div-block-3">
              <!-- <a href="#" class="submit-button contact-btn w-button">Resume</a> -->
            </div>
          </div>
        </div>
        <div id="w-node-b6dad258-46bf-8dd3-e286-58f5ec12a620-56542ef0" class="w-layout-cell">
          <div data-w-id="042bbeb4-c35e-c1cb-f155-a60ff07ea63e" class="about-me-image-2"><img src="<?php echo get_template_directory_uri()?>/images/jetski.jpg" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 95vw, (max-width: 991px) 728px, (max-width: 1919px) 940px, 1600px" srcset="<?php echo get_template_directory_uri()?>/images/jetski.jpg 500w, <?php echo get_template_directory_uri()?>/images/jetski.jpg 800w, <?php echo get_template_directory_uri()?>/images/jetski.jpg 1080w, <?php echo get_template_directory_uri()?>/images/jetski.jpg 1600w, <?php echo get_template_directory_uri()?>/images/jetski.jpg 2000w, <?php echo get_template_directory_uri()?>/images/jetski.jpg 2048w" alt="Jason on a jet ski" class="image-9"></div>
        </div>
      </div>
    </div>
  </section>
<?php 
 echo do_shortcode('[contact-form]');
 get_footer(); 
?>
<script>
  // make sure contact form is visible.
  document.addEventListener("DOMContentLoaded", function() {
    var element = document.querySelector('[data-w-id="b8e40d7c-18c2-70a4-db25-b0ea36d89eca"]');
    if (element) {
      element.style.opacity = 1;
    }
  });
</script>
