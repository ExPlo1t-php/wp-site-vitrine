<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ecocoded
 */

?>
<?php if ( has_post_thumbnail() ) : ?>
	<div class="featured-thumbnail">
		<?php the_post_thumbnail('ecocoded-slider'); ?>
	</div>
<?php endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('posts-entry fbox'); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php esc_html_e( 'Posted on ', 'ecocoded' ); ?><?php echo get_the_date(); ?>
			</div>
			<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ecocoded' ),
			'after'  => '</div>',
		) );
		?>
		<div class="post-tags">
			<?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
