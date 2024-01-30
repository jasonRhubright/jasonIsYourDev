<?php 
/*
	Template Name: 404 Template
*/

get_header(); 

?>
  <div class="w-embed">
    <style>
      .frosted-glass {
        -webkit-backdrop-filter: saturate(200%) blur(30px) brightness(100%);
        backdrop-filter: saturate(200%) blur(30px) brightness(100%);
      }
    </style>
  </div>
  <div class="utility-page-wrap-2">
    <div class="_404-interaction"><img src="images/Blue-texture.jpg" loading="lazy" sizes="(max-width: 479px) 100vw, 460px" srcset="images/Blue-texture-p-500.jpeg 500w, images/Blue-texture-p-800.jpeg 800w, images/Blue-texture-p-1080.jpeg 1080w, images/Blue-texture.jpg 1600w" alt="" class="circle-image"><img src="images/Blue-texture.jpg" loading="lazy" sizes="(max-width: 479px) 100vw, 460px" srcset="images/Blue-texture-p-500.jpeg 500w, images/Blue-texture-p-800.jpeg 800w, images/Blue-texture-p-1080.jpeg 1080w, images/Blue-texture.jpg 1600w" alt="" class="circle-image glow"></div>
    <div class="utility-page-content-2 w-form">
      <h1 class="utility-heading">Page Not Found</h1>
      <div class="frosted-glass">
        <div class="_404">404</div>
        <div class="_404-details">The page you are looking for doesn&#x27;t exist or has been moved.</div>
        <div class="horizontal-divider"></div>
        <a href="/" class="utility-button w-button">Back to homepage</a>
      </div>
    </div>
  </div>
<?php get_footer(); ?>