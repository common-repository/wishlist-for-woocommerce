<?php
/**
* Plugin Name: WishList For WooCommerce

* Plugin URI: https://www.phoeniixx.com/product/wishlist-for-woocommerce/

* Description: By adding Wishlist feature to your ecommerce site, you could let your customers save the items that they would like to purchase, but in future. This helps them in keeping track of items they desire to buy. The Wishlist Plugin also lets your customers share their Wishlist with friends through various social media platforms (Facebook, Pinterest, Google+ and/or Twitter).

* Version: 1.4.7

* Text Domain: pwlp

* Domain Path: /i18n/languages/

* Author: phoeniixx

* Author URI: http://www.phoeniixx.com/

* License: GPL2

* WC requires at least: 2.6.0

* WC tested up to: 3.8.0
*/ 


if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    // Put your plugin code here
	include(dirname(__FILE__).'/libs/execute-libs.php');
	
	require_once(ABSPATH . 'wp-settings.php');

	ob_start();
	
	if(!isset($_SESSION)){
		session_start();
	} 
	
	require_once('wishlist_settings.php');
	
	require_once('wishlist_short_code.php');
	
	function pwlp_add_to_cart_after() {
		
		$pwlp_genral_dataa=get_option('data_wishlist_genral');
		
		$pwlp_share_dataa=get_option('data_share_wishlist');
		
		$pwlp_style_dataa=get_option('data_style_wishlist');
		
		if(isset($pwlp_genral_dataa) && !empty($pwlp_genral_dataa) && isset($pwlp_share_dataa)&& !empty($pwlp_share_dataa)&& isset($pwlp_style_dataa) && !empty($pwlp_style_dataa)){
				
			extract($pwlp_genral_dataa);
			
			extract($pwlp_share_dataa);
			
			extract($pwlp_style_dataa);
		}
		
	}

	add_action('woocommerce_after_cart_table', 'pwlp_add_to_cart_after');
	
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
	$pwlp_genral_dataa=get_option('data_wishlist_genral');
		
	$pwlp_share_dataa=get_option('data_share_wishlist');
	
	$pwlp_style_dataa=get_option('data_style_wishlist');
	
	if(isset($pwlp_genral_dataa) && !empty($pwlp_genral_dataa) && isset($pwlp_share_dataa) && !empty($pwlp_share_dataa)&& isset($pwlp_style_dataa) && !empty($pwlp_style_dataa)){
			
		extract($pwlp_genral_dataa);
		
		extract($pwlp_share_dataa);
		
		extract($pwlp_style_dataa);
	}	
	
	add_action('admin_menu', 'pwlp_wishlist_tab');

		function pwlp_wishlist_tab(){
			
			$page_title="WishList";
			
			$menu_title="WishList";
			
			$capability="manage_options";
			
			$menu_slug="pwlp-wishlist-manager";
			
			$plugin_dir_url =  plugin_dir_url( __FILE__ );
			
			add_menu_page( 'phoeniixx', __( 'Phoeniixx', 'phe' ), 'nosuchcapability', 'phoeniixx', NULL, $plugin_dir_url.'/images/logo-wp.png', 57 );
			
			add_submenu_page( 'phoeniixx', $page_title, $menu_title, $capability, $menu_slug ,'wishlist_settings');

		}
	
	add_action('wp_head', 'pwlp_assets_file');
	
		function pwlp_assets_file() {
			
			
			wp_enqueue_script("pwlp-share-js", plugin_dir_url( __FILE__ )."js/pwlp_jqSocialSharer.min.js",array('jquery'),'',true);
			
			wp_enqueue_script( 'wishlist-ajax-request', plugin_dir_url( __FILE__ ) . 'js/pwlp_front_end_custom.js', array( 'jquery' ) );	
		
			wp_localize_script( 'wishlist-ajax-request', 'WishListAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		
			wp_enqueue_style( 'pwlp-custom-css', plugin_dir_url( __FILE__ ).'css/pwlp_custom_css.css' );
			
			$pwlp_genral_dataaa=get_option('data_wishlist_genral');
		
			$pwlp_share_dataaa=get_option('data_share_wishlist');
			
			$pwlp_style_dataaa=get_option('data_style_wishlist');
			
			if(isset($pwlp_genral_dataaa) && !empty($pwlp_genral_dataaa) && isset($pwlp_share_dataaa) && !empty($pwlp_share_dataaa) && isset($pwlp_style_dataaa) && !empty($pwlp_style_dataaa)){
					
				extract($pwlp_genral_dataaa);
				
				extract($pwlp_share_dataaa);
				
				extract($pwlp_style_dataaa);
			}	
			?>
			<style>
			.pwlp_product {
				color:<?php echo (isset($add_wl_txt_clr)&& !empty($add_wl_txt_clr))?$add_wl_txt_clr:'#F3C589'  ?>!important;
			}
			.see_wish{
				color:<?php echo (isset($see_wl_txt_clr)&& !empty($see_wl_txt_clr))?$see_wl_txt_clr:'#F3C589' ?>!important;
			}
			.already_meg{
				color:<?php echo (isset($msg_color)&& !empty($msg_color))?$msg_color:'#141412' ?>!important;
			}
			.pr_added{
				color:<?php echo (isset($pr_add_txtcolor)&& !empty($pr_add_txtcolor))?$pr_add_txtcolor:'#141412' ?>!important;
			}
			</style>
			<script>
				var text_btn="<?php echo (isset($added_text)&&($added_text!=''))?$added_text:'Added'; ?>";
				var see_btn="<?php echo (isset($wl_see_text)&&($wl_see_text!=''))?$wl_see_text:'See WishList'; ?>";
				var whislist_page_name = "<?php echo $ptitle = get_the_title($wishlist_page);?>";
				
			</script>
			
			<?php 
			if(is_user_logged_in()){
				
				
				$pwllp_user_ID = get_current_user_id();
				
				if(isset($_SESSION['wishlists'])){
					$wishList_data=$_SESSION['wishlists'];
					update_user_meta($pwllp_user_ID,'_pwlp_wishlistf',$wishList_data);
				}
				
				$wishList_data=get_user_meta($pwllp_user_ID,'_pwlp_wishlistf');
				
				if(!empty($wishList_data)){
					
					$_SESSION['wishlists']=$wishList_data[0];
					
				}else{
					
					$wishList_data=$_SESSION['wishlists'][0];
					update_user_meta($pwllp_user_ID,'_pwlp_wishlistf',$wishList_data);
				}
				
			}
		}
	
	add_filter( 'woocommerce_add_to_cart_redirect', 'pwlpp_wc_custom_cart_redirect' );
	function pwlpp_wc_custom_cart_redirect() {
		
		$pwlp_genral_dataa=get_option('data_wishlist_genral');
		
		if(!empty($pwlp_genral_dataa)){
			extract($pwlp_genral_dataa);
		}	
		
		if($add_to_cart_red == 1){
			return 'http://'. $_SERVER['HTTP_HOST'] ."/cart/" ;
		}else{
			return 'http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REDIRECT_URL'];
		}
			
	}

	
	add_action( 'woocommerce_add_to_cart','pwlp_remove_from_wishlist_after_add_to_cart' );
	function pwlp_remove_from_wishlist_after_add_to_cart() {
		
		$pwlp_genral_dataa=get_option('data_wishlist_genral');
		
		if(!empty($pwlp_genral_dataa)){
			extract($pwlp_genral_dataa);
		}
		
		if( $rem_wl == 1 ){
			if( isset( $_REQUEST['pwlp_remove_id'] ) ) {
				
				$prod_id = $_REQUEST['pwlp_remove_id'];
				$wishlist_data = $_SESSION['wishlists'];
				
				foreach ($wishlist_data as $key => $value){
					
					if ($key == $prod_id) {
						
						unset($wishlist_data[$key]);
						
						$_SESSION['wishlists'] = $wishlist_data;
						
						if(is_user_logged_in()){

							$pwlp_user_ID = get_current_user_id();
						
							update_user_meta($pwlp_user_ID, '_pwlp_wishlistf', $wishlist_data);
						}
					} 
				}
			}
		}
	}
	
	add_action('admin_head','pwlp_add_admin_assests');

		function pwlp_add_admin_assests(){
				
				wp_enqueue_script('wp-color-picker'); 
				
				wp_enqueue_style('wp-color-picker');
				
				wp_enqueue_style( 'pwlp-custom-css', plugin_dir_url( __FILE__ ).'css/pwlp_custom_css.css' );
				
				wp_enqueue_script("pwlp-custom-js", plugin_dir_url( __FILE__ )."js/pwlp_custom.js",array('jquery'),'',true);
				
				wp_enqueue_script("pwlp-selct-js","http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js" ,array('jquery'),'',true);
				
				wp_enqueue_style( 'pwlp-select-css', 'http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css' );
				
				?>
				<script>
				var whislist_title="<?php echo 'My wishlist on '.get_bloginfo('name');?>";
				</script>
				<?php 
			}
		
		add_action( 'wp_ajax_pwlp_data_retrive', 'pwlp_data_retrive' );

		add_action( 'wp_ajax_nopriv_pwlp_data_retrive', 'pwlp_data_retrive' );	
		
			function pwlp_data_retrive(){
			
					if(isset($_POST['pwlprod_id'])){
						
						if(isset($_SESSION['wishlists'])){
							
							$wishlist_data=$_SESSION['wishlists'];
							
							$wl_product_id=$_POST['pwlprod_id'];
							
							if(!array_key_exists($wl_product_id,$wishlist_data)){
								
								$wishlist_item_time = date_i18n('j F Y', time());
								
								$wishlist_data[$wl_product_id]=$wishlist_item_time;
								
								$_SESSION['wishlists'] = $wishlist_data;
								
								if(is_user_logged_in()){
					
									$pwlp_user_ID = get_current_user_id();
								
									update_user_meta($pwlp_user_ID, '_pwlp_wishlistf', $wishlist_data);
								} 
							}
						}else{
							
							$_SESSION['wishlists']=array();
							if(isset($_SESSION['wishlists'])){
								$wishlist_data=$_SESSION['wishlists'];
								
								$wl_product_id=$_POST['pwlprod_id'];
								
								if(!array_key_exists($wl_product_id,$wishlist_data)){
									
									$wishlist_item_time = date_i18n('j F Y', time());
								
									$wishlist_data[$wl_product_id]=$wishlist_item_time;
									
									$_SESSION['wishlists'] = $wishlist_data;
									
									if(is_user_logged_in()){
					
										$pwlp_user_ID = get_current_user_id();
									
										update_user_meta($pwlp_user_ID, '_pwlp_wishlistf', $wishlist_data);
									}
									
								} 
							}
						} 
					
					}
					
					die();
				}
	add_action( 'wp_ajax_pwlp_data_remove', 'pwlp_data_remove' );

	add_action( 'wp_ajax_nopriv_pwlp_data_remove', 'pwlp_data_remove' );

	function pwlp_data_remove(){
		
			if(isset($_POST['pwlpremove_id'])){
						
						if(isset($_SESSION['wishlists'])){
							$wishlist_data=$_SESSION['wishlists'];
							
							$wl_remove_id=$_POST['pwlpremove_id'];
							
							 foreach ($wishlist_data as $key => $value){
								
								if ($key == $wl_remove_id) {
									unset($wishlist_data[$key]);
									$_SESSION['wishlists'] = $wishlist_data;
									
									if(is_user_logged_in()){
					
										$pwlp_user_ID = get_current_user_id();
									
										update_user_meta($pwlp_user_ID, '_pwlp_wishlistf', $wishlist_data);
									}
								} 
							}
							echo $wl_remove_id;
						}
					}
				
		die();
	}
	
	
	register_activation_hook( __FILE__, 'pwlp_plugin_activate' );
	function pwlp_plugin_activate(){
		
		$pwlp_gena_data=get_option('data_wishlist_genral');
		if(empty($pwlp_gena_data)){
			$pwlp_genral_data=array('is_enable'=>1);
			update_option('data_wishlist_genral',$pwlp_genral_data);
		}
		$pwlp_shr_data=get_option('data_share_wishlist');
		if(empty($pwlp_shr_data)){
			
			$pwlp_shr_data=array('share_fb'=>1,'share_gp'=>1,
									'share_pin'=>1,'share_twt'=>1,'tit_social_net'=>'Share On:',
									'pwlp_msg_text'=>'',
								);
			update_option('data_share_wishlist',$pwlp_shr_data);
		}
		
		$pwlp_style_dataa=get_option('data_style_wishlist');
		
		if(empty($pwlp_style_dataa)){	
			$pwlp_style_data=array(
								'add_wl_txt_clr'=>'#F3C589',
								'see_wl_txt_clr'=>'#F3C589',
								'pr_add_txtcolor'=>'#141412',
								'msg_color'=>'#141412',
								'title_wi_page_col'=>'#141412',
							);
			
					
			update_option('data_style_wishlist',$pwlp_style_data);
		}
		
	}

	
	function clear_wishlist_session() {
		session_unset();
	}
	add_action('wp_logout', 'clear_wishlist_session');
	//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	//add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt',35);
	add_action( 'woocommerce_single_product_summary', 'additional_text', 35);

	function additional_text() {
		
		global  $post;
		
		$pwlp_genral_dataaa=get_option('data_wishlist_genral');
	
		$pwlp_share_dataaa=get_option('data_share_wishlist');
		
		$pwlp_style_dataaa=get_option('data_style_wishlist');
		
		if(isset($pwlp_genral_dataaa)&& !empty($pwlp_genral_dataaa)|| isset($pwlp_share_dataaa)&& !empty($pwlp_share_dataaa)||isset($pwlp_style_dataaa)&& !empty($pwlp_style_dataaa)){
			
			extract($pwlp_genral_dataaa);
			
			extract($pwlp_share_dataaa);
			
			extract($pwlp_style_dataaa);
			
		}
		
			$pwlp_change=isset($_SESSION['wishlists'])?$_SESSION['wishlists']:'';
			
			$pro_id= $post->ID;
			
			$ptitle = get_page_link($wishlist_page);
	
		if($pwlp_change!='')
		{
	
			if(array_key_exists($pro_id,$pwlp_change)){
				if(!empty( $msg_alredy)){$msg_alredy;}else{$msg_alredy="The product is already in the wishlist!";}
				echo "<br><span class='already_meg'>".$msg_alredy."</span> <br>";
				if(!empty( $wl_see_text)){$wl_see_text;}else{$wl_see_text="See WishList";}
				echo "<a href='".$ptitle."' target='_blank' class='see_wish'>".$wl_see_text."</a>";
			}else{
			?>
					<a class="pwlp_product "  id="pwlp_<?php echo  $pro_id ;?>" data-product-id="<?php echo $pro_id ;?>" href="javascript:void(0)"><?php if(isset($wl_text_poduct_page)){ echo ($wl_text_poduct_page!='')?$wl_text_poduct_page:'Add to Wishlist' ;}else{ echo 'Add to Wishlist';}?></a>
			
		<?php }
			 
		}else{
			?>
					<a class="pwlp_product "  id="pwlp_<?php echo  $pro_id ;?>" data-product-id="<?php echo $pro_id ;?>" href="javascript:void(0)"><?php if(isset($wl_text_poduct_page)){ echo ($wl_text_poduct_page!='')?$wl_text_poduct_page:'Add to Wishlist' ;}else{ echo 'Add to Wishlist';}?></a>
			
		<?php
		}
	} 

