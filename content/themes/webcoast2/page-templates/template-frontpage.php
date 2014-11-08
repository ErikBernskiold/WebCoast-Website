<?php
/**
 * Page Template: Frontpage
 *
 * Adds a custom page template to display the frontpage.
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 *
 * Template Name: Frontpage
 *
 **/

get_header(); ?>

	<?php
		$slider_query_args = array(
			'post_type'      => 'ilmenite_slider',
			'posts_per_page' => -1,
		);

		$slider_query = webcoast_get_transient_query( 'wc_slider_' . ICL_LANGUAGE_CODE, $slider_query_args, DAY_IN_SECONDS );
	?>

	<?php if ( $slider_query->have_posts() ) : ?>
	<section class="hero flexslider hide-for-small">
		<ul class="slides">
			<?php while ( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
			<li>
				<?php the_post_thumbnail(); ?>
			</li>
			<?php endwhile; ?>
		</ul>
	</section>
	<?php endif; wp_reset_postdata(); ?>

	<section class="conference-details">
		<div class="row">
			<div class="conference-info large-12 medium-12 small-24 columns">
				<span class="conference-title"><?php echo get_post_meta( $post->ID, 'home_title', true ); ?></span>
				<span class="conference-dates"><?php echo get_post_meta( $post->ID, 'home_dates', true ); ?> &middot; <?php _e( 'Göteborg', 'webcoast' ); ?></span>
			</div>
			<?php if ( 1 != get_post_meta( $post->ID, 'home_forsaljning', true ) ) : ?>
			<div class="conference-callout large-12 medium-12 small-24 columns">
				<span class="conference-countdown"><?php the_field( 'home_box_text' ); ?></span>
				<a href="<?php the_field( 'home_box_button_link' ); ?>" class="button large cta-button"><?php the_field( 'home_box_button_title' ); ?></a>
			</div>
			<?php else : ?>
				<div class="conference-callout large-12 medium-12 small-24 columns">
					<span class="conference-countdown"><?php _e( 'Tickets are now available!', 'webcoast' ); ?></span>
					<a href="<?php echo home_url( _x( '/buy-ticket/', 'slug for ticket purchasing page', 'webcoast' ) ); ?>" class="button large cta-button"><?php _e( 'Buy Your Ticket &raquo;', 'webcoast' ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<div class="main frontpage">

		<div class="row page-section">
			<div class="conference-pitch large-7 medium-10 small-24 columns">
				<p><?php echo get_post_meta( $post->ID, 'home_introtext', true ); ?></p>
			</div>
			<div class="conference-video large-16 medium-14 small-24 columns">
				<div class="flex-video">
					<?php // <iframe src="http://embed.bambuser.com/channel/WebCoast" width="460" height="403" frameborder="0">Your browser does not support iframes.</iframe> ?>
					<?php echo get_post_meta( $post->ID, 'home_movie_code', true ); ?>
				</div>
			</div>
		</div>

		<?php
			$blog_query_args = array(
				'post_type'      => 'post',
				'posts_per_page' => 2,
			);

			$blog_query = webcoast_get_transient_query( 'wc_fp_blogq_' . ICL_LANGUAGE_CODE , $blog_query_args, HOUR_IN_SECONDS * 6 );
		?>

		<?php if ( $blog_query->have_posts() ) : ?>
		<div class="gray-bg page-section">
			<div class="row">
				<div class="small-24 columns">
					<h2><?php _e( 'From the blog', 'webcoast' ); ?></h2>
					<div class="row">

						<?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'frontpage-post large-12 medium-12 small-24 columns' ); ?>>

							<?php if ( has_post_thumbnail() ) : ?>
							<div class="frontpage-post-thumbnail">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'frontpage-blog-post' ); ?></a>
							</div>
							<?php endif; ?>

							<h3 class="frontpage-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="frontpage-post-excerpt">
								<?php the_excerpt(); ?>
							</div>
							<div class="frontpage-post-readmore">
								<a href="<?php the_permalink(); ?>"><?php _e( 'Read more &raquo;', 'webcoast' ); ?></a>
							</div>
						</article>
						<?php endwhile; ?>

					</div>
				</div>
			</div>
		</div>
		<?php endif; wp_reset_postdata(); ?>

		<?php
		$sponsor_types = webcoast_get_transient_terms( 'webcoast_frontpage_sponsor_types_' . ICL_LANGUAGE_CODE, 'sponsortyp', array(
			'orderby' => 'id',
			'exclude' => array( 88, 69 ),
		), WEEK_IN_SECONDS * 4 );

		if ( ! empty ( $sponsor_types ) ) : ?>
		<div class="light-gray-bg page-section">
			<div class="row">
				<div class="small-24 columns">
					<h2><?php _e( 'Sponsors', 'webcoast' ); ?></h2>

					<?php foreach ( $sponsor_types as $sponsor ) :

						$sponsor_query_args = array(
							'post_type'      => 'sponsor',
							'posts_per_page' => -1,
							'tax_query'      => array(
								array(
									'taxonomy' => 'sponsortyp',
									'field'    => 'slug',
									'terms'    => $sponsor->slug,
								),
								array(
									'taxonomy' => 'year',
									'field'    => 'slug',
									'terms'    => get_field('sponsor_display_year', 'option'),
								),
							),
						);

						$sponsor_query = webcoast_get_transient_query( 'webcoast_sponsors_query' . $sponsor->slug . '_' . ICL_LANGUAGE_CODE , $sponsor_query_args, DAY_IN_SECONDS );

					if ( $sponsor_query->have_posts() ) : ?>
					<article class="sponsor-row">
						<div class="sponsor-title large-4 medium-4 small-24 columns">
							<?php echo $sponsor->name; ?>
						</div>
						<div class="sponsor-logos large-19 medium-19 small-24 columns">
							<ul class="inline-list">
								<?php while ( $sponsor_query->have_posts() ) : $sponsor_query->the_post(); ?>
								<li>
									<a href="<?php echo get_post_meta( $post->ID, 'sponsor_link', true ); ?>">
										<img src="<?php the_field( 'sponsor_fpimage' ); ?>" alt="<?php the_title(); ?>" width="200" height="200">
									</a>
								</li>
								<?php endwhile; ?>
							</ul>
						</div>

					</article>
					<?php endif; wp_reset_postdata(); endforeach; ?>

				</div>
			</div>
		</div>
		<?php endif; ?>

		<div class="row page-section">
			<div class="newsletter large-11 medium-11 small-24 columns">
				<h3><?php _e( 'Get the latest news via e-mail', 'webcoast' ); ?></h3>
				<form action="http://webcoast.us3.list-manage.com/subscribe/post?u=636ce8657d08f154377594682&amp;id=9bc28b3ef4" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<div class="row collapse">
				  <div class="small-18 columns">
				    <input type="email" name="EMAIL" id="mce-EMAIL" placeholder="<?php _e( 'Enter your email address', 'webcoast' ); ?>">
				  </div>
				  <div class="small-6 columns">
				    <input type="submit" name="subscribe" id="mc-embedded-subscribe" value="<?php _e( 'Subscribe', 'webcoast' ); ?>" class="button prefix">
				  </div>
				</div>
				<div id="mce-responses" class="clear">
					<div class="response" id="mce-error-response" style="display:none"></div>
					<div class="response" id="mce-success-response" style="display:none"></div>
				</div>
				</form>
			</div>
			<div class="discussion large-12 medium-12 small-24 columns">
				<p><?php echo get_post_meta( $post->ID, 'home_socialtext', true ); ?></p>
			</div>
		</div>

	</div>

<?php get_footer(); ?>