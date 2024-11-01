<?php 

$plugin_dir_url =  plugin_dir_url( __FILE__ );

if(sanitize_text_field(isset($_POST['pwlp_genaral_setting']))){
			
			$is_enable= sanitize_text_field( $_POST['pwlp_plugin_enable'] );
			$title_wl_page= sanitize_text_field( $_POST['pwlp_titl_wishlist_page'] );
			$wishlist_page= sanitize_text_field( $_POST['pwlp_wishlist_page'] );
			$add_to_cart_red= sanitize_text_field( $_POST['pwlp_add_to_cart_red'] );
			$rem_wl= sanitize_text_field( $_POST['pcp_remove_from_wishlist'] );
			$wl_text_poduct_page= sanitize_text_field( $_POST['pwlp_wishlist_text_product_page'] );
			$wl_see_text= sanitize_text_field( $_POST['pwlp_see_wishlist_text_product_page'] );
			$added_text= sanitize_text_field($_POST['pwlp_text_in_added'] );
			$msg_alredy= sanitize_text_field( $_POST['pwlp_msg_in_already'] );
			$adding_date_wishlist= sanitize_text_field( $_POST['pwlp_adding_date_wishlist'] );
			
			
			$pwlp_genral_data=array('is_enable'=>$is_enable,'title_wl_page'=>$title_wl_page,'wishlist_page'=>$wishlist_page,
								'add_to_cart_red'=>$add_to_cart_red,'rem_wl'=>$rem_wl,'wl_text_poduct_page'=>$wl_text_poduct_page,
								'wl_see_text'=>$wl_see_text,'added_text'=>$added_text,'msg_alredy'=>$msg_alredy,
								'adding_date_wishlist'=>$adding_date_wishlist,
							);
		
				
		update_option('data_wishlist_genral',$pwlp_genral_data);
		 
		}
		
		$pwlp_genral_dataa=get_option('data_wishlist_genral');
		
		if(!empty($pwlp_genral_dataa)){
			extract($pwlp_genral_dataa);
		}
		 
		if(!empty($wishlist_page)){
			$wishlist_page;
		}else{
			$wishlist_page = '';
		}


?>
<div class="meta-box-sortables" id="normal-sortables">
				<div class="postbox " id="pho_wcpc_box">
					<h3><span class="upgrade-setting">Upgrade to the PREMIUM VERSION</span></h3>
					<div class="inside">
						<div class="pho_check_pin">

							<div class="column two">
								<!----<h2>Get access to Pro Features</h2>----->

					<p>Switch to the premium version </p>

					<div class="pho-upgrade-btn">
										<a target="_blank" href="https://www.phoeniixx.com/product/wishlist-for-woocommerce/"><img src="<?php echo $plugin_dir_url; ?>images/premium-btn.png" /></a>
										<a target="blank" href="http://wishlist.phoeniixxdemo.com/shop/"><img src="<?php echo $plugin_dir_url; ?>images/button2.png" /></a>
									</div>
				</div>
			</div>
		</div>
	</div>
</div>	
</div>

<div class="phoe_video_main">
	<h3>How to set up plugin</h3> 
	<iframe width="800" height="360"src="https://www.youtube.com/embed/kRfP6zNgKP4" allowfullscreen></iframe>
</div>