//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 35);

//add_action( 'woocommerce_single_product_summary', 'additional_text', 35);	
	
	
	//add_action('woocommerce_single_product_summary','pwlp_product_display',35);

		/* function additional_text(){ 
		
		$pwlp_genral_dataaa=get_option('data_wishlist_genral');
		
		$pwlp_share_dataaa=get_option('data_share_wishlist');
		
		$pwlp_style_dataaa=get_option('data_style_wishlist');
		
		if(isset($pwlp_genral_dataaa)&& !empty($pwlp_genral_dataaa)|| isset($pwlp_share_dataaa)&& !empty($pwlp_share_dataaa)||isset($pwlp_style_dataaa)&& !empty($pwlp_style_dataaa)){
			
			extract($pwlp_genral_dataaa);
			
			extract($pwlp_share_dataaa);
			
			extract($pwlp_style_dataaa);
		}	
			
			$pwlp_change=$_SESSION['wishlist'];
			
			print_r($pwlp_change);
			
			global $product ;
			$pro_id= $product->id;
			
			if($is_enable==1){
				$ptitle = get_page_link($wishlist_page);
				
				if($pwlp_change!='')
				{
					if(array_key_exists($pro_id,$pwlp_change)){
						if(!empty( $msg_alredy)){$msg_alredy;}else{$msg_alredy="The product is already in the wishlist!";}
						echo "<br><span class='already_meg'>".$msg_alredy."</span> <br>";
						if(!empty( $wl_see_text)){$wl_see_text;}else{$wl_see_text="See WishList";}
						echo "<a href='".$ptitle."' target='_blank' class='see_wish'>".$wl_see_text."</a>";
					}
				}else{
					{
					?>
							<a class="pwlp_product "  id="pwlp_<?php echo $product->id ;?>" data-product-id="<?php echo $product->id ;?>" href="javascript:void(0)"><?php if(isset($wl_text_poduct_page)){ echo ($wl_text_poduct_page!='')?$wl_text_poduct_page:'Add to Wishlist' ;}else{ echo 'Add to Wishlist';}?></a>
					
				<?php }
				}
				/* 	if(array_key_exists($pro_id,$pwlp_change)){
						if(!empty( $msg_alredy)){$msg_alredy;}else{$msg_alredy="The product is already in the wishlist!";}
						echo "<br><span class='already_meg'>".$msg_alredy."</span> <br>";
						if(!empty( $wl_see_text)){$wl_see_text;}else{$wl_see_text="See WishList";}
						echo "<a href='".$ptitle."' target='_blank' class='see_wish'>".$wl_see_text."</a>";
					}else{
					?>
							<a class="pwlp_product "  id="pwlp_<?php echo $product->id ;?>" data-product-id="<?php echo $product->id ;?>" href="javascript:void(0)"><?php if(isset($wl_text_poduct_page)){ echo ($wl_text_poduct_page!='')?$wl_text_poduct_page:'Add to Wishlist' ;}else{ echo 'Add to Wishlist';}?></a>
					
				<?php } */
			//}
	//	}  
	
	
}
else
{ 
	?>
		<div class="error notice is-dismissible " id="message"><p>Please <strong>Activate</strong> WooCommerce Plugin First, to use it.</p><button class="notice-dismiss" type="button"><span class="screen-reader-text">Dismiss this notice.</span></button></div>
	<?php 
}  
?>
