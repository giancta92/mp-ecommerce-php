 <?php
	header('HTTP/1.1 200 OK');
	$data = file_get_contents('php://input');
	$data = json_decode($data, true);
	$data = wp_unslash($data);
	if ( empty( $data ) ) {
		die( __( 'Empty Data', 'charitable' ) );
	}
	MercadoPago\SDK::setAccessToken("APP_USR-8208253118659647-112521-dd670f3fd6aa9147df51117701a2082e-677408439");

	switch($_POST["type"]) {
		case "payment":
			$payment = MercadoPago\Payment.find_by_id($_POST["id"]);
			break;
		case "plan":
			$plan = MercadoPago\Plan.find_by_id($_POST["id"]);
			break;
		case "subscription":
			$plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
			break;
		case "invoice":
			$plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
			break;
	}
	error_log( print_r( $payment, true ) );
?>