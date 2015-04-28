<?php

	$html = '
<script type="text/javascript" src="' . plugins_url() . '/social-butterfly/jscolor/jscolor.js"></script>	
<div class="wrap">
	    <form method="post" name="options" action="options.php">

	    <h2>Social Butterfly Settings</h2>' . wp_nonce_field('update-options') . '
	<div style="width:550px;">
	<div class="postbox" style="margin-top:10px;width:250px;float:left;display:block;height:290px">
		<h3 style="font-size:15px;font-weight:normal;padding:0 0 12px 7px;margin-bottom:-10px;margin-top:12px;border-bottom:1px solid lightgrey">Select Networks</h3>
	    <table width="100%" cellpadding="10" class="form-table">
		<tr>
		    <td align="left" scope="row" style="padding-bottom:10px">
		    	<label class="social_butterfly_network_select" style="width:100px;font-weight:bold;display:inline-block">Facebook</label><input type="checkbox" '.$show_fb.' name="social_butterfly_show_fb" value="true" />
		    </td> 
		</tr>
		<tr>
		    <td align="left" scope="row" style="padding-bottom:10px">
		    	<label class="social_butterfly_network_select" style="width:100px;font-weight:bold;display:inline-block">Google Plus</label><input type="checkbox" '.$show_ggl.' name="social_butterfly_show_ggl" value="true" />
		    </td> 
		</tr>
		<tr>
		    <td align="left" scope="row" style="padding-bottom:10px">
		    	<label class="social_butterfly_network_select" style="width:100px;font-weight:bold;display:inline-block">LinkedIn</label><input type="checkbox" '.$show_li.' name="social_butterfly_show_li" value="true" />
		    </td> 
		</tr>
		<tr>
                    <td align="left" scope="row" style="padding-bottom:5px;">
                        <label class="social_butterfly_network_select" style="width:100px;font-weight:bold;display:inline-block">Pinterest</label><input type="checkbox" '.$show_pi.' name="social_butterfly_show_pi" value="true" />
                    </td>
                </tr>
		 <tr>
                    <td align="left" scope="row" style="padding-bottom:5px;">
                        <label class="social_butterfly_network_select" style="width:100px;font-weight:bold;display:inline-block">Twitter</label><input type="checkbox" '.$show_tw.' name="social_butterfly_show_tw" value="true" />
                    </td>
                </tr>

		<tr>
                    <td align="left" scope="row" style="padding-top:0px">
			<div style="width:100px;float:left;">
				<div style="float:left">
                        		<label class="social_butterfly_twitter_via">Handle</label>
				</div>
				<div style="float:right;color:grey;margin-right:4px;margin-top:4px;">@</div>
			</div>
			<div style="float:left">
				<input type="text" name="social_butterfly_twitter_via" value="' . $twitter_via . '" style="margin-left:-1px;width:100px;font-size:11px;" />
			</div>
                    </td>
                </tr>


</table>
</div>

<div class="postbox" style="height:240px;margin-top:10px;width:275px;float:right;">
	<h3 style="font-size: 15px;font-weight:normal;padding:0 0 12px 7px;margin-bottom:-10px;margin-top:12px;border-bottom:1px solid lightgrey">Fly With Us</h3>

	<p style="margin:15px;padding-top:10px;font-weight:bold">Please report bugs, provide feedback and submit feature requests <a href="http://www.website101.net/contact-us">here</a>.</p>
	<p style="text-align:center;font-style:italic;padding:7px 0;border-bottom:1px solid #F1F1F1;border-top:1px solid #F1F1F1;">"The caterpillar does all the work,<br>but the butterfly gets all the glory"</p>
	<p style="margin:10px 15px 2px 15px;text-align:center;"><strong>Help Us Grow</strong></p>
	<p style="text-align:center;margin: 0px 0 13px 0;">
		<a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&amp;business=social%2ebutterfly%40website101%2enet&amp;lc=CA&amp;item_name=Social%20Butterfly&amp;currency_code=USD&amp;bn=PP%2dDonationsBF%3abtn_donate_LG%2egif%3aNonHosted">
<img src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" style="/* margin:7px 0 13px 12px; */">
</a>
	</p>
</div>
</div>

