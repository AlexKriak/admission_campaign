<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

if ( ! function_exists( 'searchCard' ) ) {
	
	function wd_slider_shortcode($atts) {
		$atts = shortcode_atts( array(
			'data' => '',
		), $atts);

		ob_start();
		wd_slider($atts['data']);
		return ob_get_clean();
	}

	
	function searchCard()
	{		
		$addressId = get_cat_ID($_POST['address']);
		$classId = get_cat_ID($_POST['classChildren']);
		$dateId = get_cat_ID($_POST['dateTeam']);

		$category_ids = array($addressId, $classId, $dateId);

		/*$posts = get_posts(array(
			'category__and' => $category_ids,
			'posts_per_page' => 20,
		));

		$post_ids = [];

		foreach($posts as $post) {
			$post_ids[] = $post->ID;
		}

		return $post_ids;*/
		
		//add_shortcode('wd_slider', 'wd_slider_shortcode');

		$query = new WP_Query(array(
			'category__and' => $category_ids,
			'posts_per_page' => -1,
		));
		$categories = [27, 28, 29, 30];
		$colors = array(
			27 => array('glow-pink', 'clr-pink', 'bg-pink'),
			28 => array('glow-blue', 'clr-blue', 'bg-blue'),
			29 => array('glow-teal', 'clr-teal', 'bg-teal'),
			30 => array('glow-violet', 'clr-violet', 'bg-violet')
		);
		$pattern = '/\[wds id="(\d+)"\]/';	//регулярка для галерии
		
		$result = '';
		if ($query->have_posts())
		{
			while ( $query->have_posts() ) 
			{
				$query->the_post();

				$categories = get_the_category();
				$categoryPost = 0;

				foreach ($categories as $category) 
				{
					if (in_array($category->cat_ID, array(27, 28, 29, 30))) 
					{
						$categoryPost = $category->cat_ID;
						break;
					}
				}
				
				preg_match('/\d+/', get_field('gallery'), $matches);
				$numbersAsInt = array_map('intval', $matches);
				
				$glow = $colors[$categoryPost][0];
				$clr = $colors[$categoryPost][1];
				$bg = $colors[$categoryPost][2];
				
				$result .= '<div class="card-block '.$colors[$categoryPost][0].' " style="display: block;">';
				$result .= '<div class="carousel">';
				$result .= do_shortcode('[wds id="'.$numbersAsInt[0].'"]')/*do_shortcode('[wds id="'.do_shortcode('[wd_slider data="'.preg_match($pattern, get_field('gallery'), $matches) ? $matches[1] : ''.'"]').'"]')*/;
				$result .= '</div>';
				$result .= '<div class="card-title '.$clr.' ">';
				$result .= mb_strtoupper(get_field('nameShort'));
				$result .= '</div>';
				$result .= '<div class="card-text">';
				$result .= '<div class="long-name wght6 '.$clr.' " style="display:'. (get_field('nameLong') ? 'block;' : 'none;' ) .'">';
				$result .= get_field('nameLong');
				$result .= '</div>';
				$result .= '<div class="card-info numeric">';
				$result .= get_field('class') . ' класс<br>' . get_field('schedule');
				$result .= '</div>';
				
				$words = preg_split('/\s+/', get_the_content(), 16);
				$littleContent = implode(' ', array_slice($words, 0, 15));
				$result .= '<div class="card-description">';
				$result .= '<div class="short-content">'.$littleContent.'</div>';
    			$result .= '<div class="full-content" style="display: none;">'.get_the_content().'</div>';
				$result .= '<span class="show-more" style="cursor: pointer; color: blue;" onclick="showFull(this)">Показать больше</span>';
				//$result .= get_the_content();
				$result .= '</div>';
				$result .= '<div class="card-info">';
				$result .= '<span class="numeric">';
				$result .= get_field('pair');
				$result .= '</span>';
				$result .= '<br>';
				$result .= get_field('address');
				$result .= '</div>';
				$result .= '</div>';
				$result .= '<div class="card-price">';
				$result .= 'стоимость: <span class="numeric">'. get_field('price') .'</span> рублей';
				$result .= '</div>';
				$result .= '<div class="button-container">';
				//$result .= '<a class="bg-disable clr-white card-button '. $bg .' " onclick="alert(\'Подача заявок будет доступна с 13 мая\')">ПОДАТЬ ЗАЯВКУ</a>';
				$result .= '<a href="'. get_field('link') .'" class="clr-white card-button '. $bg .' ">ПОДАТЬ ЗАЯВКУ</a>';
				$result .= '</div>';
				$result .= '</div>';
			}
		}

		echo $result;
	}
}

if (isset($_POST['action']) && $_POST['action'] === 'searchCard') {
    // Вызываем нужную функцию для обработки данных
    $result = searchCard();

    // Отправляем результат обратно на клиент
    echo json_encode($result);
}