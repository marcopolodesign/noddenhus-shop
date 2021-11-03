<div class="fixed menu-container o-0 pointers-none top-0 left-0 min-h-100-vh w-100 pa5-ns no-print">
  <nav class="side-menu relative ph3-ns">
    <div class="mb5 flex justify-end w-100">
      <svg class="close-menu pointer" width="30" height="30" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M35 2L2 35" stroke="white" stroke-width="3"/>
      <path d="M2 2L35 35" stroke="white" stroke-width="3"/>
      </svg>
    </div>

      <div class="has-hover-items">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-2',
						'menu_id'        => 'mobile-menu',
						'container' => 'ul',
						'menu_class' => 'menu-nav w-max ml-0 jic list-none',
					) );
					?>
   </div> 
  </nav>
 
  <a href="https://instagram.com/noddenhus" target="_blank" class="white-insta ml-0 mr2 pa3 mb5 absolute bottom-0 left-0 mr2 db" style="z-index: 101;">
      <?php get_template_part('template-parts/content/insta'); ?>
    </a>

  <div class="absolute-cover bg-main-dark"></div>
</div>


<style>
  .white-insta svg path {
    fill: #fff;
  }
</style>
