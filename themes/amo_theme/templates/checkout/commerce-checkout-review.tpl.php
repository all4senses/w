
<div class="address-review-container">
 <span class="title-address"><?php print t('Address'); ?></span>
 <div class="col-address-review">
 <span class="subtitle-address"><?php print t('Shipping address'); ?></span> 
     <?php print $variables['form']['#data']['customer_profile_shipping']['data'];?>
</div>	
 <div class="col-address-review"> 
 <span class="subtitle-address"><?php print t('Billing address'); ?></span>
     <?php print $variables['form']['#data']['customer_profile_billing']['data'];?>	 
</div>
</div>

