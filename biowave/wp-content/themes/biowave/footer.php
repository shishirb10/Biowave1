		<!-- <div id="footer">
			&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?>
		</div>-->

	</div>

	<?php wp_footer(); ?>
			<?php $args = array(
		 'posts_per_page'   => 3,
		 'orderby'          => 'date',
		 'order'            => 'DESC',
		 'post_type'        => 'testimonial',
		 'post_status'      => 'publish',
		);
		$testimonial_array = get_posts( $args ); 
	//	print_r ($testimonial_array );
				
		?>
		<div class="container-fulid">
			<div class="testimonial-main">
		<div class="main-gallery">
			 <?php 
					foreach($testimonial_array as $t)
					{
					?>
				<div class="gallery-cell">
					<div class="testimonial">						
						<q class="testimonial-quote"><?php echo $t->post_content; ?></q>
						<span class="testimonial-author"><?php echo $t->post_name; ?></span>
						
					</div>
				</div>
				<?php  }	?>	
						
		</div>
		<a class="testimonial-more" href="<?php the_permalink() ?>"> More Testimonial</a></div>	
	<footer class="footer-basic-centered">
	 	<?php print_r ($wp_customize);?>
			<p class="footer-company-logo"><img src="<?php  echo get_theme_mod( 'footer-logo' ); ?>" alt="Company" /></p>
			<p class="footer-company-detail">
				<span><?php echo get_theme_mod( 'footer_contact' );?></span>
				<span><?php echo '<a href="mailto:'.get_theme_mod('footer_email').'">'. get_theme_mod('footer_email'). '</a>'; ?></span>
				<span class="social-icon">
				<?php if(get_theme_mod( 'facebook_link' ) != "") { ?>
					<a href="<?php echo get_theme_mod( 'facebook_link' );?>">
						<i class="fa fa-facebook"></i>						
					</a>
				<?php } ?>
				<?php if(get_theme_mod( 'twitter_link' ) != "") { ?>
				<a href="<?php echo get_theme_mod( 'twitter_link' );?>">
					<i class="fa fa-twitter"></i>					
				</a>
				<?php } ?>
				<?php if(get_theme_mod( 'youtube_link' ) != "") { ?>
				<a href="<?php echo get_theme_mod( 'youtube_link' );?>">
					<i class="fa fa-youtube-play"></i>					
				</a>
				<?php } ?>
				<?php if(get_theme_mod( 'instagram_link' ) != "") { ?>
				<a href="<?php echo get_theme_mod( 'instagram_link' );?>">
					<i class="fa fa-instagram"></i>					
				</a>
				<?php } ?>
			</span>
			</p>
			<?php wp_nav_menu( array('theme_location' => 'secondary','menu_class' => 'footer-links') ); ?>
	<p class="footer-company-name">
	 &copy; <?php echo get_theme_mod( 'copyright_textbox' );?>
</p>
		
		
		</footer>
					</div>
	<!-- Don't forget analytics -->
	
</body>

</html>