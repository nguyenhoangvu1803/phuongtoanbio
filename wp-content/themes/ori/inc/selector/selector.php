<?php 
function zo_presets_selector_scripts(){

	wp_enqueue_script('zo-jquery-cookie', get_template_directory_uri()  . '/inc/selector/js/jquery_cookie.min.js', array( 'jquery' ), '1.4.0', true);
	wp_localize_script('zo-jquery-cookie', 'ZOPreset', array('theme_url' => get_template_directory_uri()) );
	wp_enqueue_script('zo-selector-script', get_template_directory_uri() . '/inc/selector/js/presets.js', array( 'jquery' ), '1.4.0', true);
	wp_enqueue_style('zo-selector-style', get_template_directory_uri() . '/inc/selector/css/presets.css');
}
add_action( 'wp_enqueue_scripts', 'zo_presets_selector_scripts' );

function zo_presets_selector() {
	global $smof_data, $zo_meta;
	
	$presets_color = $smof_data['presets_color'];
	if(isset($zo_meta->_zo_presets_color) && $zo_meta->_zo_presets_color){
		$presets_color = $zo_meta->_zo_presets_color;
	}
	$body_layout = $smof_data['body_layout'];
	if (isset($_COOKIE['body_layout'])) {
		$body_layout = $_COOKIE['body_layout'];
	}
	$arr_color = array(
		'0' => '#e03e25', '1' => '#0a9fd8', '2' => '#a57b4a', '3' => '#2997ab', '4' => '#0bb586', '5' => '#0f997e', '6' => '#38cbcb', '7' => '#f1505b', '8' => '#8d57d1', '9' => '#ee3733', '10' => '#f8ba01', '11' => '#f07677', '12' => '#034cb3', '13' => '#1e90ff'
	);
?>
<div id="style_selector">
	<div class="style-toggle close" style="background: <?php echo esc_attr($arr_color[$presets_color]);?>;"><i class="fa fa-2x fa-spin fa-cog"></i></div>
	<div id="style_selector_container">
        <div class="box-title"><?php esc_html_e('Predefined Color Schemes', 'ori'); ?></div>
        <div class="predefined">
            <a href="javascript:void(0);" class="preset0 <?php echo ($presets_color=='0')?'active':'';?>" id="0" data-color="#e03e25"></a>								
            <a href="javascript:void(0);" class="preset1 <?php echo ($presets_color=='1')?'active':'';?>" id="1" data-color="#0a9fd8"></a>								
            <a href="javascript:void(0);" class="preset2 <?php echo ($presets_color=='2')?'active':'';?>" id="2" data-color="#a57b4a"></a>								
            <a href="javascript:void(0);" class="preset3 <?php echo ($presets_color=='3')?'active':'';?>" id="3" data-color="#2997ab"></a>									
            <a href="javascript:void(0);" class="preset4 <?php echo ($presets_color=='4')?'active':'';?>" id="4" data-color="#0bb586"></a>									
            <a href="javascript:void(0);" class="preset5 <?php echo ($presets_color=='5')?'active':'';?>" id="5" data-color="#0f997e"></a>									
            <a href="javascript:void(0);" class="preset6 <?php echo ($presets_color=='6')?'active':'';?>" id="6" data-color="#38cbcb"></a>									
            <a href="javascript:void(0);" class="preset7 <?php echo ($presets_color=='7')?'active':'';?>" id="7" data-color="#f1505b"></a>									
            <a href="javascript:void(0);" class="preset8 <?php echo ($presets_color=='8')?'active':'';?>" id="8" data-color="#8d57d1"></a>									
            <a href="javascript:void(0);" class="preset9 <?php echo ($presets_color=='9')?'active':'';?>" id="9" data-color="#ee3733"></a>									
            <a href="javascript:void(0);" class="preset10 <?php echo ($presets_color=='10')?'active':'';?>" id="10" data-color="#f8ba01"></a>					
            <a href="javascript:void(0);" class="preset11 <?php echo ($presets_color=='11')?'active':'';?>" id="11" data-color="#f07677"></a>					
            <a href="javascript:void(0);" class="preset12 <?php echo ($presets_color=='12')?'active':'';?>" id="12" data-color="#034cb3"></a>					
            <a href="javascript:void(0);" class="preset13 <?php echo ($presets_color=='13')?'active':'';?>" id="13" data-color="#1e90ff"></a>					
        </div>
	    <div class="box-title"><?php esc_html_e('Choose Your Layout Style', 'ori'); ?></div>
	    <div class="input-box">
		    <div class="input">
			    <select name="layout" class="layout">
				    <option value="0" <?php if( $body_layout == 0 ) echo "selected"; ?>><?php esc_html_e('Wide', 'ori'); ?></option>
				    <option  value="1" <?php if( $body_layout == 1 ) echo "selected"; ?>><?php esc_html_e('Boxed', 'ori'); ?></option>
			    </select>
		    </div>
	    </div>
		<div class="box-title"><?php esc_html_e('BG Patterns for Boxed', 'ori'); ?></div>
		<div class="pattern">
			<a href="javascript:void(0);" class="pattern0 active" data-id="1"></a>								
			<a href="javascript:void(0);" class="pattern1" data-id="2"></a>								
			<a href="javascript:void(0);" class="pattern2" data-id="3"></a>								
			<a href="javascript:void(0);" class="pattern3" data-id="4"></a>								
			<a href="javascript:void(0);" class="pattern4" data-id="5"></a>								
			<a href="javascript:void(0);" class="pattern5" data-id="6"></a>								
			<a href="javascript:void(0);" class="pattern6" data-id="7"></a>								
			<a href="javascript:void(0);" class="pattern7" data-id="8"></a>								
			<a href="javascript:void(0);" class="pattern8" data-id="9"></a>								
			<a href="javascript:void(0);" class="pattern9" data-id="10"></a>								
			<a href="javascript:void(0);" class="pattern10" data-id="11"></a>								
			<a href="javascript:void(0);" class="pattern11" data-id="12"></a>								
			<a href="javascript:void(0);" class="pattern12" data-id="13"></a>								
			<a href="javascript:void(0);" class="pattern13" data-id="14"></a>								
			<a href="javascript:void(0);" class="pattern14" data-id="15"></a>								
			<a href="javascript:void(0);" class="pattern15" data-id="16"></a>
            <!--
			<a href="javascript:void(0);" class="pattern16" data-id="17"></a>								
			<a href="javascript:void(0);" class="pattern17" data-id="18"></a>								
			<a href="javascript:void(0);" class="pattern18" data-id="19"></a>								
			<a href="javascript:void(0);" class="pattern19" data-id="20"></a>								
			<a href="javascript:void(0);" class="pattern20" data-id="21"></a>								
			<a href="javascript:void(0);" class="pattern21" data-id="22"></a>								
			<a href="javascript:void(0);" class="pattern22" data-id="23"></a>								
			<a href="javascript:void(0);" class="pattern23" data-id="24"></a>-->
		</div>
		<div class="box-title"><?php esc_html_e('Created With ORI Demo', 'ori'); ?></div>
		<span><?php esc_html_e('Here are a few included examples that can be installed with one click.', 'ori'); ?>
        <a href="https://www.youtube.com/watch?v=SZFSS0_CITM" target="_blank"><?php esc_html_e('Video tutorial', 'ori'); ?></a>
        </span>
		<a class="ori-demo" href="http://demo.cms-theme.net/wordpress/ori-app" target="_blank">
			<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/selector/images/demo/ori-demo-app.jpg');?>" alt="<?php esc_html_e('Demo Ori App', 'ori');?>"/>
			<div class="demo-overlay">ORI - APP LANDING</div>
		</a>
		<a class="ori-demo" href="http://demo.cms-theme.net/wordpress/ori-spa" target="_blank">
			<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/selector/images/demo/ori-demo-spa.jpg');?>" alt="<?php esc_html_e('Demo Ori Spa', 'ori');?>"/>
			<div class="demo-overlay">ORI - BEAUTY & SPA</div>
		</a>
    </div>
</div>
<?php 
}
?>
