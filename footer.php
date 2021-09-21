<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Noddenhus
 */

?>
	</div><!-- #content -->

	<footer id="colophon">
		<div class="contain site-footer pa4 relative bg-main-light">

	<!-- <div class="absolute footer-bg">
			<img src='/wp-content/uploads/2021/05/s0NpXc-1.png'>
	</div>	 -->

		<div class="relative z-2">
			<h1	class="black tc center measure mt5 mb6 f2">Tenes dudas? Mandanos un correo y una persona de nuestro equipo con gusto contestará tus preguntas.</h1>

			<div class="flex items-start column-mobile">
					<?php get_template_part('template-parts/subscribe', get_post_type()); ?>

			<div class="tr w-20-ns">
				<p class="black">+54 11 4815-3515</p>
				<p class="black">Mt. de Alverar 1799</p>
				<p class="black">CABA / Argentina</p>
			</div>

			</div>
			<div class="mt6 flex justify-between items-stretch">
					<div class="flex column-mobile ">
						<div class="flex flex-column footer-links">
							<a href="/shop/" class="black mr4 mb4 no-deco has-after">Productos</a>
							<a href="#" class="black mr4 mb4 no-deco has-after">Terminos y Condiciones</a>
							<a href="#" class="black mr4 mb4 no-deco has-after">Contacto</a>
						</div>
						<div class="flex-column footer-links mh4 dn">
							<a href="/exhibiciones/" class="white mr4 mb4 no-deco has-after">Exhibiciones</a>
							<a href="/upside/" class="white mr4 mb4 no-deco has-after">Upside</a>
							<a href="https://mirandabosch.com.ar" target="_blank" class="flex items-start white mr4 mb4 no-deco has-after">Ir a Real State
								<svg class="ml1" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 8L8 1M8 1H2M8 1V6.5" stroke="white"/>
								</svg>
							</a>
						</div>

						<div class="flex-column footer-links mh4 dn">
							<a href="/tienda/" class="white mr4 mb4 no-deco has-after">Shop</a>
							<a href="/contacto/" class="white mr4 mb4 no-deco has-after">Contacto</a>
							<a href="https://mirandabosch.com.ar" target="_blank" class="flex items-start white mr4 mb4 no-deco has-after">Política de Privacidad
								<svg class="ml1" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 8L8 1M8 1H2M8 1V6.5" stroke="white"/>
								</svg>
							</a>
						</div>
					</div>			
					<div class="flex flex-column justify-between">
						<div class="white-icons flex jic">
							<?php get_template_part('template-parts/assets/landing-icons');?>
						</div>
						<a href="https://marcopolo.agency" target="_blank" class="barba-prevent black by-marco no-deco mb4">Hecho por Marco Polo</a>
					</div>
					</div>
			</div>
	</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- <script src="https://unpkg.com/@barba/core"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>


<?php wp_footer(); ?>

</body>
</html>
