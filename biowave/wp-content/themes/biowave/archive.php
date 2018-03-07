<?php get_header(); ?>
<div class="container">
		<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1><?php single_cat_title(); ?></h1>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1>Archive for <?php the_time('F jS, Y'); ?></h1>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1>Archive for <?php the_time('F, Y'); ?></h1>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1>Archive for <?php the_time('Y'); ?></h1>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1>Author Archive</h1>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1>Blog Archives</h1>
			
			<?php } ?>
	<section>
		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

		

			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

			<?php while (have_posts()) : the_post(); ?>
			
				<div <?php post_class() ?>>
					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
					<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					
					
					<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
				 //print_r ($image);
			  ?>
				<img class="card-img-top" src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_post_thumbnail_id( $post->ID ));?>">
					<div class="entry">
						<?php the_content(); ?>
					</div>

				</div>

			<?php endwhile; ?>

			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
			
	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>
</section>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>