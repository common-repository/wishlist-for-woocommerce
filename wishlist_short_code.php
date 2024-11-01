<?php 

add_shortcode( 'pwlp_wishlist', 'pwlp_wishlist_shortcode' );

	function pwlp_wishlist_shortcode(){
	
		ob_start();
		
		if(!isset($_SESSION)){
			session_start();
		} 
		
		global $post, $woocommerce, $product;
 
			/* $wishlist_data=$_SESSION['wishlists'];
			
			print_r($wishlist_data); */
		
		// unset($_SESSION['wishlist']);
		
		$pwlp_genral_dataa=get_option('data_wishlist_genral');
		
		$pwlp_share_dataa=get_option('data_share_wishlist');
		
		$pwlp_style_dataa=get_option('data_style_wishlist');
	
		if(isset($pwlp_genral_dataa)&& !empty($pwlp_genral_dataa)|| isset($pwlp_share_dataa)&& !empty($pwlp_share_dataa)||isset($pwlp_style_dataa)&& !empty($pwlp_style_dataa)){
				
			extract($pwlp_genral_dataa);
			
			extract($pwlp_share_dataa);
			
			extract($pwlp_style_dataa);
		}
			
		if(isset($_GET['add-to-cart'])){
			if($rem_wl==1){
				
				$prod_id=$_GET['add-to-cart'];
				
				$wishlist_data=$_SESSION['wishlists'];
								
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
		
					
		?>
			
		<form class="woocommerce" method="post" action="" id="pwlp_form">
		
			<div class="">
				<h2 style="color:<?php echo (isset($title_wi_page_col)&& !empty($title_wi_page_col))?$title_wi_page_col:'#141412'?>;"><?php echo ($title_wl_page!='')? $title_wl_page:'My wishlist on '.get_bloginfo('name'); ?></h2>
			</div>
		
			<table  class="shop_table cart pwlp_table">
				<thead>
						<tr > 
							<th class="pwl_product-remove"></th>
							<th class="product-thumbnail"></th>
							<th class="product-name">
								<span class="nobr">Product Name</span>
							</th>
							<th class="product-price">
								<span class="nobr">Unit Price</span>
							</th>
							<th class="product-stock-stauts">
								<span class="nobr">Stock Status</span>
							</th>
							<th class="product-add-to-cart"></th>
						</tr>
				</thead>
				
				<tbody>
				<?php 
				
					if(isset($_SESSION['wishlists']) && !empty($_SESSION['wishlists'])){
						
						if(is_user_logged_in()){
								
							
							$pwllp_user_ID = get_current_user_id();
							
							$wishList_data=get_user_meta($pwllp_user_ID,'_pwlp_wishlistf');
							
							$wishList_data=$wishList_data[0];
							
							
						} else{
							
							$wishList_data=$_SESSION['wishlists'];	
						
						} 
						
						foreach($wishList_data as $kid=>$phoen_wish_data)
						{
						
							$_pwlp = new WC_Product_Factory();
							
							$pwlp_product=$_pwlp->get_product($kid);
							
							$pwlp_product->get_availability();
							
							$data = get_post_meta( $kid );
							
							$data_post = get_post( $kid );
							
							$pur = $pwlp_product->is_purchasable() && $pwlp_product->is_in_stock() ? 'add_to_cart_button' : '';
							
							?>
					
								<tr id="pwlp_product_<?php echo $kid;?>" >
									
									<td class="product-remove">
										<a class="remove pwlp_remove_id" data-remove-id="<?php echo $kid; ?>" >×</a>
									</td>
									
									<td class="product-thumbnail">
									
										<?php
										$cart_item='';
										$cart_item_key='';
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $pwlp_product->get_image(), $cart_item, $cart_item_key );
										if ( ! $pwlp_product->is_visible() )
												echo $thumbnail;
											else
												printf( '<a href="%s">%s</a>', $pwlp_product->get_permalink( $phoen_wish_data ), $thumbnail ); 
										?>
									
									</td>
									
									<td class="product-name">
										<?php
											if ( ! $pwlp_product->is_visible() )
												echo apply_filters( 'woocommerce_cart_item_name', $pwlp_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
											else
												echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', $pwlp_product->get_permalink( $cart_item ), $pwlp_product->get_title() ), $cart_item, $cart_item_key );

											// Meta data
											//echo WC()->cart->get_item_data( $cart_item );

											// Backorder notification
											//if ( $pwlp_product->backorders_require_notification() && $pwlp_product->is_on_backorder( $cart_item['quantity'] ) )
												//echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
										?>
									</td>
									
									<td class="product-price">
										<span class="amount">
										<?php $pwlp_price= $pwlp_product->get_price(); 
												if (!empty($pwlp_price)){
													echo get_woocommerce_currency_symbol(); 
													echo $pwlp_price;
												} ?>
										</span> 
										
									</td>
									
									<td class="product-stock-status">
										<span class="wishlist-in-stock"><?php echo $pwlp_stock= $data['_stock_status'][0];?></span> 
									</td>
									
									<td class="product-add-to-cart">
									<?php if(isset($adding_date_wishlist)&& ($adding_date_wishlist==1)){ ?>
										<span>Add on :<?php echo $phoen_wish_data;?></span>
									<?php }
									
										if( $pwlp_product->is_type( 'simple' ) ){
											$query_str = "";
											echo apply_filters( 'woocommerce_loop_add_to_cart_link',
											sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s ">%s</a>',
												esc_url( $pwlp_product->add_to_cart_url()."&pwlp_remove_id=".$kid ),
												esc_attr( $kid ),
												esc_attr( $pwlp_product->get_sku() ),
												esc_attr( isset( $quantity ) ? $quantity : 1 ),
												$pwlp_product->is_purchasable() && $pwlp_product->is_in_stock() ? 'add_to_cart_button' : '',
												
												esc_html( $pwlp_product->add_to_cart_text() )
											),
										$pwlp_product );
										
									}else{
											echo apply_filters( 'woocommerce_loop_add_to_cart_link',
											sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s">%s</a>',
												esc_url( $pwlp_product->add_to_cart_url()."?pwlp_remove_id=".$kid),
												esc_attr($kid),
												esc_attr( $pwlp_product->get_sku() ),
												esc_attr( isset( $quantity ) ? $quantity : 1 ),
												$pwlp_product->is_purchasable() && $pwlp_product->is_in_stock() ? 'add_to_cart_button' : '',
												esc_attr($pwlp_product->is_type( 'variable' ) ),
												esc_html( $pwlp_product->add_to_cart_text() )
											),
										$pwlp_product );
									} 
									
									?>
									
									</td>
								</tr>
							<?php  
							
						}
					
					}else{ ?>
					<tr>
						<td colspan="6" class="wishlist-empty" style="text-align:center;">
							No products were added to the wishlist
						</td>
					</tr>
					<?php } ?>
				</tbody>
		
				<tfoot>
						<tr>
							<td colspan="6">
								<?php require_once('pwlp_share.php'); ?>
							</td>
						</tr>
				</tfoot>
			</table>

		</form>
			
<?php }

?>