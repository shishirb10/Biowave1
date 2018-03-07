<?php get_header(); ?>
<div class="container">
	<h1><?php the_category('&bull;'); ?></h1>
	<section>
<ul class="blog-list-ul">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<li <?php post_class() ?> id="post-<?php the_ID(); ?>">			
			<div class="blog-list-img">
				<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
				 //print_r ($image);
			  ?>
				<img class="card-img-top" src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_post_thumbnail_id( $post->ID ));?>">
			</div>
			<div class="entry blog-list-content">
				<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
				<a class="readmore" href="<?php the_permalink() ?>">Read More</a>
			</div>	

		</li>

	<?php endwhile; ?>

	<?php //include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<li><h2>Not Found</h2></li>

	<?php endif; ?>
</ul>
</section>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>