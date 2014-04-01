<?php
		$share_bar_code .=  '<div class="social-butterfly"><div class="share-box" onmouseover="document.getElementById(\'middle' . $i . '\').style.display=\'block\';" onmouseout="document.getElementById(\'middle' . $i . '\').style.display=\'none\';">
		<div id="left">SHARE</div>
		<div id="middle' . $i . '" class="middle" style="display:none">';
		if (get_option('social_butterfly_show_fb')) {
			$share_bar_code .= '
			<div id="fb" class="icon-box">
				        <iframe src="http://www.facebook.com/plugins/like.php?href=http://www.google.com&amp;layout=button_count&amp;show_faces=false&amp;width=55&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none;overflow:hidden; width:65px; height:65px;opacity:0;"></iframe>
				</div>';
		}
		if (get_option('social_butterfly_show_tw')) {
			$share_bar_code .= '
				<div id="tw" class="icon-box">
				        <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-size="large" data-count="none">Tweet</a>
				        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>';
		}
		if (get_option('social_butterfly_show_ggl')) {
			$share_bar_code .= '
			       <div id="ggl" class="icon-box">
				        <div class="g-plusone" data-annotation="none" data-recommendations="false" data-size="standard"></div>
				</div>';
		}
		if (get_option('social_butterfly_show_li')) {
			$share_bar_code .= '
				<div id="li" class="icon-box">
				        <script src="//platform.linkedin.com/in.js" type="text/javascript">
				                lang: en_US
				        </script>
				        <script type="IN/Share"></script>
				</div>';
		}
		$share_bar_code .=  '
			</div>
			<div id="right">+</div>
		</div></div>';
?>