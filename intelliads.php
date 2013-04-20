<?php



/* 

	Plugin Name: IntelliChristian! Ads, Affiliate Program, and Link Exchange
	Plugin URI: http://djalexplugins.weebly.com
	Description: Widgets for IntelliChristian Ads, Affiliate Program, and Link Exchange
	Author: DJ Alex
	Version: 2.1.2
	Author URI: http://djalexplugins.weebly.com

*/



/*	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.


	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.


	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/


add_action("widgets_init", array('IntelliChristian_Links', 'register'));
register_activation_hook( __FILE__, array('IntelliChristian_Links', 'activate'));
register_deactivation_hook( __FILE__, array('IntelliChristian_Links', 'deactivate'));
class IntelliChristian_Links {
  function activate(){
    $data = array( 'option1' => 'Default value' ,'option2' => 55);
    if ( ! get_option('widget_name')){
      add_option('widget_name' , $data);
    } else {
      update_option('widget_name' , $data);
    }
  }
  function deactivate(){
    delete_option('widget_name');
  }
  function control(){
    echo '<a href="http://ppc.intellichristian.com/link-exchange">Submit an ad about your site here</a>';
  }
  function widget($args){
    echo $args['before_widget'];
    echo $args['before_title'] . 'Links' . $args['after_title'];?>
<script src="http://ppc.intellichristian.com/ads/ads.php?t=MTA0MjsyMztzcXVhcmUuc21hbGxfcmVjdGFuZ2xl"></script>
<?php
  echo $args['after_widget'];
  }
  function register(){
    register_sidebar_widget('IntelliChristian Link Exchange', array('IntelliChristian_Links', 'widget'));
    register_widget_control('IntelliChristian Link Exchange', array('IntelliChristian_Links', 'control'));
  }
}

add_action("widgets_init", array('IntelliChristian_Affiliate', 'register'));
register_activation_hook( __FILE__, array('IntelliChristian_Affiliate', 'activate'));
register_deactivation_hook( __FILE__, array('IntelliChristian_Affiliate', 'deactivate'));
class IntelliChristian_Affiliate {
  function activate(){
    $data = array( 'option1' => 'Default value' ,'option2' => 55);
    if ( ! get_option('widget_name')){
      add_option('widget_name' , $data);
    } else {
      update_option('widget_name' , $data);
    }
  }
  function deactivate(){
    delete_option('widget_name');
  }
  function control(){
    echo 'This widget will add all the code you need to display products from IntelliChristian! Affiliate Program, but you will need to sign up at <a href="http://intellichristian.com/affiliateprogram">http://intellichristian.com/affiliateprogram</a> for payments and statistics.';
  }
  function widget($args){
    echo $args['before_widget'];
    echo $args['before_title'] . 'Affiliate Products' . $args['after_title'];?>
<script src="http://ppc.intellichristian.com/ads/ads.php?t=MTA2NDsyNzt2ZXJ0aWNhbC5iYW5uZXI="></script>
<?php
  echo $args['after_widget'];
  }
  function register(){
    register_sidebar_widget('IntelliChristian Affiliate Program', array('IntelliChristian_Affiliate', 'widget'));
    register_widget_control('IntelliChristian Affiliate Program', array('IntelliChristian_Affiliate', 'control'));
  }
}

add_action("widgets_init", array('IntelliChristian_Ads', 'register'));
register_activation_hook( __FILE__, array('IntelliChristian_Ads', 'activate'));
register_deactivation_hook( __FILE__, array('IntelliChristian_Ads', 'deactivate'));
class IntelliChristian_Ads {
  function activate(){
    $data = array( 'option1' => 'Default value' ,'option2' => 55);
    if ( ! get_option('widget_name')){
      add_option('widget_name' , $data);
    } else {
      update_option('widget_name' , $data);
    }
  }
  function deactivate(){
    delete_option('widget_name');
  }
  function control(){
    echo '<p>This widget will add all the code you need to display an invitation to advertise on this site. But you will need to sign up at <a href="http://ppc.intellichristian.com/publishers">http://ppc.intellichristian.com/publishers</a>for payments and statistics</p>';
  }
  function widget($args){
    echo $args['before_widget'];
    echo $args['before_title'] . '' . $args['after_title'];?>
<!-- IntelliChristian! PayPerClick Ad Code - Targeted Publisher 2 - Small Rectangle (180 x 150) -->
<script language="javascript" type="text/javascript">
//Number of ads to offset the result
offset_25 = 0;
//Request ads for a specific keyword
keyword_25 = '<?php echo $_SERVER["SERVER_NAME"]; ?>';
document.write("<script language='javascript' type='text/javascript' src='http://ppc.intellichristian.com/ads/ads.php?t=MTAwMjsyNTtzcXVhcmUuc21hbGxfcmVjdGFuZ2xl&o=" + offset_25 + "&k=" + escape(keyword_25)  + "'><\/sc" + "ript>");
</script>
<!-- End IntelliChristian! PayPerClick Ad Code -->
<?php
  echo $args['after_widget'];
  }
  function register(){
    register_sidebar_widget('IntelliChristian Ads', array('IntelliChristian_Ads', 'widget'));
    register_widget_control('IntelliChristian Ads', array('IntelliChristian_Ads', 'control'));
  }
}


	





	



function ads_admin_page_inc() { 

	include('intelliads-admin.php');

} 

function ads_admin_page() {  

	add_options_page("IntelliAds Options", "IntelliAds", 8, basename(__FILE__), "ads_admin_page_inc");  

} 

function register_ads_settings() {

	global $QData;
	foreach ($QData['Default'] as $key => $value) {

		register_setting( 'qa-options', $key);

	}			

	foreach ($QData['DefaultAdsName'] as $key => $value) {

		register_setting( 'qa-options', $value);

	}		

}

if(is_admin()) {

	add_action('admin_menu', 'ads_admin_page');
	add_action('admin_init', 'register_ads_settings');

}	

function ads_plugin_links($links,$file) {

	if($file==plugin_basename(__FILE__)) {

		array_unshift($links,'<a href="options-general.php?page='.basename(__FILE__).'">'.__('Setting').'</a>');

	}

	return $links;

}

add_filter('plugin_action_links','ads_plugin_links',10,2);

function plugin_activated() {

	global $QData;
	$isold = get_option('AdsDisp');	
	if ( !$isold  && is_bool($isold) ) {

		foreach ($QData['Default'] as $key => $value) {

			update_option($key , $value);

		}		

		for ($i=1;$i<=$QData['Ads'];$i++) {

			update_option('AdsMargin'.$i, $QData['DefaultAdsOpt']['AdsMargin']);
			update_option('AdsAlign'.$i, $QData['DefaultAdsOpt']['AdsAlign']);

		}		

	}	

}

register_activation_hook( __FILE__, 'plugin_activated' );
$wpvcomp = (bool)(version_compare($wp_version, '3.1', '>='));

function ads_head_java() { 

	global $QData; 
	global $wpvcomp; 
	if (get_option('QckTags')) { ?>
	<script type="text/javascript">
		wpvcomp = <?php echo(($wpvcomp==1)?"true":"false"); ?>;
		edaddID = new Array();
		edaddNm = new Array();
		if(typeof(edButtons)!='undefined') {

			edadd = edButtons.length;	
			var dynads={"all":[

				<?php for ($i=1;$i<=$QData['Ads'];$i++) { if(get_option('AdsCode'.$i)!=''){echo('"1",');}else{echo('"0",');}; } ?>

			"0"]};

			for(i=1;i<=<?php echo($QData['Ads']) ?>;i++) {

				if(dynads.all[i-1]=="1") {

					edButtons[edButtons.length]=new edButton("ads"+i.toString(),"Ads"+i.toString(),"\n<!--Ads"+i.toString()+"-->\n","","",-1);
					edaddID[edaddID.length] = "ads"+i.toString();
					edaddNm[edaddNm.length] = "Ads"+i.toString();

				}	

			}

			<?php if(!get_option('QckRnds')){ ?>

				edButtons[edButtons.length]=new edButton("random_ads","RndAds","\n<!--RndAds-->\n","","",-1);
				edaddID[edaddID.length] = "random_ads";
				edaddNm[edaddNm.length] = "RndAds";



			<?php } ?>	

			<?php if(!get_option('QckOffs')){ ?>

				edButtons[edButtons.length]=new edButton("no_ads","NoAds","\n<!--NoAds-->\n","","",-1);
				edaddID[edaddID.length] = "no_ads";
				edaddNm[edaddNm.length] = "NoAds";
				edButtons[edButtons.length]=new edButton("off_def","OffDef","\n<!--OffDef-->\n","","",-1);	
				edaddID[edaddID.length] = "off_def";
				edaddNm[edaddNm.length] = "OffDef";

			<?php } ?>

		};

		(function(){

			if(typeof(edButtons)!='undefined' && typeof(jQuery)!='undefined' && wpvcomp){

				jQuery(document).ready(function(){

					for(i=0;i<edaddID.length;i++) {

						jQuery("#ed_toolbar").append('<input type="button" value="' + edaddNm[i] +'" id="' + edaddID[i] +'" class="ed_button" onclick="edInsertTag(edCanvas, ' + (edadd+i) + ');" title="' + edaddNm[i] +'" />');

					}

				});

			}

		}());	

	</script> 

	<?php	}

}

if ($wpvcomp) {

	add_action('admin_print_footer_scripts', 'ads_head_java');

}else{

	add_action('admin_head', 'ads_head_java');

}
?>
