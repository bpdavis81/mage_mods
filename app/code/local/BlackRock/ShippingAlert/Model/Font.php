<?php 
class BlackRock_ShippingAlert_Model_Font
{
    public function toOptionArray()
    {
        return array(
            array('value'=>0, 'label'=>Mage::helper('shippingalert')->__('Disable')),
            array('value'=>2, 'label'=>Mage::helper('shippingalert')->__('Google Fonts'))        
        );
    }
}