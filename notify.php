 <?php
    MercadoPago\SDK::setAccessToken("APP_USR-8208253118659647-112521-dd670f3fd6aa9147df51117701a2082e-677408439");

    switch($_POST["type"]) {
        case "payment":
            $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
            break;
    }
?>