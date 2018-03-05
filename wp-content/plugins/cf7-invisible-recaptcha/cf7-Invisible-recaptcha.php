<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              
 * @since             1.0.0
 * @package           cf7-Invisible-recaptcha
 *
 * @wordpress-plugin
 * Plugin Name:       CF7 Invisible reCAPTCHA
 * Plugin URI:        https://wordpress.org/plugins/cf7-invisible-recaptcha/
 * Description:       Effective solution that secure your Contact form 7.
 * Version:           1.2.1
 * Author:            Vsourz Digital
 * Author URI:        https://www.vsourz.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cf7-Invisible-recaptcha
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

///// Adding custom menu page
add_action( 'admin_menu' ,'vsz_cf7_invisible_recaptcha',10);

function vsz_cf7_invisible_recaptcha(){
	global $_wp_last_object_menu;

	$_wp_last_object_menu++;
	
	if ( empty( $GLOBALS['admin_page_hooks']['wpcf7'] ) ){
		 add_menu_page( 
			__( 'CF7 Invisible reCAPTCHA', 'textdomain' ),
			'CF7 Invisible reCAPTCHA',
			'manage_options',
			'cf7-Invisible-recaptcha',
			'vsz_cf7_invisible_recaptcha_page',
			'dashicons-admin-site',
			$_wp_last_object_menu
		);
	}else{
		add_submenu_page( 'wpcf7',
			__( 'CF7 Invisible reCAPTCHA', 'textdomain' ),
			'CF7 Invisible reCAPTCHA',
			'manage_options', 'cf7-Invisible-recaptcha',
			'vsz_cf7_invisible_recaptcha_page' );
	}		
}

