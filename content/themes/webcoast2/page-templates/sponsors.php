<?php
/**
 * Custom template for a page about sponsors
 *
 * This page loads the posts from the sponsors CPT and
 * also allows for loading for custom content from the page
 * itself, to show information directed to sponsors, on how to
 * get in and sponsor WebCoast.
 *
 * Template Name: Sponsors Page
 */

get_header();
?>

<div class="main sponsors-archive">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div class="row">
				<div class="content small-24 columns">
					<h1 class="page-title"><?php the_title(); ?></h1>

					<div class="page-body">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>

	<?php endif; ?>


	<section class="light-gray-bg" style="margin-bottom: -2rem;">
		<div class="row page-section">
			<div class="content small-24 columns">
				<h1 class="page-title"><?php _e( 'Our Sponsors', 'webcoast' ); ?></h1>

				<p class="intro"><?php _e('WebCoast would not be anything without our sponsors. This year, we are proud to have the following great companies sponsoring us.', 'webcoast'); ?></p>

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

							$query_platinum = webcoast_get_transient_query( 'wc_sp_' . $current_year . '_plat', $query_platinum_args, DAY_IN_SECONDS );
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

							$query_gold = webcoast_get_transient_query( 'wc_sp_' . $current_year . '_gold', $query_gold_args, DAY_IN_SECONDS );
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

							$query_silver = webcoast_get_transient_query( 'wc_sp_' . $current_year . '_silver', $query_silver_args, DAY_IN_SECONDS );
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

							$query_bronze = webcoast_get_transient_query( 'wc_sp_' . $current_year . '_bronze', $query_bronze_args, DAY_IN_SECONDS );
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

							$query_mediapartner = webcoast_get_transient_query( 'wc_sp_' . $current_year . '_media', $query_mediapartner_args, DAY_IN_SECONDS );
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
	</section>

</div>
<?php get_footer(); ?>