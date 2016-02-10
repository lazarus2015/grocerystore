<?php
class Efetech_Brand_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$this->loadLayout();
		$this->renderLayout();
	}

	public function scrollAjaxAction() {
		$data = $_GET['data'];
		$pagenum = $_GET['pagenum'];
		$i=1;
		foreach ($data as $key => $value) {
			$category = Mage::getModel('catalog/category')->load($value);
			if ($category->getIsActive() && $category->getThumbnail() && $key > ($pagenum*4-1) && $i<=4){
				if( $i == 1 ){
					echo '<div class="grid_3 omega clr">';
				}else{
					echo '<div class="grid_3 omega">';
				}
				
					echo '<a href="'.$category->getURL().'">';
						echo '<img src="'.Mage::getBaseUrl('media').'catalog/category/'. $category->getThumbnail().'" alt=""/>';
						echo '<h3>'.$category->getName().'</h3>';
					echo '</a>';
				echo '</div>';
				$i++;
			}	
		}		
	}
}
