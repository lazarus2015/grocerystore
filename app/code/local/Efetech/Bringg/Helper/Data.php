<?php
class Efetech_Bringg_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getTitle() {
		return Mage::getSingleton('checkout/session')->getLastRealOrderId();
	}

	public function getOrderID() {
		return Mage::getSingleton('checkout/session')->getLastOrderId();
	}

	public function getCompanyID() {
		return Mage::getStoreConfig('efetech/general/company_id');
	}

	public function getAccessToken() {
		return Mage::getStoreConfig('efetech/general/access_token');
	}

	public function getSecretKey() {
		return Mage::getStoreConfig('efetech/general/secret_key');
	}

	public function checkEnable() {
		return  Mage::getStoreConfig('efetech/general/enable');
	}

	public function getOrderApiUrl() {
		return Mage::getStoreConfig('efetech/general/order_api');
		// return 'http://developer-api.bringg.com/partner_api/tasks';
	}

	public function getCustomerApiUrl() {
		return Mage::getStoreConfig('efetech/general/customer_api');
		// return 'http://developer-api.bringg.com/partner_api/customers';
	}

	public function getDriverApiUrl() {
		return Mage::getStoreConfig('efetech/general/user_api');
		// return 'http://developer-api.bringg.com/partner_api/users';
	}

	public function getInventoryApiUrl() {
		return Mage::getStoreConfig('efetech/general/inventory_api');
		// return 'https://developer-api.bringg.com/partner_api/inventories';
	}

	public function getStoreAddress() {
		return Mage::getStoreConfig('efetech/general/store_address');
	}

	public function createTask($customerId, $userId, $title, $scheduledAt, $inventory) {
		$data = array(
			'customer_id' => $customerId,
			'company_id' => $this->getCompanyID(),
			'user_id' => $userId,
			'title' => $title,
			'scheduled_at' => $scheduledAt,
			'inventory' => $inventory,
			);
		$data["access_token"] = $this->getAccessToken();
		$data["timestamp"] = date('Y-m-d H:i:s');
		$secret_key = $this->getSecretKey();
		$query_string = http_build_query($data);
		$signature = hash_hmac("sha1", $query_string, $secret_key);
		$data["signature"] = $signature;

		$url = $this->getOrderApiUrl();
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, count($data));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 

		$result = curl_exec($ch);

		curl_close($ch);

		return $result;
	}

	public function getCustomerData($oid) {
		$orderID = $oid;
		$order = Mage::getModel('sales/order')->load($orderID);
		return $order->getShippingAddress()->getData();
	}

	public function createCustomer($oid) {
		$customerData = $this->getCustomerData($oid);
		$name = $customerData['firstname'].' '.$customerData['lastname'];
		$address = $customerData['street'].', '.$customerData['city'];
		$phone = $customerData['telephone'];
		$email = $customerData['email'];
		$data = array(
			'name' => $name,
			'address' => $address,
			'phone'	=> $phone,
			'email' => $email,
			);
		$data["access_token"] = $this->getAccessToken();
		$data["timestamp"] = date('Y-m-d H:i:s');
		$secret_key = $this->getSecretKey();
		$query_string = http_build_query($data);
		$signature = hash_hmac("sha1", $query_string, $secret_key);
		$data["signature"] = $signature;

		$url = $this->getCustomerApiUrl();

		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, count($data));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 

		$result = curl_exec($ch);

		curl_close($ch);

		return $result;
	}

	public function getCustomerID($oid) {
		$data = json_decode($this->createCustomer($oid),true);
		if($data['success']){
			return $data['customer']['id'];
		}
		return '';
	}

	public function getUserFree() {
		$data = array(
			'company_id' => $this->getCompanyID(),
			);
		$data["access_token"] = $this->getAccessToken();
		$data["timestamp"] = date('Y-m-d H:i:s');
		$secret_key = $this->getSecretKey();
		$query_string = http_build_query($data);
		$signature = hash_hmac("sha1", $query_string, $secret_key);
		$data["signature"] = $signature;

		$url = $this->getDriverApiUrl();

		$content = json_encode($data);
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		$result = curl_exec($ch);

		curl_close($ch);

		$user = json_decode($result,true);
		$userId = '15361';
		foreach ($user as $v) {
			if($v['status'] == 'online' && ($v['sub'] == '' || $v['sub'] == 'Free')){
				$userId = $v['id'];
				break;
			}
		}

		return $userId;

		//return $user;

	}

	// public function getDeliveryDate() {
	// 	if($_SESSION['delivery_date1']){
	// 		$orderID = $this->getOrderID();
	// 		$order = Mage::getModel('sales/order')->load($orderID);
	// 		$order->setDeliveryDate($_SESSION['delivery_date1']);
	// 		$order->save();
	// 		return $_SESSION['delivery_date1'];
	// 	}else{
	// 		return '';
	// 	}
	// }

	public function getDriverId() {
		return '17632';
	}

	public function getStockId() {
		return '15317';
	}

	public function getKitchenId() {
		return '17631';
	}

	public function getButcherId() {
		return '15361';
	}

	public function getDeliCateId() {
		return '11';
	}

	public function getKitchenCateId() {
		return '14';
	}

	public function getDeliInventory($oid) {
		$deliCateId = $this->getDeliCateId();
		$orderId = $oid;
		$order = Mage::getModel('sales/order')->load($orderId);
		$items = $order->getAllVisibleItems();
		$deli = array();
		$check = false;
		$num = 0;
		foreach($items as $i){
			$pId = $i->getProductId();
			$product = Mage::getModel('catalog/product')->load($pId);
			$cats = $product->getCategoryIds();
			foreach ($cats as $c) {
				$cat = Mage::getModel("catalog/category")->load($c);
				$attribute = Mage::getSingleton('eav/config')->getAttribute('catalog_category', 'bringg_user');

				$text = $attribute->getSource()->getOptionText($cat->getBringgUser());
				if($text && in_array("Butcher", $text)){
					$check = true;
					break;
				}
			}
			// $bringgUser = $product->getAttributeText('bringg_user');
			if($check){
				$productName = $i->getName();
				$productPrice = $i->getPrice();
				$sku = $i->getSku();
				$qty = number_format($i->getQtyOrdered());
				if($this->getInventory($sku)){
					$inventoryId = $this->getInventory($sku);
				}else{
					$inventoryId = $this->createInventory($productName, $productPrice, $sku);
				}
				$deli[$num]['id'] = $inventoryId;
				$deli[$num]['quantity'] = $qty;
				$num++;
			}
		}
		return json_encode(array_values($deli));
	}

	public function getKitchenInventory($oid) {
		$kitchenCateId = $this->getKitchenCateId();
		$orderId = $oid;
		$order = Mage::getModel('sales/order')->load($orderId);
		$items = $order->getAllVisibleItems();
		$kitchen = array();
		$num = 0;
		$check = false;
		foreach($items as $i){
			$pId = $i->getProductId();
			$product = Mage::getModel('catalog/product')->load($pId);
			$cats = $product->getCategoryIds();
			foreach ($cats as $c) {
				$cat = Mage::getModel("catalog/category")->load($c);
				$attribute = Mage::getSingleton('eav/config')->getAttribute('catalog_category', 'bringg_user');

				$text = $attribute->getSource()->getOptionText($cat->getBringgUser());
				if($text && in_array("Kitchen", $text)){
					$check = true;
					break;
				}
			}
			// $bringgUser = $product->getAttributeText('bringg_user');
			if($check){
				$productName = $i->getName();
				$productPrice = $i->getPrice();
				$sku = $i->getSku();
				$qty = number_format($i->getQtyOrdered());
				if($this->getInventory($sku)){
					$inventoryId = $this->getInventory($sku);
				}else{
					$inventoryId = $this->createInventory($productName, $productPrice, $sku);
				}
				$kitchen[$num]['id'] = $inventoryId;
				$kitchen[$num]['quantity'] = $qty;
				$num++;
			}
		}
		return json_encode(array_values($kitchen));
	}

	public function getInventory($sku){
		$data = array(
			'company_id' => $this->getCompanyID(),
			);
		$data["access_token"] = $this->getAccessToken();
		$data["timestamp"] = date('Y-m-d H:i:s');
		$secret_key = $this->getSecretKey();
		$query_string = http_build_query($data);
		$signature = hash_hmac("sha1", $query_string, $secret_key);
		$data["signature"] = $signature;

		$url = $this->getInventoryApiUrl();
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		// Thiết lập có return
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Thiết lập sử dụng POST
		curl_setopt($ch, CURLOPT_POST, count($data));

		// Thiết lập các dữ liệu gửi đi
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 

		$result = curl_exec($ch);

		curl_close($ch);
		$data = json_decode($result,true);
		foreach ($data as $key => $value) {
			if($value['external_id'] == $sku){
				return $value['id'];
			}
		}
		return false;
	}

	public function createInventory($name, $price, $sku){
		$data = array(
			'name' => $name,
			'price' => $price,
			'company_id' => $this->getCompanyID(),
			'external_id' => $sku,
			);
		$data["access_token"] = $this->getAccessToken();
		$data["timestamp"] = date('Y-m-d H:i:s');
		$secret_key = $this->getSecretKey();
		$query_string = http_build_query($data);
		$signature = hash_hmac("sha1", $query_string, $secret_key);
		$data["signature"] = $signature;

		$url = $this->getInventoryApiUrl();

		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, count($data));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		$result = curl_exec($ch);

		curl_close($ch);

		$data = json_decode($result,true);
		return $data['inventory']['id'];
	}

	public function getAllOrder(){
		$timezone =  Mage::getStoreConfig('general/locale/timezone');
		date_default_timezone_set($timezone);
		$date = time();
		$fromDate = date('Y-m-d H:i:s', strtotime('+2 hour' ,  $date ));
		$toDate = date('Y-m-d H:i:s', strtotime('+3 hour' ,  $date ));
		/* Get the collection */
		$orders = Mage::getModel('sales/order')->getCollection()
		->addAttributeToFilter('delivery_date', array('from'=>$fromDate, 'to'=>$toDate))
		;
		return $orders;
	}

	public function cronTask(){
		$orderIds = $this->getAllOrder();
		if($this->checkEnable() && count($orderIds)){
			foreach ($orderIds as $v) {
				if($v->getCronCheck() != 1){
					$inventoryData = array();
					$num= 1;
					$orderId = $v->getId();
					$customerId = $this->getCustomerID($orderId);
					$storeAddress = $this->getStoreAddress();
					$kitchenId = $this->getKitchenId();
					$butcherId = $this->getButcherId();
					$stockboyId = $this->getStockId();
					$driverId = $this->getDriverId();
					$title = '#'.$v->getRealOrderId();
					$scheduledAt = $v->getDeliveryDate();
					$timezone =  Mage::getStoreConfig('general/locale/timezone');
					date_default_timezone_set($timezone);
					$scheduledAt = str_replace(' ', 'T', $scheduledAt);
					$scheduledAt = date('c', strtotime($scheduledAt));
					$items = $v->getAllVisibleItems();
					foreach ($items as $i) {
						$productName = $i->getName();
						$productPrice = $i->getPrice();
						$productQty = number_format($i->getQtyOrdered());
						$sku = $i->getSku();
						if($this->getInventory($sku)){
							$inventoryId = $this->getInventory($sku);
						}else{
							$inventoryId = $this->createInventory($productName, $productPrice, $sku);
						}
						$inventoryData[$num]['id'] = $inventoryId;
						$inventoryData[$num]['quantity'] = $productQty;
						$num++;
					}

					$taskInventory = json_encode(array_values($inventoryData));
					
					$this->createTask($storeAddress, $stockboyId, $title, $scheduledAt, $taskInventory);
					$this->createTask($customerId, $driverId, $title, $scheduledAt, $taskInventory);

					if($this->getDeliInventory($orderId) != '[]'){
						$taskInventory = $this->getDeliInventory($orderId);
						$this->createTask($storeAddress, $butcherId, $title, $scheduledAt, $taskInventory);
					}
					if($this->getKitchenInventory($orderId) != '[]'){
						$taskInventory = $this->getKitchenInventory($orderId);
						$this->createTask($storeAddress, $kitchenId, $title, $scheduledAt, $taskInventory);
					}
					$v->setCronCheck('1');
					$v->save();
				}
				
			}
		}
		Mage::log(count($orderIds));
	}

}
