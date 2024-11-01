<?php 

	function wishlist_settings(){
		
	?>
	<div id="profile-page" class="wrap">
		<?php 
		
		if( isset( $_GET['pwlp_tabs'] ) ) {
	
			$pwlp_tabs = sanitize_text_field( $_GET['pwlp_tabs'] );
			
		}
		else
		{
			$pwlp_tabs = '';
		}
		?>
		<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
			<a class="nav-tab <?php if($pwlp_tabs == 'gen' || $pwlp_tabs == ''){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=pwlp-wishlist-manager&amp;pwlp_tabs=gen">General</a>
			<a class="nav-tab <?php if($pwlp_tabs == 'share'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=pwlp-wishlist-manager&amp;pwlp_tabs=share">Share Settings</a>
			<a class="nav-tab <?php if($pwlp_tabs == 'style'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=pwlp-wishlist-manager&amp;pwlp_tabs=style">Style Settings</a>
			<a class="nav-tab <?php if($pwlp_tabs == 'prem'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=pwlp-wishlist-manager&amp;pwlp_tabs=prem">Premium</a>
			
			

		</h2>
		<?php 
			if($pwlp_tabs == 'gen' || $pwlp_tabs == ''){ 
				
				require_once('pwlp_genral.php');
				
			}
			if($pwlp_tabs == 'share' ){
				
				require_once('pwlp_share_setting.php');	
			
			}
			
			if($pwlp_tabs == 'style' ){
				
				require_once('pwlp_style_setting.php');
				
			}
			
			if($pwlp_tabs == 'allp')
			{
				?>
				<style>
				iframe.more-plugin {
					min-height: 1000px;
					width: 100%;
				}

				.wrap{
					margin:0;
				}
				</style>
					<iframe class="more-plugin" src="http://plugins.snapppy.com/plugins.php"></iframe>
					<?php
			}
			if($pwlp_tabs == 'prem'){
				require_once('wishlist_premium.php');
			}
			
		?>
	 
	
	<?php 
	}
	
?>