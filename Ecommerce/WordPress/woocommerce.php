<?php
// this code must go on the functions.php of your active theme
function enhanced_ecommerce_tracking( $order_id ){
	// Transaction details
	$order = wc_get_order( $order_id );
	$revenue = $order->get_subtotal();
	$currency = $order->get_currency();
	$transaction_id = $order->get_transaction_id();

	//User Data
	$phone = $order->get_billing_phone();
	$email = $order->get_billing_email();
	$first_name = $order->get_billing_first_name();
	$last_name  = $order->get_billing_last_name();
	$home_address  = $order->get_billing_address_1();
	$city       = $order->get_billing_city();
	$state      = $order->get_billing_state();
	$zipcode   = $order->get_billing_postcode();
	$country    = $order->get_billing_country();

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
        'send_to': 'AW-123235454/asdjlkasjMLSLKjalsk',
        'value': <?php echo $revenue; ?>,
        'currency': '<?php echo $currency; ?>',
        'transaction_id': '<?php echo $transaction_id; ?>'
    });
  </script>

  <?php

}

//Hook
add_action( 'woocommerce_thankyou', 'enhanced_ecommerce_tracking' );