<div class="postbox" style="width:550px;clear:both;background-image:url(\'' . plugins_url() . '/social-butterfly/images/small-grey-bf.png\');background-repeat:no-repeat;background-position:490px 200px;">
<h3 style="font-size:15px;font-weight:normal;padding:0 0 12px 7px;margin-bottom:-10px;margin-top:12px;border-bottom:1px solid lightgrey">Style Settings</h3>
<table width="100%" cellpadding="10" class="form-table">
		<tr>
			<td align="left" scope="row" style="padding-bottom:0px">
				<label style="display:inline-block;width:130px;">' . __('Background Color','social-butterfly') . '</label>
				<input type="text" onchange="changeBgColor()" id="bg_color" class="color" value="' . $bg_color . '" name="social_butterfly_bg_color" /></td>
			</td>
		</tr>
                <tr>
                        <td align="left" scope="row" style="padding-bottom:0px">
                                <label style="display:inline-block;width:130px;">' . __('Padding Color','social-butterfly') . '</label>
                                <input type="text" onchange="changeBorderColor();" id="border_color" class="color" value="' . $border_color .'" name="social_butterfly_border_color" /></td>
                        </td>
                </tr>
                <tr>
                    <td align="left" scope="row" style="width:440px;padding-bottom:0px">
                        <label style="display:inline-block;width:130px;">' . __('Stay Open','social-butterfly') . ' </label><input type="checkbox" ' . $is_open . ' name="social_butterfly_is_open" value="true" id="is_open" onchange="toggleIsOpen();" />
                    </td>
                </tr>
		<tr>
			<td>
			<p><strong>Preview</strong></p>
<script type="text/javascript">
	function changeBgColor(){
		color = jQuery("#bg_color").val();
		jQuery(".social-butterfly-share-box").css("background-color","#" + color);
	}
	function toggleIsOpen(){
		if (jQuery("#is_open").prop("checked") == true){
			jQuery("#sb_open").show();
			jQuery("#sb_collapsed").hide();
		}
		else {
                        jQuery("#sb_open").hide();
                        jQuery("#sb_collapsed").show();
                }
	}
	function changeBorderColor(){
		color = jQuery("#border_color").val();
		jQuery(".social-butterfly-icon-box").css("border-left", "1px solid #" + color);
	}
	jQuery(document).ready(function() {
  		toggleIsOpen();
		changeBorderColor();
	});
</script>
<div id="sb_open">
<div class="social-butterfly">
	<div id="social-butterfly-share-box" style="max-height:24px;overflow:hidden;background:#' . $bg_color . ';height:24px;display:inline-block;position:relative;font-size:12px;border:0;border-radius:2px;font-family:\'Open Sans\',\'Helvetica\',Neue,Helvetica,Arial,sans-serif;color: #fff;clear:both;text-shadow:none !important;margin: 15px 0;" class="social-butterfly-share-box" >
        <div id="social-butterfly-left" style="float: left;line-height: 24px;white-space: nowrap;padding-left: 8px;padding-right: 10px;">SHARE+</div>
            <div id="social-butterfly-middle-x" class="social-butterfly-middle" style="float: left;line-height: 24px;max-height: 24px;overflow: hidden;margin-left: 25px;">
                <div id="social-butterfly-fb" class="social-butterfly-icon-box" style="background-image: url(\'' . plugins_url() . '/social-butterfly/images/fb.png\');width: 23px;float: left;overflow: hidden;max-height: 24px;cursor: pointer;background-position: center;background-repeat: no-repeat;">&nbsp;</div>
                <div id="social-butterfly-tw" class="social-butterfly-icon-box" style="background-image: url(\'' . plugins_url() . '/social-butterfly/images/tw.png\');width: 23px;float: left;overflow: hidden;max-height: 24px;cursor: pointer;background-position: center;background-repeat: no-repeat;">&nbsp;</div>
                <div id="social-butterfly-ggl" class="social-butterfly-icon-box" style="background-image: url(\'' . plugins_url() . '/social-butterfly/images/ggl.png\');width: 23px;float: left;overflow: hidden;max-height: 24px;cursor: pointer;background-position: center;background-repeat: no-repeat;">&nbsp;</div>
                <div id="social-butterfly-li" class="social-butterfly-icon-box" style="background-image: url(\'' . plugins_url() . '/social-butterfly/images/li.png\');width: 23px;float: left;overflow: hidden;max-height: 24px;cursor: pointer;background-position: center;background-repeat: no-repeat;">&nbsp;</div>
		 <div id="social-butterfly-pi" class="social-butterfly-icon-box" style="background-image: url(\'' . plugins_url() . '/social-butterfly/images/pi.png\');width: 23px;float: left;overflow: hidden;max-height: 24px;cursor: pointer;background-position: center;background-repeat: no-repeat;">&nbsp;</div>
	    </div>
            <div id="social-butterfly-right" style="border-left: 0;width: 5px;float: right;height: 100%;line-height: 24px;"></div>
            </div>
		</div>
	</div>
</div>
</div>