<form method="post" class="pwlp_genral">
<h3>General Settings</h3>
	<table class="form-table">
		<tbody>
			<tr valign="top" class="">
				<th class="titledesc" scope="row">Enable WishList Plugin</th>
				<td class="forminp forminp-checkbox">
					<fieldset>
						<legend class="screen-reader-text"></legend>
						<label for="pwlp_plugin_enable">
							<input type="checkbox"  value="1" <?php if(isset($is_enable)){echo ($is_enable==1)?'checked':'' ;}else{ echo 'checked';}?> id="pwlp_plugin_enable" name="pwlp_plugin_enable"> 
						</label> 
					</fieldset>
				</td>
			</tr>
			<tr valign="top">
				<th class="titledesc" scope="row">
					<label for="pwlp_titl_wishlist_page">Title on Wishlist page</label>
				</th>
				<td class="forminp forminp-select">
					<input type="text" size="50" value="<?php if(isset($title_wl_page)){ echo ($title_wl_page!='')?$title_wl_page:'My wishlist on '.get_bloginfo('name');}else{ echo 'My wishlist on '.get_bloginfo('name');} ?>" style="" id="pwlp_titl_wishlist_page" name="pwlp_titl_wishlist_page">											
				</td>
			</tr>
			<tr valign="top">
				<th class="titledesc" scope="row">
					<label for="pwlp_wishlist_page">Wishlist page</label>
				</th>
				<td class="forminp forminp-text">
				<?php $pwlp_pages = get_pages(); ?>
					<select name="pwlp_wishlist_page" id="pwlp_wishlist_page"  style="width:300px;">
						<?php foreach($pwlp_pages as $value): ?>
						<option <?php if ($value->ID == $wishlist_page){ echo "selected";} ?> value="<?php echo $value->ID; ?>"><?php echo $value->post_title;?></option>
						<?php endforeach;?>
					</select><br>
					<small>(Paste the shortcode <strong>[pwlp_wishlist]</strong> on the selected page to show Wishlist content)</small>
					
				</td>
			</tr>
			<tr valign="top" class="">
				<th class="titledesc" scope="row">"Add to Cart" redirection</th>
				<td class="forminp forminp-checkbox">
					<fieldset>
						<label for="pwlp_add_to_cart_red">
							<input type="checkbox"  value="1" <?php  echo (isset($add_to_cart_red) && ($add_to_cart_red==1)) ?'checked':'' ;?> id="pwlp_add_to_cart_red" name="pwlp_add_to_cart_red"> Say if you want to redirect on Add To Cart page.
						</label> 
					</fieldset>
				</td>
			</tr>
			<tr valign="top" class="">
				<th class="titledesc" scope="row">Remove product from Wishlist </th>
				<td class="forminp forminp-checkbox">
					<fieldset>
						<label for="pcp_remove_from_wishlist">
							<input type="checkbox"  value="1" <?php echo (isset($rem_wl) && ($rem_wl==1))?'checked':'' ;?> id="pcp_remove_from_wishlist" name="pcp_remove_from_wishlist"> Remove product from Wishlist when added to cart.
						</label>
					</fieldset>
				</td>
			</tr>
			<tr valign="top">
				<th class="titledesc" scope="row">
					<label for="pwlp_wishlist_text_product_page">"Add to Wishlist" text on product page</label>
				</th>
				<td class="forminp forminp-select">
					<input type="text" value="<?php  echo (isset($wl_text_poduct_page) && ($wl_text_poduct_page!=''))?$wl_text_poduct_page:'Add to Wishlist'; ?>" style="" id="pwlp_wishlist_text_product_page" name="pwlp_wishlist_text_product_page">											
				</td>
			</tr>
			<tr valign="top">
				<th class="titledesc" scope="row">
					<label for="pwlp_see_wishlist_text_product_page">"See Wishlist" text on product page</label>
				</th>
				<td class="forminp forminp-select">
					<input type="text" value="<?php  echo (isset($wl_see_text) && ($wl_see_text!=''))?$wl_see_text:'See WishList'; ?>" style="" id="pwlp_see_wishlist_text_product_page" name="pwlp_see_wishlist_text_product_page">											
				</td>
			</tr>
			<tr valign="top">
				<th class="titledesc" scope="row">
					<label for="pwlp_text_in_added">Text when product added in Wishlist</label>
				</th>
				<td class="forminp forminp-select">
					<input type="text" value="<?php  echo (isset($added_text) && ($added_text!=''))?$added_text:'Added'; ?>" style="" id="pwlp_text_in_added" name="pwlp_text_in_added">											
				</td>
			</tr>
			<tr valign="top">
				<th class="titledesc" scope="row">
					<label for="pwlp_msg_in_already">Message when product is already in wishlist</label>
				</th>
				<td class="forminp forminp-select">
					<input type="text" value="<?php  echo (isset($msg_alredy) && ($msg_alredy!=''))?$msg_alredy:'The product is already in the wishlist!'; ?>" style="" id="pwlp_msg_in_already" name="pwlp_msg_in_already">											
				</td>
			</tr>
			<tr valign="top" class="">
				<th class="titledesc" scope="row">Show product adding date to wishlist </th>
				<td class="forminp forminp-checkbox">
					<fieldset>
						<label for="pwlp_adding_date_wishlist">
							<input type="checkbox"  value="1" <?php echo (isset($adding_date_wishlist) && ($adding_date_wishlist==1))?'checked':'' ;?> class="" id="pwlp_adding_date_wishlist" name="pwlp_adding_date_wishlist">
						</label> 
					</fieldset>
				</td>
			</tr>
		</tbody>
	</table>
	<input type="button" name="reset_value" id="reset_value" value="Reset" class="button button-info" style="float: left; margin-right: 10px;">
	<input type="submit" value="Save Changes" class="button-primary" name="pwlp_genaral_setting"  style="float: left; margin-right: 10px;">
</form>	
<style>
#pho_wcpc_box.postbox h3 {
    padding:0 0 0 10px;
}

a:focus {
	box-shadow: none;
}

.phoe_video_main {
	padding: 20px;
	text-align: center;
}

.phoe_video_main h3 {
	color: #02c277;
	font-size: 28px;
	font-weight: bolder;
	margin: 20px 0;
	text-transform: capitalize
	display: inline-block;
}

</style>