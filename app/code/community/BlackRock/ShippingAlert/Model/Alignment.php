<?php
class BlackRock_ShippingAlert_Model_Alignment
{
	public function toOptionArray()
	{
		return array(
			array('value' => 'left', 'label' => Mage::helper('shippingalert')->__('Left')),
			array('value' => 'right', 'label' => Mage::helper('shippingalert')->__('Right'))
		);
	}
}