////// Callback function for custom menu	
function vsz_cf7_invisible_recaptcha_page(){ 
	if(isset($_POST['invisible_recaptcha_nonce']) && !empty($_POST['invisible_recaptcha_nonce']) && wp_verify_nonce($_POST['invisible_recaptcha_nonce'], 'invisible_recaptcha_nonce')){
		if(isset($_POST['enable'])){
			$enable = sanitize_text_field($_POST['enable']);
		}	
		$sitekey = sanitize_text_field($_POST['sitekey']);
		$secretkey = sanitize_text_field($_POST['secretkey']);
		$badge = sanitize_text_field($_POST['badge']);
		$badge_position = sanitize_text_field($_POST['badge_position']);
		$exclude = sanitize_text_field($_POST['exclude']);
		if(isset($sitekey)){
			update_option('invisible_recaptcha_sitekey',$sitekey);
		}
		if(isset($secretkey)){
			update_option('invisible_recaptcha_secretkey',$secretkey);
		}
		if(isset($badge) && !empty($badge)){
			update_option('invisible_recaptcha_badge',$badge);
		}
		if(isset($badge_position) && !empty($badge_position)){
			update_option('invisible_recaptcha_badge_position',$badge_position);
		}
		if(isset($exclude)){
			update_option('invisible_recaptcha_badge_exclude',$exclude);
		}
		if(isset($enable) && !empty($enable)){
			update_option('invisible_recaptcha_enable',$enable);
		}
		else{
			update_option('invisible_recaptcha_enable','0');
		}
		echo '<div class="updated notice notice-success is-dismissible"><p>updated successfully!</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';	

	}
	$enable = get_option('invisible_recaptcha_enable');
	$site_key = get_option('invisible_recaptcha_sitekey');
	$secretkey= get_option('invisible_recaptcha_secretkey');
	$badge = get_option('invisible_recaptcha_badge');
	$badge_position = get_option('invisible_recaptcha_badge_position');
	$exclude = get_option('invisible_recaptcha_badge_exclude');
	?><style>
		#invisible_recaptcha .form-table th{
			width:130px;
		}
		#invisible_recaptcha .vsz_recaptcha_setup_msg .notice {
			 width: 21em;
		}
	</style>
	<div class="wrap" id="invisible_recaptcha">
		<form method="POST" action="">
			<h1 class="cf7-head">CF7 Invisible reCAPTCHA</h1>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="enable" >Enable Protection for Contact Form 7</label></th>
						<td ><input name="enable" id="enable" class="regular-text vsz_captcha_active" type="checkbox" value="1" <?php if(isset($enable) && $enable == 1){ ?>checked <?php } ?> /></td>
					</tr>
					<tr>
						<th scope="row"><label for="sitekey" >Site Key</label></th>
						<td><input name="sitekey" id="sitekey" class="regular-text vsz_captcha_site_key" type="text" value="<?php if(isset($site_key) && !empty($site_key)){ echo $site_key;}?>"></td>
					</tr>
					<tr>
						<th scope="row"><label for="secretkey" >Secret Key</label></th>
						<td><input name="secretkey" id="secretkey" class="regular-text" type="text" value="<?php if(isset($secretkey) && !empty($secretkey)){ echo $secretkey;}?>"></td>
					</tr>
					<tr>
						<th scope="row"><label></label></th>
						<td>
							<div class="vsz_recaptcha_setup">
								<div class="vsz_recaptcha_setup_msg"></div>
								<input type="button" class="button button-primary vsz_recaptcha_test" id="recaptcha-holder-1" value="Validate Credentials"/>
								<p class="spinner" style="float:none;"></p>
							</div>	
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="badge" >Display Badge</th>
						<td>
							<select name="badge" id="badge">
								<option value="yes" <?php if(isset($badge) && $badge== 'yes'){ ?>selected="selected"<?php } ?>>Yes</option>
								<option value="no" <?php if(isset($badge) && $badge== 'no'){ ?>selected="selected"<?php } ?>>No</option>
							</select>
						</td>
					</tr> 
					<tr>
						<th scope="row"><label for="badge-position" >Badge Position</label></th>
						<td>
							<select name="badge_position" id="badge-position">
								<option value="bottomright" <?php if(isset($badge_position) && $badge_position== 'bottomright'){ ?>selected="selected"<?php } ?>>Bottom Right</option>
								<option value="bottomleft" <?php if(isset($badge_position) && $badge_position== 'bottomleft'){ ?>selected="selected"<?php } ?>>Bottom Left</option>
								<option value="inline" <?php if(isset($badge_position) && $badge_position== 'inline'){ ?>selected="selected"<?php } ?>>Inline</option>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="exclude" >Excluded Forms IDs</label></th>
						<td>
							<input name="exclude" id="exclude" class="regular-text" type="text" value="<?php if(isset($exclude) && !empty($exclude)){ echo $exclude;}?>">
							<p class="description">A list of comma separated  Forms IDs which should not be protected by Invisible reCaptcha</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="sitekey"></label></th>
						<td><input type="submit" class="button button-primary vsz_recaptcha_save" value="Save"/></td>
					</tr>
				</tbody>
			</table>
			<input type="hidden" name="invisible_recaptcha_nonce" value="<?php echo wp_create_nonce('invisible_recaptcha_nonce'); ?>"/>
		</form>	
		
	</div>
	
	<script>
		jQuery('document').ready(function(){
			jQuery('.cf7-head').after('<div class="cf7-recaptcha-error"></div>');
			jQuery('.vsz_recaptcha_save').click(function(){
			jQuery('.cf7-recaptcha-error').html('');
				if(jQuery('.vsz_captcha_active').prop("checked") == true){
					
					var checkForm = true;
					if(jQuery("#sitekey").val() == '' ){
						jQuery('.cf7-recaptcha-error').append('<div id="message" class="notice error is-dismissible"><p>Enter Site Key.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>');
						jQuery("#sitekey").css("border","1px solid red");
						checkForm = false;
					}
					else{
						jQuery("#sitekey").css("border","");
					}
					if(jQuery("#secretkey").val() == '' ){
						jQuery('.cf7-recaptcha-error').append('<div id="message" class="notice error is-dismissible"><p>Enter Secret Key.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>');
						jQuery("#secretkey").css("border","1px solid red");
						checkForm = false;
					}
					else{
						jQuery("#secretkey").css("border","");
					}
					if(!checkForm){
						return false;
					}
				}
			});
			jQuery('.vsz_recaptcha_test').click(function(){
				
				jQuery('.vsz_recaptcha_setup_msg').html('');
				jQuery('.vsz_recaptcha_setup div:not(.vsz_recaptcha_setup_msg)').remove();
				var checkForm = true;
					if(jQuery("#sitekey").val() == '' ){
						jQuery('.vsz_recaptcha_setup_msg').append('<div id="message" class="notice error is-dismissible"><p>Enter Site Key.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>');
						
						checkForm = false;
					}
					if(jQuery("#secretkey").val() == '' ){
						jQuery('.vsz_recaptcha_setup_msg').append('<div id="message" class="notice error is-dismissible"><p>Enter Secret Key.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>');
						
						checkForm = false;
					}
					if(checkForm){
						renderGoogleInvisibleRecaptcha();
					}	
				
			});
			jQuery(document).on('click','.notice-dismiss',function(){
					jQuery(this).parent().remove();
				});
		});
		var ajax_nonce = "<?php echo wp_create_nonce( "checksecretkey" );?>";
		var renderGoogleInvisibleRecaptcha = function() {
			jQuery(".spinner").css("visibility","visible");
			var index  = 1;
			var sitekey = jQuery('#sitekey').val();
			var holderId = grecaptcha.render('recaptcha-holder-'+index,{
						'sitekey': sitekey,
						'size': 'invisible',
						'badge' : 'bottomright', // possible values: bottomright, bottomleft, inline
						'callback' : function (recaptchaToken) {
							var test = 1;
							
							jQuery('.vsz_recaptcha_setup_msg').html('<div id="message" class="notice  is-dismissible"><p>Your Site Key is Valid.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>');
							// Call ajax for get contact form messages
							var secretkey = jQuery("#secretkey").val();
							jQuery.ajax({
								url: ajaxurl, 
								type: 'POST',
								data: {
										'token':recaptchaToken,
										'action':"vsz_cf7_secret_key",
										'secretkey' : secretkey,
										'ajax_nonce':ajax_nonce,
										},
								success: function(data){
									jQuery(".spinner").css("visibility","hidden");	
									jQuery('.vsz_recaptcha_setup_msg').append('<div id="message" class="notice  is-dismissible"><p>Your Secret Key is '+data+'.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>');

								}
							});
							grecaptcha.reset(holderId);
							
						},
						'error-callback' : function(){
							jQuery(".spinner").css("visibility","hidden");	
							jQuery('.vsz_recaptcha_setup_msg').html('<div id="message" class="notice  is-dismissible"><p>Your Site Key is Invalid.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>');
						},  
				},false);
					 if(grecaptcha.getResponse(holderId) != ''){
						grecaptcha.reset(holderId);
					}
					else{
						
						// execute the recaptcha challenge
						grecaptcha.execute(holderId);
					}
			}
			
	</script>
	<script  src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>
	<?php
}

