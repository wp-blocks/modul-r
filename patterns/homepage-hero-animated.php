<?php
/**
 * Title: HomePage Hero Animated
 * Slug: modul-r/homepage-hero-animated
 * Categories: header, modul-r
 */
$animated_background = '<!-- wp:html --><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;max-width: inherit;min-width: 100%;height: 100%;display:block;z-index:-1;position:absolute;top:0;left:0;right:0;" preserveAspectRatio="none" viewBox="0 0 1920 1080">
			<g transform="translate(960,540) scale(1,1) translate(-960,-540)">
				<linearGradient id="line-gradient" x1="0" x2="1" y1="0" y2="0">
					<stop stop-color="#6f4cad" offset="0"></stop>
					<stop stop-color="#16bebb" offset="1"></stop>
				</linearGradient>
				<path d="" fill="url(#line-gradient)" opacity="0.4">
					<animate attributeName="d" dur="10s" repeatCount="indefinite" keyTimes="0;0.333;0.667;1"
							 calcMode="spline" keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" begin="0s"
							 values="M0 0L 0 1048.0235463793513Q 192 928.987141111007  384 902.7984442154647T 768 774.2361120199191T 1152 773.0215339500537T 1536 614.0456568629927T 1920 533.5821942633261L 1920 0 Z;M0 0L 0 897.338126308857Q 192 860.8168952440394  384 815.3882790596613T 768 779.3365403690098T 1152 558.1704855177773T 1536 586.0143150893697T 1920 444.65062157144973L 1920 0 Z;M0 0L 0 915.8507088090228Q 192 790.5312471686162  384 759.8115178056486T 768 852.7717242244754T 1152 692.4444820687551T 1536 529.9169980187689T 1920 360.2963963285705L 1920 0 Z;M0 0L 0 1048.0235463793513Q 192 928.987141111007  384 902.7984442154647T 768 774.2361120199191T 1152 773.0215339500537T 1536 614.0456568629927T 1920 533.5821942633261L 1920 0 Z"></animate>
				</path>
				<path d="" fill="url(#line-gradient)" opacity="0.4">
					<animate attributeName="d" dur="10s" repeatCount="indefinite" keyTimes="0;0.333;0.667;1"
							 calcMode="spline" keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" begin="-2s"
							 values="M0 0L 0 971.4543137291254Q 192 953.0838033728264  384 911.5533767180971T 768 857.7391014878959T 1152 699.2787969270518T 1536 470.5496996330724T 1920 391.6192878105277L 1920 0 Z;M0 0L 0 1029.2862376569067Q 192 876.2638801475732  384 862.8061140933545T 768 858.152582340445T 1152 699.6106026166756T 1536 532.5402819776184T 1920 469.50041092601236L 1920 0 Z;M0 0L 0 929.1440591027326Q 192 960.272709848786  384 921.446849823398T 768 846.7967415657808T 1152 682.4535560929364T 1536 647.9720046104279T 1920 427.1127120183462L 1920 0 Z;M0 0L 0 971.4543137291254Q 192 953.0838033728264  384 911.5533767180971T 768 857.7391014878959T 1152 699.2787969270518T 1536 470.5496996330724T 1920 391.6192878105277L 1920 0 Z"></animate>
				</path>
				<path d="" fill="url(#line-gradient)" opacity="0.4">
					<animate attributeName="d" dur="10s" repeatCount="indefinite" keyTimes="0;0.333;0.667;1"
							 calcMode="spline" keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" begin="-4s"
							 values="M0 0L 0 899.146061943384Q 192 816.7807798398503  384 779.9528054585896T 768 773.6000722874003T 1152 638.2203937581166T 1536 560.5308580620235T 1920 516.9737119385375L 1920 0 Z;M0 0L 0 969.0958118391045Q 192 855.2958118102569  384 825.7967305011035T 768 807.4969238026301T 1152 612.2459601185939T 1536 694.2367039865289T 1920 424.394789142685L 1920 0 Z;M0 0L 0 888.7157015203587Q 192 915.1443819811288  384 882.6322372129603T 768 835.6347502554163T 1152 735.4500922675956T 1536 587.0794527772757T 1920 524.4642424098683L 1920 0 Z;M0 0L 0 899.146061943384Q 192 816.7807798398503  384 779.9528054585896T 768 773.6000722874003T 1152 638.2203937581166T 1536 560.5308580620235T 1920 516.9737119385375L 1920 0 Z"></animate>
				</path>
			</g>
		</svg><!-- /wp:html -->'
?>
<!-- wp:cover {"useFeaturedImage":true,"overlayColor":"black","minHeight":100,"minHeightUnit":"vh","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|60"}}}} -->
<div class="wp-block-cover"
	 style="margin-top:0;margin-bottom:var(--wp--preset--spacing--60);min-height:100vh;">
	<span aria-hidden="true"
		  class="wp-block-cover__background has-black-background-color has-background-dim-100 has-background-dim"></span>
	<div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
		<?php echo $animated_background ?>
		<div class="wp-block-group">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|80","left":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group"
				 style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--60)">

				<!-- wp:site-title {"style":{"typography":{"fontSize":"5rem","fontStyle":"normal","fontWeight":"200"},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"fontFamily":"title"} /-->

				<!-- wp:site-tagline {"textAlign":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|80","left":"var:preset|spacing|80"}}}} /-->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons"><!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">QUICK START 🡲</a></div>
					<!-- /wp:button -->

					<!-- wp:button {"textColor":"white","className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color wp-element-button">DOWNLOAD 🡲</a></div>
					<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
			<!-- /wp:group --></div>
		<!-- /wp:group --></div>
</div>
<!-- /wp:cover -->
