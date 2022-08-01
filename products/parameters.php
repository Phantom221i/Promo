<?php
$product_id = stripslashes( htmlspecialchars( $_POST[ 'product_id' ] ) );
$promo_id = stripslashes( htmlspecialchars( $_POST[ 'promo_id' ] ) );

function generate_country_code()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { $ip= $_SERVER['HTTP_CLIENT_IP']; }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip=$_SERVER['HTTP_X_FORWARDED_FOR']; }
    else { $ip=$_SERVER['REMOTE_ADDR']; }

    if (filter_var($ip, FILTER_VALIDATE_IP)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            $output_countryCode = @$ipdat->geoplugin_countryCode;
            return strtolower($output_countryCode);
        }
    }
    return 'at';
}


require_once dirname(__FILE__) . '/OmniApi3/OmniApi_User_03.php';

$prices = json_decode('["39","44","49","54"]', true);
$price = $prices[rand(0, count($prices) - 1)];

if(!empty($_POST))
{
    /** @var OmniApi_User_03 $api */
    $api = OmniApi_User_03::init()
        ->setToken('jO9UFp24JA3skZt0rZGsQH')
        ->setSecret('v2RTLLW1xJro4rVEXC8DaU');

    $fio = !empty($_POST['order']['fio']) ? $_POST['order']['fio'] : '';
    $phone = !empty($_POST['order']['phone']) ? $_POST['order']['phone'] : '';
    $country = generate_country_code();
    $country = !empty($_POST['order']['country']) ? $_POST['order']['country'] : $country;
    $country = !empty($_POST['current_country']) ? $_POST['current_country'] : $country;
    $discount = !empty($_POST['order']['discount']) ? $_POST['order']['discount'] : '';
    $timezone = !empty($_POST['order']['timezone']) ? $_POST['order']['timezone'] : '';

    /** @var OmniApiCreateOrder $entity */
    $entity = $api->initCreateOrder()
        ->setSpecialPrice('1')
        ->setProductId($product_id)
        ->setPayAction('confirmed')
        ->setTrafficFlowId(44393)
        ->setCountry($country)
        ->setPrice($price)
        ->setFio($fio)
        ->setDiscount($discount)
        ->setTimezone($timezone)
        ->setPromoLanguage('eng')
        ->setPromoId($promo_id)
        ->setPhone($phone)
        ->setPbid($_POST['pbid']);

    $response = $api->request($entity);

    header('Content-Type: application/json');
    if($response['success']){
        print(json_encode([
            'order_created' => [
                'phone' => $phone,
                'fio' => $fio,
                'country' => $country
            ]
        ]));
    } else {
        $error = 'l_pl55';
        $responseErrorKeys = array_keys($response['error']);
        $errorCode = $responseErrorKeys[0];
        if($errorCode == '203103') $error = 'l_pl1';
        if($errorCode == '203104') $error = 'l_pl53';
        if($errorCode == '203109') $error = 'l_pl7';
        print(json_encode([
            'order_created' => [
                'error' => $error,
                'country' => $country
            ]
        ]));
    }
    exit;
}

?>