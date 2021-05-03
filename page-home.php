<?php 
get_header();
?>
<main id="main" class="home" data-barba="container"  data-barba-namespace="home">
    <div class="min-h-100-f flex home-landing">
        <div class="w-50-ns bg-main-dark flex">
            <div class="m-auto mb0 ph4 pb6">
                <?php echo get_field('home_text');?>
            </div>
        </div>

        <div class="w-50-ns relative">
            <div class="absolute-cover" style="background-image: url(<?php the_field('home_image');?>);?>"></div>
        </div>
    </div>

    <div class="home-products pv6 relative cover bg-center no-repeat container" style="background-image: url(<?php the_field('products_bg');?>)">
        <div class="measure-wide center">
         <h1 class="black tc"><?php the_field('home_products_title');?></h1>
         <p class="black tc mt4">Productos proximamente disponibles</p>
        </div>
       
        <div class="home-products-grid flex mt2 justify-between relative z-3 ph5-ns">
            <?php $products = get_posts(array('posts_per_page' => -1, 'post_type' => 'product', 'orderby' => 'title', 'order' => 'ASC')); 
                foreach ($products as $product): 
                    $p = wc_get_product( $product->ID ); 
                    // $anio = get_post_meta( $product->get_id(), 'anio', true );
                    $image = wp_get_attachment_url( $p->get_image_id());
                ?>
                <div class="home-product mh3">
                    <img src=<?php echo $image;?>>
                    <div class="home-product-description measure center">
                       <h2 class="tc"><?php echo $p->name; ?></h2>
                       <p class="tc mt1 ph4 mb4"><?= $p->post->post_content;?></p>
                       <a class="main-cta m-auto w-max cta-font bg-black white flex">Comprar</a>

                    </div>
                </div>
                <?php endforeach; 
            ?> 
          
        </div>
        <div class="absolute bottom-0 left-0 w-100 home-products-overlay bg-main-light z-2"></div>
    </div>

    <div class="home-aob">
        <div class="bg-white">
        <div class="relative home-aob-image">
            <div class="absolute-cover att-fixed" style="background-image: url(<?php the_field('home_aob_image');?>)"></div>
        </div>
        <div class="container flex pt5 pb6 jic">
            <h1 class="black w-40-ns">Lo mejor de las culturas</h1>
            <p class="w-50-ns lh-copy">Productos pensados para resolver necesidades concretas de nuestros usuarios con una propuesta de calidad, invitando a los mismos a tomar distancia y mirar las cosas con perspectiva, vivir y disfrutar el momento.</p>
        </div>
        </div>

        <div class="flex container jic mv5 home-ending" background-color="bg-main-dark">
            <div class="w-40-ns ph5 home-ending-image">
                <img src="<?php the_field('home_ending_image');?>">
            </div>
            <div class="w-50-ns">
                <h1 class="white mb2">El valor de la familia</h1>
                <p class="white lh-copy">Productos pensados para resolver necesidades concretas de nuestros usuarios con una propuesta de calidad, invitando a los mismos a tomar distancia y mirar las cosas con perspectiva, vivir y disfrutar el momento.</p>  
            </div>
        </div>
    </div>

</main><!-- #main -->

<?php
get_footer();
