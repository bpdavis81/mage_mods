<?php
class BlackRock_ShippingAlert_Helper_Data extends Mage_Core_Helper_Abstract 
{
	public function getGeneralSettings()
	{
		return Mage::getStoreConfig('blackrock_options/general');
	}
	
	public function getAppearanceSettings()
	{
		return Mage::getStoreConfig('blackrock_options/appearance');
	}
	
	public function getDesignSettings()
	{
		return Mage::getStoreConfig('blackrock_options/design');
	}
	
	
	public function getIsEnabled()
	{
	    $_enabled = Mage::helper('shippingalert')->getGeneralSettings();
	    $_enabled = $_enabled['enable_module'];
	    if($_enabled == 1){
	    	$_enabled = true;
	    }
	    return $_enabled;
	}
	
	public function getCartPromotion(){
		$_promotion = Mage::helper('shippingalert')->getGeneralSettings();
		$_promotion = $_promotion['cartrule_select'];
		
		$_promotion = Mage::getModel('salesrule/rule')->load($_promotion);
		
		return $_promotion;
	}
	
	public function getPromotion()
	{
		if(Mage::helper('shippingalert')->getCartPromotion()->getIsActive() == 1){
			$_conditions = Mage::helper('shippingalert')->getCartPromotion()->getConditionsSerialized();
			$_conditions = unserialize($_conditions);
			
			foreach($_conditions['conditions'] as $_condition){
				return $_condition;
			}
		}
	}
	
	public function getPromotionValue(){
		$_condition = Mage::helper('shippingalert')->getPromotion();
		return $_condition['value'];
	}

	public function getFontEnabled()
	{
		$_font = Mage::helper('shippingalert')->getAppearanceSettings();
		return $_font['font'];
	}
	
	public function getFontName()
	{
		$_fontName = Mage::helper('shippingalert')->getAppearanceSettings();
		return $_fontName['gfont'];
	}
	
	public function getMessageHeading()
	{
		$_messageEnabled = Mage::helper('shippingalert')->getAppearanceSettings();
		
		if($_messageEnabled['message'] == 2){
			$_messageHead = $_messageEnabled['custom_heading'];
		}
		return $_messageHead;
	}
	
	public function getMessageText()
	{
		$_messageEnabled = Mage::helper('shippingalert')->getAppearanceSettings();
		
		if($_messageEnabled['message'] == 2){
			$_messageText = $_messageEnabled['custom_message'];
		}
		return $_messageText;
	}
	
	public function getDesignBackground()
	{	
		$_background = Mage::helper('shippingalert')->getDesignSettings();
		return $_background['background_image'];
	}
	
	public function getDesignAlignment()
	{
		$_alignment = Mage::helper('shippingalert')->getDesignSettings();
		return $_alignment['progress_alignment'];
	}
	
	public function getTextAlignment()
	{
		if(Mage::helper('shippingalert')->getDesignAlignment() == 'right'){
			$_align = 'align-left';
		} else {
			$_align = 'align-right';
		}
		return $_align;
	}
	
	public function getTextColor()
	{
		$_color = Mage::helper('shippingalert')->getDesignSettings();
		return $_color['font_color'];
	}
	
	public function getBorderColor()
	{
		$_border = Mage::helper('shippingalert')->getDesignSettings();
		return $_border['progress_border'];
	}
	
	public function getProgressColor()
	{
		$_proColor = Mage::helper('shippingalert')->getDesignSettings();
		return $_proColor['progress_color'];
	}
}