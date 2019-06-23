<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! twentynineteen_can_show_post_thumbnail() ) : ?>
	<header class="entry-header">
		<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
        <div>
            <?php
            /** Meta box stuff **/

            $published = rwmb_meta( 'pt-release');
            echo '<span>Release Date: ' . rwmb_meta( 'pt-release' ).'</span>';

            $values = rwmb_meta( 'pt-contact');
            foreach ( $values as $value ) {

                (!empty($value['website']) ) ? _e("<p><a href='http://". $value['website']."' target='_blank'>".$value['name']."</a></p>") : '';

                (!empty($value['email'])) ? _e('<p>Contact Email: '.$value['email'] .'</p>') : '';

                (!empty($value['phone'])) ? _e('<p>Contact Phone: '.$value['phone'] .'</p>') : '';
            }
            /** Meta box stuff **/
            ?>
        </div>

    </header>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentynineteen' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentynineteen_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author', 'bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
