<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		// Start the loop.
		while ( have_posts() ) :
			the_post();

			// Include the page content template.
			get_template_part( 'content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			// End the loop.
		endwhile;
		?>
			
			<?php 
			$categories = [27, 28, 29, 30];
			$colors = array(
				27 => array('glow-pink', 'clr-pink', 'bg-pink'),
				28 => array('glow-blue', 'clr-blue', 'bg-blue'),
				29 => array('glow-teal', 'clr-teal', 'bg-teal'),
				30 => array('glow-violet', 'clr-violet', 'bg-violet')
			);

			$categories_with_posts = array();

			// Перебираем все категории и проверяем, есть ли в них записи
			foreach ($categories as $category) {
				$posts_in_category = get_posts( array(
					'category' => $category,
					'numberposts' => 1,
				) );

				if ( $posts_in_category ) {
					$categories_with_posts[] = $category;
				}
			}

			// Выводим записи только для категорий с записями
			$query_args = array(
				'category__in' => $categories_with_posts,
				'posts_per_page' => -1,
			);

			$query = new WP_Query( $query_args );
		
			if ( $query->have_posts() ) 
			{
				$pattern = '/\[wds id="(\d+)"\]/';	//регулярка для галерии
				
				while ( $query->have_posts() ) 
				{
					$query->the_post();
					// Отобразить содержимое записи

					$categories = get_the_category();
					if (!empty($categories)) 
					{
						foreach ($categories as $category) 
						{
							if (in_array($category->cat_ID, array(27, 28, 29, 30))) 
							{
								$categoryPost = $category->cat_ID;
								break;
							}
						}
					} ?>
					
						<div class="card-block <?= $colors[$categoryPost][0] ?>" id="<?= $post->ID ?>" style="display: block;">
							<div class="carousel">
								<?php wd_slider(preg_match($pattern, get_field('gallery'), $matches) ? $matches[1] : '') ?>
							</div>
							<div class="card-title <?= $colors[$categoryPost][1] ?>">
								<?php echo mb_strtoupper(get_field('nameShort')) ?>
							</div>
							<div class="card-text">
								<div class="long-name wght6 <?= $colors[$categoryPost][1] ?>" style="display: <?= get_field('nameLong') ? 'block;' : 'none;' ?>">
									<?php echo the_field('nameLong') ?>
								</div>
								<div class="card-info numeric">
									<?php the_field('class') ?> класс
									<br>
									<?php echo the_field('schedule') ?>
								</div>
								<div class="card-description">
									<?php $littleContent = mb_substr(get_the_content(), 0, 150); // Получаем первые 150 слов ?>
									<div class="short-content"><?php echo $littleContent ?></div>
    								<div class="full-content" style="display: none;"><?php the_content(); ?></div>
									<span class="show-more" style="cursor: pointer; color: blue;">Показать больше</span>
								</div>
								<div class="card-info">
									<span class="numeric">
										<?php the_field('pair') ?>
									</span>
									<br>
									<?php the_field('address') ?>
								</div>
							</div>
							<div class="card-price">
								стоимость: <span class="numeric"><?php the_field('price') ?></span> рублей
							</div>
							<div class="button-container">
								<a href="<?php the_field('link') ?>" class="btn-link clr-white card-button <?= $colors[$categoryPost][2] ?>">ПОДАТЬ ЗАЯВКУ</a>
							</div>
						</div>

			<?php	}
				wp_reset_postdata();
			} else {
				// Нет записей в категориях с записями
				echo 'error';
			}
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
