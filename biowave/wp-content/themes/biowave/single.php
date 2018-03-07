<?php get_header(); ?>
		<div class="container">
			<h1><?php the_category('&bull;'); ?></h1>
				<section>
						<a class="backtohome" href="<?php echo get_home_url(); ?>">Back To Posts</a>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
			<heading>
					<h2><?php the_title(); ?></h2>
				</heading>			
				<article>
			<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );				
			  ?>
			  <img class="card-img-top responsive-img" src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_post_thumbnail_id( $post->ID ));?>"> 

			<div class="entry">
				
				<?php the_content(); ?>

				<?php //wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				
				<?php //the_tags( 'Tags: ', ', ', ''); ?>

			</div>
			
			<?php //edit_post_link('Edit this entry','','.'); ?>
			
		</div>

	<?php //comments_template(); ?>

	<?php endwhile; endif; ?>
		</article>
			</section>
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>