<?php
	//Add this code to your success.phtml file
	//Magento 2
	//Transaction details
	$objectManager =  \Magento\Framework\App\ObjectManager::getInstance();
    $order = $objectManager->create('Magento\Sales\Model\Order')->loadByIncrementId($block->getOrderId());

    $revenue = $order->getBaseGrandTotal();
	$currency = $order->getCurrentCurrencyCode();
	$transaction_id = $order->getIncrementId();

	//User Data
	$phone = $order->getBillingAddress()->getTelephone();
	$email = $order->getBillingAddress()->getEmail();
	$first_name = $order->getBillingAddress()->getFirstname();
	$last_name  = $order->getBillingAddress()->getLastname();
	$home_address  = $order->getBillingAddress()->getData('street');
	$city       = $order->getBillingAddress()->getCity();
	$state      = $order->getBillingAddress()->getRegion();
	$zipcode   = $order->getBillingAddress()->getPostcode();
	$country    = $order->getBillingAddress()->getCountryId();


	?>

	<script>
	//Enhanced data
	var enhanced_conversion_data = {
	    'first_name': '<?php echo $first_name; ?>',
	    'last_name': '<?php echo $last_name; ?>',
	    'email' = '<?php echo $email; ?>',
	    'phone_number' = '<?php echo $phone; ?>',
	    'home_address': {
	      'street': '<?php echo $home_address; ?>',
	      'city': '<?php echo $city; ?>',
	      'region': '<?php echo $state; ?>',
	      'postal_code': '<?php echo $zipcode; ?>',
	      'country': '<?php echo $country; ?>'
	    }
	};
	</script>


	<script>
    gtag('event', 'conversion', {
        'send_to': 'AW-1234556/skalsSDASslas',
        'value': <?php echo $revenue; ?>,
        'currency': '<?php echo $currency; ?>',
        'transaction_id': '<?php echo $transaction_id; ?>'
    });
  </script>