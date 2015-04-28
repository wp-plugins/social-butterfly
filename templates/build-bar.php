<?php
		# the inline style if we're hiding social butterfly (hover to reveal)
		$is_open = get_option('social_butterfly_is_open');
		$hide_style = $is_open ? '' : 'style="display:none"';
		$hide_js = '';
		if (!$is_open){
			$hide_js = 'onmouseover="document.getElementById(\'social-butterfly-middle' . $i . '\').style.display=\'block\';" onmouseout="document.getElementById(\'social-butterfly-middle' . $i . '\').style.display=\'none\';"';
		}
		# if bar is open, the right div will have a unique class, and don't show the '+' sign (in the right div)
		$expanded_class = $is_open ? 'is_open' : '';
		$plus_sign = $is_open ? '' : '+';
		$open_plus = $is_open ? '+' : '';
		# begin building bar
		$share_bar_code .=  '<div class="social-butterfly"><div style="background-color:#' . $bg_color .'" class="social-butterfly-share-box" ' . $hide_js .'>
		<div id="social-butterfly-left">SHARE' . $open_plus . '</div>
		<div id="social-butterfly-middle' . $i . '" class="social-butterfly-middle" ' . $hide_style  . '>';
		if (get_option('social_butterfly_show_fb')) {
			$share_bar_code .= '
			<div id="social-butterfly-fb" class="social-butterfly-icon-box" style="border-left:1px solid #' . $border_color . '">
				        <iframe src="http://www.facebook.com/plugins/like.php?href=' . get_permalink() . '&amp;layout=button_count&amp;show_faces=false&amp;width=55&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none;overflow:hidden; width:65px; height:65px;opacity:0;"></iframe>
				</div>';
		}
		if (get_option('social_butterfly_show_tw')) {
			$share_bar_code .= '
				<div id="social-butterfly-tw" class="social-butterfly-icon-box" style="border-left:1px solid #' . $border_color . '">
				        <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-size="large" data-count="none" data-via="' . $twitter_via . '">Tweet</a>
				        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>';
		}
		if (get_option('social_butterfly_show_ggl')) {
			$share_bar_code .= '
			       <div id="social-butterfly-ggl" class="social-butterfly-icon-box" style="border-left:1px solid #' . $border_color . '">
				        <div class="g-plusone" data-annotation="none" data-recommendations="false" data-size="standard"></div>
				</div>';
		}
		if (get_option('social_butterfly_show_li')) {
			$share_bar_code .= '
				<div id="social-butterfly-li" class="social-butterfly-icon-box ' . $li_top_class . '" style="border-left:1px solid #' . $border_color . '">
				        <script src="//platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script><script type="IN/Share"></script></div>';
		}
		 if (get_option('social_butterfly_show_pi')) {
                        $share_bar_code .= '
                                <div id="social-butterfly-pi" class="social-butterfly-icon-box" style="border-left:1px solid #' . $border_color . '"><a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="red"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a></div><script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>';
                }
		$share_bar_code .=  '
			</div>
			<div id="social-butterfly-right" class="' . $expanded_class . '">' . $plus_sign . '</div>
		</div></div>';
?>
