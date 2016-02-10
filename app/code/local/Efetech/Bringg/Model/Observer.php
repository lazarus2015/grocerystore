<?php
class Efetech_Bringg_Model_Observer
{
	public function saveCustomData($observer) {
		$event = $observer->getEvent();
		$order = $event->getOrder();
		$fieldVal = Mage::app()->getFrontController()->getRequest()->getParams();
		$_SESSION["delivery_date"] = $fieldVal['delivery_date'].'123';
		$order->setDeliveryDate($fieldVal['delivery_date']);
	}
	public function cronTask(){
		Mage::helper('bringg')->cronTask();
	}
}