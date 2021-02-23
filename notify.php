 <?php
 /*
	header('HTTP/1.1 200 OK');
	$data = file_get_contents('php://input');
	$data = json_decode($data, true);
	if ( empty( $data ) ) {
		die;
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
*/
//public function webhook() {


			$data = file_get_contents('php://input');
			$data = json_decode($data, true);
			//error_log( print_r( $_GET, true ) );
			if ( empty( $data ) ) {
				die( __( 'Empty Data', 'charitable' ) );
			}
				require __DIR__ .  '/sdk-mp/vendor/autoload.php';
				MercadoPago\SDK::setAccessToken("APP_USR-8208253118659647-112521-dd670f3fd6aa9147df51117701a2082e-677408439");
				MercadoPago\SDK::setIntegratorId(getenv('dev_2e4ad5dd362f11eb809d0242ac130004'));
			    $merchant_order = null;

			    switch($_GET["topic"]) {
			        case "payment":
			            $payment = MercadoPago\Payment::find_by_id($_GET["id"]);
			            // Get the payment and the corresponding merchant_order reported by the IPN.
			            $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);
			            break;
			        case "merchant_order":
			            $merchant_order = MercadoPago\MerchantOrder::find_by_id($_GET["id"]);
			            break;
			    }
			    $jsonmo = json_encode($merchant_order);
    error_log( print_r( $jsonmo, true ) );
//}

?>