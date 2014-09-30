<?php
/**
 * Archive Template: Sponsors
 *
 * This page template controls the archive page style for the
 * sponsors page and lists all sponsors in the right category.
 *
 * @since WebCoast 1.0
 * @author XLD Studios
 * @version 1.0
 * @package WebCoast
 **/

get_header(); ?>

<div class="main sponsors-archive">
	<div class="row">
		<div class="content small-24 columns">
			<h1 class="page-title"><?php _e( 'Sponsors', 'webcoast' ); ?></h1>
			<p class="intro"><?php _e('WebCoast would not be anything without our sponsors. Do you or the company that you are working on want to sponsor WebCoast? Take a look at <a href="http://www.webcoast.se/en/for-sponsors/">our sponsor information</a>.', 'webcoast'); ?></p>

			<div class="page-body">
				<?php
					// Set current year
					$current_year = get_field('sponsor_display_year', 'option');
				?>

					<?php
					/**
					 * PLATINUMSPONSOR
					 */
					?>

					<?php
						$query_platinum_args = array(
							'posts_per_page' => -1,
							'post_type' => 'sponsor',
							'tax_query' => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'year',
									'field' => 'slug',
									'terms' => $current_year
								),
								array(
									'taxonomy' => 'sponsortyp',
									'field' => 'id',
									'terms' => array(66,83)
								)
							)
						);

						$query_platinum = webcoast_get_transient_query( 'webcoast_sponsor_' . $current_year . '_platinum_query', $query_platinum_args, DAY_IN_SECONDS );
					?>

					<?php if($query_platinum->have_posts()) : ?>

						<h2 class="sponsor-title"><?php _e('Platina Sponsor', 'webcoast'); ?></h2>

						<ul class="inline-list sponsor-logos">

						<?php while($query_platinum->have_posts()) : $query_platinum->the_post(); ?>

							<?php get_template_part( 'content', 'sponsor' ); ?>

						<?php endwhile; ?>

						</ul>

					<?php endif; wp_reset_postdata(); ?>

					<?php
					/**
					 * Guldsponsor
					 */
					?>

					<?php
						$query_gold_args = array(
							'posts_per_page' => -1,
							'post_type' => 'sponsor',
							'tax_query' => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'year',
									'field' => 'slug',
									'terms' => $current_year
								),
								array(
									'taxonomy' => 'sponsortyp',
									'field' => 'id',
									'terms' => array(67,81)
								)
							)
						);

						$query_gold = webcoast_get_transient_query( 'webcoast_sponsor_' . $current_year . '_gold_query', $query_gold_args, DAY_IN_SECONDS );
					?>

					<?php if($query_gold->have_posts()) : ?>

						<h2 class="sponsor-title"><?php _e('Gold Coast Sponsor', 'webcoast'); ?></h2>

						<ul class="inline-list sponsor-logos">

						<?php while($query_gold->have_posts()) : $query_gold->the_post(); ?>

							<?php get_template_part( 'content', 'sponsor' ); ?>

						<?php endwhile; ?>

						</ul>

					<?php endif; wp_reset_postdata(); ?>

						<?php
					/**
					 * Silver
					 */
					?>

					<?php
						$query_silver_args = array(
							'posts_per_page' => -1,
							'post_type' => 'sponsor',
							'tax_query' => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'year',
									'field' => 'slug',
									'terms' => $current_year
								),
								array(
									'taxonomy' => 'sponsortyp',
									'field' => 'id',
									'terms' => array(68,82)
								)
							)
						);

						$query_silver = webcoast_get_transient_query( 'webcoast_sponsor_' . $current_year . '_silver_query', $query_silver_args, DAY_IN_SECONDS );
					?>

					<?php if($query_silver->have_posts()) : ?>

						<h2 class="sponsor-title"><?php _e('Silver Harbour Sponsor', 'webcoast'); ?></h2>

						<ul class="inline-list sponsor-logos">

						<?php while($query_silver->have_posts()) : $query_silver->the_post(); ?>

							<?php get_template_part( 'content', 'sponsor' ); ?>

						<?php endwhile; ?>

						</ul>

					<?php endif; wp_reset_postdata(); ?>

					<?php
					/**
					 * Bronze
					 */
					?>

					<?php
						$query_bronze_args = array(
							'posts_per_page' => -1,
							'post_type' => 'sponsor',
							'tax_query' => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'year',
									'field' => 'slug',
									'terms' => $current_year
								),
								array(
									'taxonomy' => 'sponsortyp',
									'field' => 'id',
									'terms' => array(69,80)
								)
							)
						);

						$query_bronze = webcoast_get_transient_query( 'webcoast_sponsor_' . $current_year . '_bronze_query', $query_bronze_args, DAY_IN_SECONDS );
					?>

					<?php if($query_bronze->have_posts()) : ?>

						<h2 class="sponsor-title"><?php _e('Bronze Treasures Sponsor', 'webcoast'); ?></h2>

						<ul class="no-bullet bronze-sponsor-listing">

						<?php while($query_bronze->have_posts()) : $query_bronze->the_post(); ?>

							<li>
								<a href="<?php the_field('sponsor_link'); ?>"><?php the_title(); ?></a>
							</li>

						<?php endwhile; ?>

						</ul>

					<?php endif; wp_reset_postdata(); ?>

					<?php
					/**
					 * Media Partner
					 */
					?>

					<?php
						$query_mediapartner_args = array(
							'posts_per_page' => -1,
							'post_type' => 'sponsor',
							'tax_query' => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'year',
									'field' => 'slug',
									'terms' => $current_year
								),
								array(
									'taxonomy' => 'sponsortyp',
									'field' => 'id',
									'terms' => array(88,89)
								)
							)
						);

						$query_mediapartner = webcoast_get_transient_query( 'webcoast_sponsor_' . $current_year . '_mediapartner_query', $query_mediapartner_args, DAY_IN_SECONDS );
					?>

					<?php if($query_mediapartner->have_posts()) : ?>

						<h2 class="sponsor-title"><?php _e('Media Partner', 'webcoast'); ?></h2>

						<ul class="no-bullet mediapartner-sponsor-listing">

						<?php while($query_mediapartner->have_posts()) : $query_mediapartner->the_post(); ?>

							<li>
								<a href="<?php the_field('sponsor_link'); ?>"><?php the_title(); ?></a>
							</li>

						<?php endwhile; ?>

						</ul>

					<?php endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer (); ?>