<?php

	$html = '<div class="wrap">
	    <form method="post" name="options" action="options.php">

	    <h2>Social Butterfly Settings</h2>' . wp_nonce_field('update-options') . '
	<div style="width:550px;">
	<div class="postbox" style="margin-top:10px;width:250px;float:left;display:block;height:240px">
		<h3 style="font-size:15px;font-weight:normal;padding:7px 7px;margin-bottom:-10px;">Select Networks</h3>
	    <table width="100%" cellpadding="10" class="form-table">
		<tr>
		    <td align="left" scope="row">
		    	<label class="social_butterfly_network_select" style="width:100px;font-weight:bold;display:inline-block">Facebook</label><input type="checkbox" '.$show_fb.' name="social_butterfly_show_fb" value="true" />
		    </td> 
		</tr>
		<tr>
		    <td align="left" scope="row">
		    	<label class="social_butterfly_network_select" style="width:100px;font-weight:bold;display:inline-block">Twitter</label><input type="checkbox" '.$show_tw.' name="social_butterfly_show_tw" value="true" />
		    </td> 
		</tr>
		<tr>
		    <td align="left" scope="row">
		    	<label class="social_butterfly_network_select" style="width:100px;font-weight:bold;display:inline-block">Google Plus</label><input type="checkbox" '.$show_ggl.' name="social_butterfly_show_ggl" value="true" />
		    </td> 
		</tr>
		<tr>
		    <td align="left" scope="row">
		    	<label class="social_butterfly_network_select" style="width:100px;font-weight:bold;display:inline-block">LinkedIn</label><input type="checkbox" '.$show_li.' name="social_butterfly_show_li" value="true" />
		    </td> 
		</tr>
</table>
</div>

<div class="postbox" style="margin-top:10px;width:275px;float:right;background-image:url(\'' . plugins_url() . '/social-butterfly/images/small-grey-bf.png\');background-repeat:no-repeat;background-position:210px 180px;">
	<h3 style="font-size: 15px;font-weight:normal;padding:7px 7px;margin-bottom:-10px;">Fly With Us</h3>

	<p style="margin:15px;padding-top:10px;font-weight:bold">Please report bugs, provide feedback and submit feature requests <a href="http://www.website101.net/contact-us">here</a>.</p>
	<p style="text-align:center;font-style:italic;padding:7px 0;border-bottom:1px solid #F1F1F1;border-top:1px solid #F1F1F1;">"The caterpillar does all the work,<br>but the butterfly gets all the glory"</p>
	<p style="margin:10px 15px 2px 15px;"><strong>Help Us Grow</strong></p>

<a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=social%2ebutterfly%40website101%2enet&lc=CA&item_name=Social%20Butterfly&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_LG%2egif%3aNonHosted">
<img src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"  style="margin:7px 0 13px 12px;">
</a>


	
</div>
</div>

<div class="postbox" style="width:550px;clear:both">
<h3 style="font-size:15px;font-weight:normal;padding:7px 7px;margin-bottom:-10px;">Display Settings</h3>
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
                <input type="hidden" name="page_options" value="social_butterfly_show_top,social_butterfly_show_bot, social_butterfly_do_override,social_butterfly_show_fb,social_butterfly_show_tw,social_butterfly_show_ggl,social_butterfly_show_li" /> 
                <input type="submit" name="Submit" value="Update" />
            </p>
            </form>
        </div>';

	echo $html;
?>