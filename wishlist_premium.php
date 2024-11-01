<?php
$plugin_dir_url =  plugin_dir_url( __FILE__ );
?>
<style>
.premium-box{ width:100%; height:auto; background:#fff;  }
.premium-features{}
.premium-heading{  color: #484747;font-size: 40px;padding-top: 35px;text-align: center;text-transform: uppercase;}
.premium-features li{ width:100%; float:left;  padding: 80px 0; margin: 0; }
.premium-features li .detail{ width:50%; }
.premium-features li .img-box{ width:50%; }

.premium-features li:nth-child(odd) { background:#f4f4f9; }
.premium-features li:nth-child(odd) .detail{float:right; text-align:left; }
.premium-features li:nth-child(odd) .detail .inner-detail{}
.premium-features li:nth-child(odd) .detail p{ }
.premium-features li:nth-child(odd) .img-box{ float:left; text-align:right;}

.premium-features li:nth-child(even){  }
.premium-features li:nth-child(even) .detail{ float:left; text-align:right;}
.premium-features li:nth-child(even) .detail .inner-detail{ margin-right: 46px;}
.premium-features li:nth-child(even) .detail p{ float:right;} 
.premium-features li:nth-child(even) .img-box{ float:right;}

.premium-features .detail{}
.premium-features .detail h2{ color: #484747;  font-size: 24px; font-weight: 700; padding: 0; line-height: 30px;}
.premium-features .detail p{  color: #484747;  font-size: 13px;  max-width: 327px;}
/**images**/
.pincode-check{ background:url(<?php echo $plugin_dir_url; ?>/images/select-wishlist.png); width:530px; height:295px; display:inline-block; margin-right: 25px; background-repeat:no-repeat; background-size:100%;}

.sat-sun-off{ background:url(<?php echo $plugin_dir_url; ?>/images/mail-promo.png); width:530px; height:200px; display:inline-block; background-size: 100%; margin-right:30px; background-repeat:no-repeat;}

.bulk-upload{ background:url(<?php echo $plugin_dir_url; ?>/images/multiple-wishlist.png); width:530px; height:360px; display:inline-block; background-repeat:no-repeat; background-size: 100%;}

.cod-verify{background:url(<?php echo $plugin_dir_url; ?>/images/popular-products.png); width:530px; height:190px; display:inline-block; margin-right:30px; background-repeat:no-repeat; background-size: 100%;}

.delivery-date{background:url(<?php echo $plugin_dir_url; ?>/images/see-users.png); width:530px; height:290px; display:inline-block; background-repeat:no-repeat; background-size:100%;}

.advance-styling{background:url(<?php echo $plugin_dir_url; ?>/images/button-type.png); width:530px; height:150px; display:inline-block; margin-right:30px; background-repeat:no-repeat; background-size:100%;}

.Checkout-Page-Pincode--Check{background:url(<?php echo $plugin_dir_url; ?>/images/style-options.png); width:450px; height:1520px; display:inline-block; background-repeat:no-repeat; background-size:100%;}



/*upgrade css*/

.upgrade{background:#f4f4f9;padding: 50px 0; width:100%; clear: both;}
.upgrade .upgrade-box{ background-color: #808a97;
    color: #fff;
    margin: 0 auto;
   min-height: 110px;
    position: relative;
    width: 60%;}

.upgrade .upgrade-box p{ font-size: 15px;
     padding: 19px 20px;
    text-align: center;}

.upgrade .upgrade-box a{background: none repeat scroll 0 0 #6cab3d;
    border-color: #ff643f;
    color: #fff;
    display: inline-block;
    font-size: 17px;
    left: 50%;
    margin-left: -150px;
    outline: medium none;
    padding: 11px 6px;
    position: absolute;
    text-align: center;
    text-decoration: none;
    top: 36%;
    width: 277px;}

.upgrade .upgrade-box a:hover{background: none repeat scroll 0 0 #72b93c;}
.navbar-all-tabs .nav-tab-wrapper .woo-nav-tab-wrapper h2{  border-bottom: 1px solid #ccc;}
.premium-vr{ text-transform:capitalize;} 
#wcqv_general_videobox.postbox h3 {
    padding: 10px;
}
.premium-box-head {
    background: #eae8e7 none repeat scroll 0 0;
    height: 500px;
    text-align: center;
    width: 100%;
}
.pho-upgrade-btn a {
    display: inline-block;
    margin-top: 75px;
}

.main-heading {
    background: #fff none repeat scroll 0 0;
    margin-bottom: -70px;
    text-align: center;
}
.main-heading img {
    margin-top: -200px;
}
.premium-box-container {
    margin: 0 auto;
}
.premium-box-container .description:nth-child(2n+1) {
    background: #fff none repeat scroll 0 0;
}
.main-heading h1{ margin: 0px;}
.premium-box {
    background: none;
    height: auto;
    width: 100%;
}

.premium-box-container .description {
    display: block;
    padding: 35px 0;
    text-align: center;
}
.premium-box-container .pho-desc-head::after {
    background:url(<?php echo $plugin_dir_url; ?>images/head-arrow.png) no-repeat;
    content: "";
    height: 98px;
    position: absolute;
    right: -40px;
    top: -6px;
    width: 69px;
}
.premium-box-container .pho-desc-head {
    margin: 0 auto;
    position: relative;
    width: 768px;
}
.pho-plugin-content {
    margin: 0 auto;
    overflow: hidden;
    width: 768px;
}
.pho-plugin-content img {
    max-width: 100%;
    width: auto;
}
.premium-box-container .pho-desc-head h2{ line-height:38px;}

.premium-box-container .pho-desc-head h2 {
    color: #02c277;
    font-size: 28px;
    font-weight: bolder;
    margin: 0;
    text-transform: capitalize;
}
.pho-plugin-content p {
    color: #212121;
    font-size: 18px;
    line-height: 32px;
}
.premium-box-container .description:nth-child(2n+1) .pho-img-bg {
    background: #f1f1f1 url(<?php echo $plugin_dir_url; ?>images/image-frame-odd.png) no-repeat 100% top;
}
.description .pho-plugin-content .pho-img-bg {
    border-radius: 5px 5px 0 0;
    height: auto;
    margin: 0 auto;
    padding: 70px 0 40px;
    width: 750px;
}
.pho-upgrade-btn {
    text-align: center;
}
#wcqv_general_videobox > h3 {
    padding: 0 0 0 10px;
}
.premium-box-container .description:nth-child(2n) {
    background: #eae8e7 none repeat scroll 0 0;
}
.premium-box-container .description:nth-child(2n) .pho-img-bg {
    background: #f1f1f1 url(<?php echo $plugin_dir_url; ?>images/image-frame-even.png) no-repeat 100% top;
}
.premium-box-container .description:nth-child(2n+1) .pho-img-bg {
    background: #f1f1f1 url(<?php echo $plugin_dir_url; ?>images/image-frame-odd.png") no-repeat scroll 100% top;
}
.wrap {
    margin: 10px 20px 0 2px;
}

a:focus {
	box-shadow: none !important;
}


</style>

<div class="premium-box">

	<div class="premium-box-head">
           <div class="pho-upgrade-btn">
           <a target="_blank" href="https://www.phoeniixx.com/product/wishlist-for-woocommerce/"><img src="<?php echo $plugin_dir_url; ?>images/premium-btn.png" /></a>
		   <a target="blank" href="http://wishlist.phoeniixxdemo.com/shop/"><img src="<?php echo $plugin_dir_url; ?>images/button2.png" /></a>
           </div>
           </div>
           <div class="main-heading">
           <h1> <img src="<?php echo $plugin_dir_url; ?>images/premium-head.png" />
           
          </h1>
           </div>
           <div class="premium-box-container">
           <div class="description">
                <div class="pho-desc-head">
                <h2>Let Users Create Unlimited no. of Wishlists</h2></div>
                
                    <div class="pho-plugin-content">
                        <p>Your users may want to categorize their wishlisted items based on certain parameters. This feature allows the users 
                           to create multiple wishlists, so that they can list all their desirable items in a much organised and sorted manner.</p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/select-wishlist.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
             <div class="description">
                <div class="pho-desc-head">
                <h2>Email Promo Offers or Deals on Specific Products in Users’ Wishlists</h2></div>
                
                    <div class="pho-plugin-content">
                         <p>
                         This feature lets you email customized promo offers/deals to your users, on their wishlisted items. You could 
                         draft a custom message and could edit the email template as well.   
                        </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/mail-promo.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2>See Multiple Wishlists</h2></div>
                
                    <div class="pho-plugin-content">
                          <p>
                           The plugin allows you to see multiple wishlists of your users, as an admin. You could benefit from this feature
                           in multiple ways.
                        </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/multiple-wishlist.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
             <div class="description">
                <div class="pho-desc-head">
                <h2>See the Popular Products</h2></div>
                
                    <div class="pho-plugin-content">
                          <p>
                          This feature lets you see popular products i.e. the products that are being frequently added to wishlists by your users.
                          Hence, you would be able to identify those products that are being liked by the users and are therefore, popular.   
                        </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/popular-products.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2>See All Users of Any Wish-listed Product</h2></div>
                
                    <div class="pho-plugin-content">
                           <p>
                           The plugin allows you to see all the users of any given product that has been added to a wishlist. 
                        </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/see-users.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2>Set the Button Type as ‘Link’, ‘Button’ or ‘Icon’</h2></div>
                
                    <div class="pho-plugin-content">
                           <p>
                             Wishlist Button could be set as either a ‘Link’, or as ‘Button’ or as an ‘Icon’. Based on your requirement, 
                             you could set it the way you like. 
                            </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/button-type.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2>Do Advanced Stylization of Wishlist</h2></div>
                
                    <div class="pho-plugin-content">
                          <p>
                          Based on the theme and all other requirements, you could stylize the Wishlist Plugin, setting elements like
                           ‘Popup Color’, ‘Add to Wishlist’ Text, ‘Add to Wish list’ Button Color and more such elements. 
                        </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/style-options.png" />
                        </div>
                    </div>
            </div> <!-- description end -->


           </div>

<div class="pho-upgrade-btn">
        <a href="https://www.phoeniixx.com/product/wishlist-for-woocommerce/" target="_blank"><img src="<?php echo $plugin_dir_url; ?>images/premium-btn.png" /></a>
		<a target="blank" href="http://wishlist.phoeniixxdemo.com/shop/"><img src="<?php echo $plugin_dir_url; ?>images/button2.png" /></a>
        </div>
	</div>	</div>