//for display invisible recaptcha on contact form
$enable = get_option('invisible_recaptcha_enable');
if(isset($enable) && $enable == 1){
	add_action( 'wp_enqueue_scripts', 'vsz_cf7_invisible_recaptcha_page_scripts' );
}
function vsz_cf7_invisible_recaptcha_page_scripts(){
	$site_key = get_option('invisible_recaptcha_sitekey');
	$secretkey= get_option('invisible_recaptcha_secretkey');
	$badge = get_option('invisible_recaptcha_badge');
	$badge_position = get_option('invisible_recaptcha_badge_position');
	$exclude = get_option('invisible_recaptcha_badge_exclude');
	//get comma separated id
	$exclude = explode(',',$exclude);
	?>
	
	<style>
		.wpcf7-submit{
			display:none;
		}
		.recaptcha-btn{
			display:block;
		}
		<?php 
			if(isset($badge) && $badge== 'no'){ 
				?>.grecaptcha-badge {display: none;} <?php
			}
		?>
		
	</style>
	<script type="text/javascript">
		var contactform = {};
		
		var renderGoogleInvisibleRecaptcha = function() {
			//jQuery(document).ready(function(){
				
				// prevent form submit from enter key
				jQuery("input[name=_wpcf7]").attr("class","formid");
					jQuery('.wpcf7-form').on('keyup keypress', "input", function(e) {
					  var keyCode = e.keyCode || e.which;
					  if (keyCode === 13) { 
						e.preventDefault();
						return false;
					  }
					});
			
				jQuery('.wpcf7-submit').each(function(index){
					
					var checkexclude = 0;
					var form = jQuery(this).closest('.wpcf7-form');
					var value = jQuery(form).find(".formid").val();
					// check form exclude from invisible recaptcha
					<?php 
						if(isset($exclude) && !empty($exclude) && $exclude[0] != ''){
							foreach($exclude as $data){ ?>
								if(value == <?php echo $data;?>){
									checkexclude = 1;
									form.find('.wpcf7-submit').show();
								}
					<?php  }
						 }
					?>
					if(checkexclude == 0){
						var ajax_nonce = "<?php echo wp_create_nonce( "contactformmassage" );?>";
						var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' );?>";
						// Call ajax for get contact form messages
						jQuery.ajax({
							url: ajaxurl, 
							type: 'POST',
							data: {'postId':value,'action':"vsz_cf7_contact_message","ajax_nonce":ajax_nonce},
							success: function(data){
								var contacid = value;
								contactform[contacid] = JSON.parse(data);	
							}
						});
						// Hide the form orig submit button
						form.find('.wpcf7-submit').hide();

						// Fetch class and value of orig submit button
						btnClasses = form.find('.wpcf7-submit').attr('class');
						btnValue = form.find('.wpcf7-submit').attr('value');

						// Add custom button and recaptcha holder
						
						form.find('.wpcf7-submit').after('<input type="button" id="wpcf-custom-btn-'+index+'" class="'+btnClasses+'  recaptcha-btn recaptcha-btn-type-css" value="'+btnValue+'" title="'+btnValue+'" >');
						form.append('<div class="recaptcha-holder" id="recaptcha-holder-'+index+'"></div>');
						// Recaptcha rendenr from here
						var holderId = grecaptcha.render('recaptcha-holder-'+index,{
									'sitekey':'<?php $site_key = get_option('invisible_recaptcha_sitekey'); if(isset($site_key) && !empty($site_key)){ echo $site_key;}?>',
									'size': 'invisible',
									'badge' : '<?php echo $badge_position;?>', // possible values: bottomright, bottomleft, inline
									'callback' : function (recaptchaToken) {
										//console.log(recaptchaToken);
										var response=jQuery('#recaptcha-holder-'+index).find('.g-recaptcha-response').val();
										//console.log(response);
										//Remove old response and store new respone 
										jQuery('#recaptcha-holder-'+index).parent().find(".respose_post").remove();
										jQuery('#recaptcha-holder-'+index).after('<input type="hidden" name="g-recaptcha-response"  value="'+response+'" class="respose_post">')
										grecaptcha.reset(holderId);
										
										if(typeof customCF7Validator !== 'undefined'){
											if(!customCF7Validator(form)){
												return;
											}
										}
										// Call default Validator function
										else if(contactFormDefaultValidator(form)){
											return;
										}
										else{
											// hide the custom button and show orig submit button again and submit the form
											jQuery('#wpcf-custom-btn-'+index).hide();
											form.find('input[type=submit]').show();
											form.find("input[type=submit]").click();
											form.find('input[type=submit]').hide();
											jQuery('#wpcf-custom-btn-'+index).attr('style','');
										}
									}
							},false);
							
						// action call when click on custom button
						jQuery('#wpcf-custom-btn-'+index).click(function(event){
							event.preventDefault();
							// Call custom validator function
							if(typeof customCF7Validator == 'function'){
								if(!customCF7Validator(form)){
									return false;
								}
							}
							// Call default Validator function
							else if(contactFormDefaultValidator(form)){
								return false;
							}
							else if(grecaptcha.getResponse(holderId) != ''){
								grecaptcha.reset(holderId);
							}
							else{
								// execute the recaptcha challenge
								grecaptcha.execute(holderId);
							}
						});
					}
					
				});
			//});		
				
		};
		// Default validator function
		function contactFormDefaultValidator(objForm){
			var formid=jQuery(objForm).find(".formid").val();
			var havingError = false;
			// Fetch each validation field one by one
			objForm.find('.wpcf7-validates-as-required').each(function(){
				jQuery(this).parent().find('.wpcf7-not-valid-tip').remove();
				// Check if empty or checkbox checked or not
				if(!jQuery(this).hasClass('wpcf7-checkbox')){
					if(!jQuery(this).val()){
						jQuery(this).val('');
						jQuery(this).parent().find('.wpcf7-not-valid-tip').remove();
						jQuery(this).after('<span class="wpcf7-not-valid-tip" role="alert">'+contactform[formid]['invalid_required']+'</span>');
						havingError = true;
					}
					// Check if not valid email address entered
					else{			
						if(jQuery(this).attr('class').indexOf("wpcf7-validates-as-email") >= 0){
							var emailField = jQuery(this).val();
							if(!validateCustomFormEmail(emailField)){
								jQuery(this).parent().find('.wpcf7-not-valid-tip').remove();
								jQuery(this).after('<span role="alert" class="wpcf7-not-valid-tip">'+contactform[formid]['invalid_email']+'</span>');
								havingError = true;
							}
						}
						// Check if not valid url entered
						else if(jQuery(this).attr('class').indexOf("wpcf7-validates-as-url") >= 0){
							var urlField = jQuery(this).val();
							if(!validateCustomFormurl(urlField)){
								jQuery(this).parent().find('.wpcf7-not-valid-tip').remove();
								jQuery(this).after('<span role="alert" class="wpcf7-not-valid-tip">'+contactform[formid]['invalid_url']+'</span>');
								havingError = true;
							}
						}
						// Check if not valid telephone entered
						else if(jQuery(this).attr('class').indexOf("wpcf7-validates-as-tel") >= 0){
							var telField = jQuery(this).val();
							if(!validateCustomFormtel(telField)){
								jQuery(this).parent().find('.wpcf7-not-valid-tip').remove();
								jQuery(this).after('<span role="alert" class="wpcf7-not-valid-tip">'+contactform[formid]['invalid_tel']+'</span>');
								havingError = true;
							}
						}
						// Check if not valid number entered
						else if(jQuery(this).attr('class').indexOf("wpcf7-validates-as-number") >= 0){
							var numField = jQuery(this).val();
							var min = jQuery(this).attr('min');
							var max = jQuery(this).attr('max');
							var testnum = validateCustomFormnum(numField,min,max);
							if(testnum != 0){
								jQuery(this).parent().find('.wpcf7-not-valid-tip').remove();
								if(testnum ==1){
									jQuery(this).after('<span role="alert" class="wpcf7-not-valid-tip">'+contactform[formid]['invalid_number']+'</span>');
								}
								if(testnum ==2){
									jQuery(this).after('<span role="alert" class="wpcf7-not-valid-tip">'+contactform[formid]['invalid_too_long']+'</span>');
								}
								if(testnum ==3){
									jQuery(this).after('<span role="alert" class="wpcf7-not-valid-tip">'+contactform[formid]['invalid_too_short']+'</span>');
								}
								havingError = true;
							}
						}
						// Check if not valid date entered
						else if(jQuery(this).attr('class').indexOf("wpcf7-validates-as-date") >= 0){
							var date = jQuery(this).val();
							if(!validateCustomFordate(date)){
								jQuery(this).parent().find('.wpcf7-not-valid-tip').remove();
								jQuery(this).after('<span role="alert" class="wpcf7-not-valid-tip">'+contactform[formid]['invalid_date']+'</span>');
								havingError = true;
							}
						}
					}
				}
				else{
					var checkselected = 0; 
					jQuery(this).find('input').each(function(){
						if(jQuery(this).prop('checked') == true){
							checkselected++;
						}
					});
					if(checkselected == 0){
						jQuery(this).parent().find('.wpcf7-not-valid-tip').remove();
						jQuery(this).after('<span class="wpcf7-not-valid-tip" role="alert">'+contactform[formid]['invalid_required']+'</span>');
						havingError = true;
					}
				}
			});
			//for acceptance validation 
			if(jQuery(objForm).find('.wpcf7-acceptance').length > 0){
				if(jQuery(objForm).find('.wpcf7-acceptance').hasClass('wpcf7-invert')){
					if(jQuery(objForm).find('.wpcf7-acceptance').prop('checked') == true){
						jQuery(objForm).find('.wpcf7-acceptance').parent().find('.wpcf7-not-valid-tip').remove();
						jQuery(objForm).find('.wpcf7-acceptance').after('<span class="wpcf7-not-valid-tip" role="alert">'+contactform[formid]['accept_terms']+'</span>');
						havingError = true;
					}
					else{
						jQuery(objForm).find('.wpcf7-acceptance').parent().find('.wpcf7-not-valid-tip').remove();
					}
				}
				else{
					if(jQuery(objForm).find('.wpcf7-acceptance').prop('checked') == false){
						jQuery(objForm).find('.wpcf7-acceptance').parent().find('.wpcf7-not-valid-tip').remove();
						jQuery(objForm).find('.wpcf7-acceptance').after('<span class="wpcf7-not-valid-tip" role="alert">'+contactform[formid]['accept_terms']+'</span>');
						havingError = true;
					}
					else{
						jQuery(objForm).find('.wpcf7-acceptance').parent().find('.wpcf7-not-valid-tip').remove();
					}
				}
			}		
		
			return havingError;
		}
		//email validation function
		function validateCustomFormEmail(email) {
			var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,10}|[0-9]{1,3})(\]?)$/;
			return expr.test(email);
		}
		//url validation function
		function validateCustomFormurl(url) {
			if(url){
				return true;		
			}
			else{
				return false;
			}
		}
		//telephone validation function
		function validateCustomFormtel(number){
			var phoneno = /[a-zA-Z]/;  
			if(number.match(phoneno)) {  
				return false;  
			}  
			else {  
				return true;  
			}  
		}
		//number filed validation function
		function validateCustomFormnum(number,min,max){
			if (isNaN(number) ) {
				return 1;
			}
			else {
				if(min){
					if(number < min){
						return 3;
					}				
				}
				if(max){
					if(number > max){
						return 2;
					}				
				}
				return 0;
			}
		}
		//date filed validation function
		function validateCustomFordate(input) {
			var status = false;
			if (!input || input.length <= 0) {
			  status = false;
			} 
			else {
			  var result = new Date(input);
			  if (result == 'Invalid Date') {
				status = false;
			  } 
			  else {
				status = true;
			  }
			}
			return status;		
		}
		
	</script>
	<script  src="https://www.google.com/recaptcha/api.js?onload=renderGoogleInvisibleRecaptcha&render=explicit" async defer></script><?php
}
//contact form submit time varify secret key
add_action( 'wpcf7_submit', 'vsz_cf7_action_wpcf7_submit', 10, 100 ); 
function vsz_cf7_action_wpcf7_submit($data){
	if(isset($_POST["g-recaptcha-response"])){
	$secret= get_option('invisible_recaptcha_secretkey');
	$remoteip = $_SERVER["REMOTE_ADDR"];
    $response = sanitize_text_field($_POST["g-recaptcha-response"]);
    $into = sanitize_text_field($_POST["_wpcf7_unit_tag"]);
     if(isset($response)){
        $recaptcha = wp_remote_retrieve_body(wp_remote_get( add_query_arg( array(
			'secret'   => $secret,
			'response' => $response,
			'remoteip' => $remoteip
		), 'https://www.google.com/recaptcha/api/siteverify' ) ));
		//varify response
        $recaptcha = json_decode($recaptcha,'array');
        if (!isset($recaptcha["success"]) || empty($recaptcha["success"]))
        {
			$errormsg = json_encode(array("into"=>"#".$into,"status"=>"validation_failed","message"=>"There was an error trying to send your message. Please try again later."));
			echo $errormsg;
			exit;
		}
	}	
	}
}

