<?php
class Efetech_Bringg_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$data = $this->getRequest()->getParams();
		$_SESSION['delivery_date1'] = $data['delivery_date1'];
		if($data['delivery_date1']){
			echo 1;
		}else{
			echo 0;
		}
	}
}