<div id="sb_collapsed">
<div class="social-butterfly">
	<div style="max-height:24px;overflow:hidden;background:#' . $bg_color . ';height:24px;display:inline-block;position:relative;font-size:12px;border:0;border-radius:2px;font-family:\'Open Sans\',\'Helvetica\',Neue,Helvetica,Arial,sans-serif;color: #fff;clear:both;text-shadow:none !important;margin: 15px 0;" class="social-butterfly-share-box" onmouseover="document.getElementById(\'social-butterfly-middle\').style.display=\'block\';" onmouseout="document.getElementById(\'social-butterfly-middle\').style.display=\'none\';">
        <div id="social-butterfly-left" style="float: left;line-height: 24px;white-space: nowrap;padding-left: 8px;padding-right: 10px;">SHARE</div>
            <div id="social-butterfly-middle" class="social-butterfly-middle" style="display:none;float: left;line-height: 24px;max-height: 24px;overflow: hidden;margin-left: 25px;">
                <div id="social-butterfly-fb" class="social-butterfly-icon-box" style="background-image: url(\'' . plugins_url() . '/social-butterfly/images/fb.png\');width: 23px;float: left;overflow: hidden;max-height: 24px;cursor: pointer;background-position: center;background-repeat: no-repeat;">&nbsp</div>
                <div id="social-butterfly-tw" class="social-butterfly-icon-box" style="background-image: url(\'' . plugins_url() . '/social-butterfly/images/tw.png\');width: 23px;float: left;overflow: hidden;max-height: 24px;cursor: pointer;background-position: center;background-repeat: no-repeat;">&nbsp;</div>
                <div id="social-butterfly-ggl" class="social-butterfly-icon-box" style="background-image: url(\'' . plugins_url() . '/social-butterfly/images/ggl.png\');width: 23px;float: left;overflow: hidden;max-height: 24px;cursor: pointer;background-position: center;background-repeat: no-repeat;">&nbsp;</div>
                <div id="social-butterfly-li" class="social-butterfly-icon-box" style="background-image: url(\'' . plugins_url() . '/social-butterfly/images/li.png\');width: 23px;float: left;overflow: hidden;max-height: 24px;cursor: pointer;background-position: center;background-repeat: no-repeat;">&nbsp;</div>
		<div id="social-butterfly-pi" class="social-butterfly-icon-box" style="background-image: url(\'' . plugins_url() . '/social-butterfly/images/pi.png\');width: 23px;float: left;overflow: hidden;max-height: 24px;cursor: pointer;background-position: center;background-repeat: no-repeat;">&nbsp;</div>

           </div>     
	   <div id="social-butterfly-right" style="border-left: 1px solid #fff;width: 45px;float: right;height: 100%;line-height: 24px;text-align:center;cursor:default;color:white;" class="social-butterfly-icon-box">+</div>
            </div>
		</div>
	</div>
</div>
</div>

	
		</tr>
</table>
</div>
<div class="postbox" style="width:550px;clear:both">
<h3 style="font-size:15px;font-weight:normal;padding:0 0 12px 7px;margin-bottom:-10px;margin-top:12px;border-bottom:1px solid lightgrey">Display Settings</h3>
<table width="100%" cellpadding="10" class="form-table">
		<tr>
		    <td align="left" scope="row" style="width:440px;">
		    	<label>' . __('Display Social Butterfly <strong>above</strong> the content on all posts by default','social-butterfly') . ' </label><br /><span style="font-size: 12px;color: #777;">' . __('(this setting can be overriden on individual post pages)','social-butterfly') . '</span></td><td style="vertical-align:top"><input type="checkbox" ' . $show_top . ' name="social_butterfly_show_top" value="true" />
		    </td> 
		</tr>
		 <tr>
		    <td align="left" scope="row">
		    	<label>' . __('Display Social Butterfly <strong>below</strong> the content on all posts by default','social-butterfly') . ' </label><br /><span style="font-size: 12px;color: #777;">' . __('(this setting can be overriden on individual post pages)','social-butterfly') . '</span></td><td style="vertical-align:top"><input type="checkbox" ' . $show_bot . ' name="social_butterfly_show_bot" value="true" />
		    </td> 
		</tr>
		<tr>
	            <td align="left" scope="row">
                    	<label>' . __('Don\'t override my existing individual post settings', 'social-butterfly') . '</label><br /><span style="font-size: 12px;color: #777;">' .  __('(recommended)', 'social-butterfly') . '</span></td><td style="vertical-align:top"><input type="radio" checked name="social_butterfly_do_override" value="false" />
                    </td> 
                </tr>
                <tr>
                    <td align="left" scope="row">
                    	<label>' . __('Override all individual post settings with these new settings', 'social-butterfly') . '</label><br /><span style="font-size: 12px;color: #777;">' .  __('(Caution: Any manual overrides you have set within posts to show or hide Social Butterfly will be overwritten with the settings specified above)', 'social-butterfly') . '</span></td><td style="vertical-align:top"><input type="radio" name="social_butterfly_do_override" value="true" />
                    </td> 
                </tr>
            </table>
</div>
            <p class="submit">
                <input type="hidden" name="action" value="update" />  
                <input type="hidden" name="page_options" value="social_butterfly_is_open,social_butterfly_show_top,social_butterfly_show_bot, social_butterfly_do_override,social_butterfly_show_fb,social_butterfly_show_tw,social_butterfly_show_ggl,social_butterfly_show_li,social_butterfly_show_pi,social_butterfly_twitter_via, social_butterfly_bg_color, social_butterfly_border_color" /> 
                <input type="submit" name="Submit" value="Update" />
            </p>
            </form>
        </div>';

	echo $html;
?>