//for getting contact form error messages
add_action('wp_ajax_vsz_cf7_contact_message','vsz_cf7_contact_message');
add_action('wp_ajax_nopriv_vsz_cf7_contact_message','vsz_cf7_contact_message');
function vsz_cf7_contact_message(){
	if(isset($_POST['ajax_nonce']) && !empty($_POST['ajax_nonce'])){
		////// checking for nonce
		if( ! wp_verify_nonce($_POST['ajax_nonce'], 'contactformmassage')){
			wp_die("You don't have permission to view this page");
			exit;
		}
		//contact form id
		$post_id = sanitize_text_field($_POST['postId']);
		$postId = isset($post_id) ? $post_id : '';
		$message = get_post_meta($postId,'_messages',true);
		// get all message of contact form
		$message= json_encode($message);
		echo $message;
	}
	exit;
}
// Check user secret key
add_action('wp_ajax_vsz_cf7_secret_key','vsz_cf7_vsz_cf7_secret_key_callback');
add_action('wp_ajax_nopriv_vsz_cf7_secret_key','vsz_cf7_vsz_cf7_secret_key_callback');
function vsz_cf7_vsz_cf7_secret_key_callback(){
	
	if(isset($_POST['ajax_nonce']) && !empty($_POST['ajax_nonce'])){
		////// checking for nonce
		if( ! wp_verify_nonce($_POST['ajax_nonce'], 'checksecretkey')){
			
			wp_die("You don't have permission to view this page");
			exit;
		}
		if(isset($_POST["token"]) && !empty($_POST["token"]) && isset($_POST["secretkey"]) && !empty($_POST["secretkey"])){
			$secret= sanitize_text_field($_POST["secretkey"]);
			$remoteip = $_SERVER["REMOTE_ADDR"];
			$response = sanitize_text_field($_POST["token"]);
			if(isset($response)){
				$recaptcha = wp_remote_retrieve_body(wp_remote_get( add_query_arg( array(
					'secret'   => $secret,
					'response' => $response,
					'remoteip' => $remoteip
				), 'https://www.google.com/recaptcha/api/siteverify' ) ));
				//varify response
				$recaptcha = json_decode($recaptcha,'array');
				if (!isset($recaptcha["success"]) || empty($recaptcha["success"]))
				{
					echo "Invalid";
					exit;
				}else{
					echo "Valid";
					exit;
				}
			}	
		}
	}	
}
