<?php

/*
Plugin Name: IntelliAds
Plugin URI: http://alekseyshosting.co.cc/
Descriptiion: IntelliChristian! Ads automatically within seconds. 
Version: 1.1
Author: DJ Alex
Author URI: http://alekseyshoting.co.cc/
*/

 if (!class_exists("oneclickintelliads")) { 
 	class oneclickintelliads { 
 	var $adspacesharing=1; 
 	var $version = "1.0"; 
 	var $postcount = 0; 
 	var $opts; 
 	var $sizes; 
 	var $color;
 	function oneclickintelliads() { 
 		$this->sizes=array(); 
 		$this->sizes[]=array('desc'=>'Leaderboard (728 x 90)', 'text'=>'728 X 90'); 
 		$this->sizes[]=array('desc'=>'Full Banner (468 x 60)', 'text'=>'468 X 60'); 
 		$this->sizes[]=array('desc'=>'Half-Banner (234 x 60)', 'text'=>'234 X 60'); 
 		$this->sizes[]=array('desc'=>'Skyscraper (120 x 600)', 'text'=>'120 X 600'); 
 		$this->sizes[]=array('desc'=>'Wide Skyscraper (160 x 600)', 'text'=>'160 X 600'); 
 		$this->sizes[]=array('desc'=>'Vertical Banner (120 x 240)', 'text'=>'120 X 240'); 
 		$this->sizes[]=array('desc'=>'Button (125 x 125)', 'text'=>'125 X 125'); 
 		$this->sizes[]=array('desc'=>'Small Rectangle (180 x 150)', 'text'=>'180 X 150'); 
 		$this->sizes[]=array('desc'=>'Square Box (250 x 250)', 'text'=>'250 X 250'); 
 		$this->sizes[]=array('desc'=>'Medium Rectangle (300 x 250)', 'text'=>'300 X 250'); 
 		$this->sizes[]=array('desc'=>'Large Rectangle (336 x 280)', 'text'=>'336 X 280 '); 
 		$this->getOpts(); 
 		} 
 	function getOpts() {
 		$this->opts=get_option("oneclickintelliads"); 
 		if (!empty($this->opts)) 
 			{return;} 
 		$this->opts=Array ( 'gen_id' => '', 'gen_channel' => '', 'border' => '', 'bg' => '', 'link' => '', 'text' => '', 'url' => '', 'moreopts' => 0, 'single1' => 1, 'single2' => 1, 'single3' => 1, 'multi1' => 1, 'multi2' => 1, 'multi3' => 1, 'ss1' => '250x250', 'ss2' => '728x90', 'ss3' => '125x125', 'ms1' => '468x60', 'ms2' => '120x600', 'ms3' => '728x90', 'lenForThirdAd' => 2000 ) ; 
 		}
 	function save_opts() {
 		update_option('oneclickadsense',$this->opts); 
 		}  
 	function admin_menu() {
 		 ?>
		<script type="text/javascript">
		function toggleMoreopts() {
			if (!document.getElementById("moreoptscheckbox").checked) jQuery("div#moreopts").hide(100);
			else jQuery("div#moreopts").show(500);
		}	</script>
		<?php if (isset($_POST["oneclickintelliads_update"])) { 
			$this->opts=$_POST['oneclick']; 
			$this->save_opts(); 
			echo '<div id="message" class="updated fade"><p><strong>Options Saved!!</strong></p></div>'; 
			} 
			echo ('<div class="wrap"><h2>IntelliAds'. 
			$this->version.'</h2><p>Insert IntelliChristian! Ads to all of your blog sites automatically. IntelliAds uses optimized sizes and positions for best monetization. For support check the <a href="http://alekseyshosting.co.cc">Plugin Homepage</a>. The most commonly used color codes are provided in the paranthesis. To quickly find other color codes, you can use the "Ad Code Wizard" inside your publisher account at <a href="http://ppc.intellichristian.com">ppc.intellichristian.com</a> </p>'); 
    	?>
    
    	<form name="optionform" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">

	<br>IntelliChristian! Ads Publisher ID: <input name="oneclick[gen_id]" type="text" size="25" value="<?php echo $this->opts['gen_id'];?>">			
	<br><br>Ad Border Color (White is "FFFFFF"): <input name="oneclick[border]" type="text" size="25" value="<?php echo $this->opts['border'];?>">
	<br><br>Ad Background Color (White is "FFFFFF"): <input name="oneclick[bg]" type="text" size="25" value="<?php echo $this->opts['bg'];?>">
	<br><br>Ad Headline Color (Green is "006600"): <input name="oneclick[link]" type="text" size="25" value="<?php echo $this->opts['link'];?>">
	<br><br>Ad Text Body Color (Black is "000000"): <input name="oneclick[text]" type="text" size="25" value="<?php echo $this->opts['text'];?>">
	<br><br>Ad URL Color (Blue is "000099"): <input name="oneclick[url]" type="text" size="25" value="<?php echo $this->opts['url'];?>">
	<br>Use the IntelliChristian! Ads channel number ('1' is for "Christian"): <input name="oneclick[gen_channel]" type="text" size="25" value="<?php echo $this->opts['gen_channel'];?>">


	

			<?php echo ('<br><br><input type="checkbox" name="oneclick[moreopts]" id="moreoptscheckbox" onchange="toggleMoreopts()" value="1" '); 
			if ($this->opts['moreopts']) echo (' checked '); echo ('> OneClick does great work, but I want more control.<br>'); ?>

	 		<div id="moreopts">
	 	
	 		<h4>Ads for single Posts and Pages</h4>
	 		<input type="checkbox" name="oneclick[single1]" <?php if($this->opts['single1']) echo("checked");?>>Show 1st Ad at Top of page on right side of Post with <select name="oneclick[ss1]" size="1"><?php $this->printsizeselect($this->opts['ss1']); ?></select> pixels.
	 		<br><input type="checkbox" name="oneclick[single2]" <?php if($this->opts['single2']) echo("checked");?>>Show 2nd Ad at Bottom of Post with <select name="oneclick[ss2]" size="1"><?php $this->printsizeselect($this->opts['ss2']); ?></select> pixels..
	 	
	 	
	 		<br><input type="checkbox" name="oneclick[single3]" <?php if($this->opts['single3']) echo("checked");?>>Show 3rd Ad in the middle of Post if it is longer than <input name="oneclick[lenForThirdAd]" value="<?php echo $this->opts['lenForThirdAd'];?>"size="5"> characters with <select name="oneclick[ss3]" size="1"><?php $this->printsizeselect($this->opts['ss3']); ?></select> pixels..
	 	
	 		<h4>Ads for multiple Pages (archives, homepage etc.)</h4>
	 		<input type="checkbox" name="oneclick[multi1]" <?php if($this->opts['multi1']) echo("checked");?>>Show 1st Ad with first post of page with <select name="oneclick[ms1]" size="1"><?php $this->printsizeselect($this->opts['ms1']); ?></select> pixels..
	 		<br><input type="checkbox" name="oneclick[multi2]" <?php if($this->opts['multi2']) echo("checked");?>>Show 2nd Ad right of 4th Post with <select name="oneclick[ms2]" size="1"><?php $this->printsizeselect($this->opts['ms2']); ?></select> pixels..
	 	
	 	
	 		<br><input type="checkbox" name="oneclick[multi3]" <?php if($this->opts['multi3']) echo("checked");?>>Show 3rd Ad with 10th post on page with <select name="oneclick[ms3]" size="1"><?php $this->printsizeselect($this->opts['ms3']); ?></select> pixels..
	
		
	 			 	
	 		</div>
	   	 <div class="submit">
        	<input type="submit" name="oneclickintelliads_update" value="<?php _e('Update options'); ?> &raquo;" />
    		</div>
    </form>
  </div>

<script type="text/javascript">toggleMoreopts();</script>

<?php
 } function printsizeselect($act) {
  	foreach($this->sizes as $size) { 
  		echo ('<option value="'.$size['text'].'"'); 
  		if($act==$size['text']) echo(" selected"); 
  		echo('>'.$size['desc'].'</option>'); 
  		} 
  	} 
  function filter_content($content){ 
  	global $id,$user_level; 
  	if (is_single() or is_page()) { 
  		if ($this->opts['single3']) {
  			$a= $this->findNodes($content); 
  			$cnt=round(count($a)/2); 
  			$pos=$a[$cnt-1][1]; 
  				if (strlen($content) > $this->opts['lenForThirdAd']) { 
  				$content= substr_replace($content, $this->build_ad($this->opts['ss3'],"left"), $pos, 0); 
  				} 
  		} 
  		if ($this->opts['single1']) {
  		$content = $this->build_ad($this->opts['ss1'],"right").$content;
  		} 
  		if ($this->opts['single2']) {
  		$content = $content.$this->build_ad($this->opts['ss2'],"center");
  		} return $content; 
  	} 
  	$this->postcount += 1; 
  	if ($this->opts['multi2'] AND $this->postcount == 3) {
  		$content = $this->build_ad($this->opts['ms2'],"right").$content;
  	} 
  	if ($this->opts['multi1'] AND $this->postcount == 1) {
  	$content = $this->build_ad($this->opts['ms1'],"center").$content;
  	} 
  	if ($this->opts['multi3'] AND $this->postcount == 10) {
  	$content = $content.$this->build_ad($this->opts['ms3'],"center");
  	} return $content; 
  } 
  function findNodes($str) {
   $pattern='&\[gallery\]|\<\/p*\>|\<br\>|\<br\s\/\>|\<br\/\>&iU'; 
   return preg_split($pattern, $str, 0, PREG_SPLIT_OFFSET_CAPTURE); 
   } 
   function build_ad($dim, $align="center") {
    global $user_level; 
    $i=$this->opts['gen_id']; 
    $c=$this->opts['gen_channel']; 
    $dims=explode("x",$dim); 
    $width=$dims[0]; 
    $height=$dims[1]; 
    $border=$this->opts['border']; 
    $bg=$this->opts['bg']; 
    $text=$this->opts['text']; 
    $url=$this->opts['url']; 
    $code = '<script type="text/javascript">
    	var server_client_id = "'.$i.'"; 
    	var server_ad_channel ="'.$c.'";
    	var server_publisher_channels = "";
    	var server_media_types = "text,hybrid";
    	var server_integrate_media_types = 0;
    	var server_ad_width = '.$width.'; 
    	var server_ad_height = '.$height.';
	var server_ad_style = "'.$dim.'_as"; 
	var server_code_version = "4";
	var server_ad_color_border = "'.$border.'";
	var server_ad_color_background = "'.$bg.'";
	var server_ad_color_headline = "'.$link.'";
	var server_ad_color_body = "'.$text.'";
	var server_ad_color_url = "'.$url.'"; 
	var server_ad_random = 1;
	</script>
	<script type="text/javascript" src="http://ppc.intellichristian.com/ads/display_ads.php"></script>'; 
	switch ($align) { 
	case "center": 
		$code='<div style="padding:7px; display: block; margin-left: auto; margin-right: auto; text-align: center;">'.$code.'</div>'; 
	break; 
	case "left": 
	$code='<div style="padding:7px; float: left; padding-left: 0px; margin: 3px;">'.$code.'</div>';
	break; 
	case "right": $code='<div style="padding:7px; float: right; padding-right: 0; margin: 3px;">'.$code.'</div>'; 
	break; 
	} 
	return $code; 
} 
function debug() { 
if(!isset($_GET['oneclickdebug'])) return; 
	$this->save_opts(); 
	echo ("<hr><h1> IntelliAds Debugging</h1>"); 
	echo ('<table>'); 
	echo ('<tr><td>Version of Plugin</td><td>'.$this->version.'</td></tr>'); 
	echo ('<tr><td>type of page</td><td>'); 
	if (is_single()) echo ("single."); 
	if (is_page()) echo ("page."); 
	if (is_home()) echo ("home."); 
	if (is_archive()) echo ("archive."); 
	if (is_search()) echo ("search."); 
	if (is_tag()) echo ("tag."); 
	if (is_date()) echo ("date."); 
	if (is_author()) echo ("author."); 
	if (is_category()) echo ("category."); 
	echo ('</td></tr>'); 
	$this->arrayAsTable($this->opts, "setting:"); 
	echo ('</table>'); 
	} 
function arrayAsTable($array, $pre) { 
foreach($array as $key=>$val) { 
	if (is_array($val)) $this->arrayAsTable($val,$pre.$key.":"); 
	else echo ('<tr><td>'.$pre.$key.'</td><td>'.$val.'</td></tr>'); 
	} 
	}  
	} 
	} 
	$oneclickintelliads = new oneclickintelliads(); 
	add_action('shutdown', array($oneclickintelliads, 'debug')); 
	function oneclickintelliads_menu() { global $oneclickintelliads; 
	if (function_exists('add_options_page')) { 
	add_options_page('IntelliAds', 'IntelliAds', 'administrator', __FILE__, array(&$oneclickintelliads, 'admin_menu')); 
	} 
	} if (is_admin()) { 
	add_action('admin_menu', 'oneclickintelliads_menu'); 
	} if (!is_admin()) { 
	add_filter('the_content', array($oneclickintelliads, 'filter_content')); add_filter('the_excerpt', array($oneclickintelliads, 'filter_content')); 
	} ?>
