<?php
class BlackRock_ShippingAlert_Model_Promos
{
	public function toOptionArray()
	{
		$_rules = Mage::getModel('salesrule/rule')->getCollection();
		$_rulesArray = array();
		
		foreach($_rules as $_rule){
			$_rulesArray[] = array('value'=>$_rule->getRuleId(), 'label'=>Mage::helper('shippingalert')->__($_rule->getName()));
		}
		return $_rulesArray;
	}
}