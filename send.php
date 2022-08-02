<?php
$partner = "omni";


$name = stripslashes( htmlspecialchars( $_POST['order']['fio'] ) );
$phone = stripslashes( htmlspecialchars( $_POST['order']['phone'] ) );
$price = stripslashes( htmlspecialchars( $_POST[ 'price' ] ) );
$special_price = stripslashes( htmlspecialchars( $_POST[ 'special_price' ] ) );

$sub1 = stripslashes( htmlspecialchars( $_POST[ 'sub1' ] ) );
$sub2 = stripslashes( htmlspecialchars( $_POST[ 'sub2' ] ) );
$sub3 = stripslashes( htmlspecialchars( $_POST[ 'sub3' ] ) );
$sub4 = stripslashes( htmlspecialchars( $_POST[ 'sub4' ] ) );
$sub5 = stripslashes( htmlspecialchars( $_POST[ 'sub5' ] ) );
$sid4 = stripslashes( htmlspecialchars( $_POST[ 'sid4' ] ) );
$flow = stripslashes( htmlspecialchars( $_POST[ 'flow' ] ) );
$offer = stripslashes( htmlspecialchars( $_POST[ 'offer' ] ) );
$product_name = stripslashes( htmlspecialchars( $_POST[ 'product_name' ] ) );
$landing = stripslashes( htmlspecialchars( $_POST[ 'landing' ] ) );
$referrer = stripslashes( htmlspecialchars( $_POST[ 'referrer' ] ) );
$s_country = stripslashes( htmlspecialchars( $_POST[ 's_country' ] ) );
$country = stripslashes( htmlspecialchars( $_POST[ 'country' ] ) );
$country_select = stripslashes( htmlspecialchars( $_POST[ 'country_select' ] ) );
$pxl = stripslashes( htmlspecialchars( $_POST[ 'pxl' ] ) );
$city = stripslashes( htmlspecialchars( $_POST[ 'city' ] ) );
$product_id = stripslashes( htmlspecialchars( $_POST[ 'product_id' ] ) );
$promo_language = stripslashes( htmlspecialchars( $_POST[ 'promo_language' ] ) );

function getIPAddress() {
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    elseif(!empty($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    else {
        $ip = '94.219.203.89';
    }
    return $ip;
}

function WriteOrders($name, $phone, $country, $product_name, $partner) {
    $date = date("d-m-Y H:i");
    $binom_version = stripslashes( htmlspecialchars( $_POST[ 'binom_version' ] ) );
    $data = $date . ';' . $name . ';' . $phone . ';' . $country . ';' . $product_name . ';' . $partner . ';' . $binom_version . ';' . PHP_EOL;
    $myfile = fopen("orders_log.csv", "a") or die("Unable to open file!");
    fwrite($myfile, $data);
    fclose($myfile);
}


if ( !empty( $phone ) ) {
    switch ( $partner ) {
        case "omni":
            require_once dirname(__FILE__) . '/OmniApi3/OmniApi_User_03.php';
            if (!empty($_POST)) {
                /** @var OmniApi_User_03 $api */
                $api = OmniApi_User_03::init()
                    ->setToken('N79hcxTpjYimTKHE5YnTmO')
                    ->setSecret('zKtIm0n1c9gFf9mTLHSWlA');

                $discount = !empty($_POST['order']['discount']) ? $_POST['order']['discount'] : '';
                $timezone = !empty($_POST['order']['timezone']) ? $_POST['order']['timezone'] : '';

                $country_log = $country;
                if ($country == 'rueu') {
                    $country = '';
                }


                /** @var OmniApiCreateOrder $entity */
                $entity = $api->initCreateOrder()
                    ->setSpecialPrice($special_price)
                    ->setProductId($product_id)
                    ->setPayAction('confirmed')
                    ->setTrafficFlowId($flow)
                    ->setCountry($country)
                    ->setPrice($price)
                    ->setFio($name)
                    ->setDiscount($discount)
                    ->setTimezone($timezone)
                    ->setPromoLanguage('eng')
                    ->setPbid($sub1)
                    ->setPhone($phone);

                $response = $api->request($entity);

                header('Content-Type: application/json');
                if ($response['success']) {
                    print(json_encode([
                        'order_created' => [
                            'phone' => $phone,
                            'fio' => $name,

                        ]
                    ]));
                    WriteOrders($name, $phone, $country_log, $product_name, $partner);
                } else {
                    $error = 'l_pl55';
                    $responseErrorKeys = array_keys($response['error']);
                    $errorCode = $responseErrorKeys[0];
                    if ($errorCode == '203103') $error = 'l_pl1';
                    if ($errorCode == '203104') $error = 'l_pl53';
                    if ($errorCode == '203109') $error = 'l_pl7';
                    print(json_encode([
                        'order_created' => [
                            'error' => $error,
                            '$response' => $response,
                            'country' => $country
                        ]
                    ]));
                }
                exit;
            }

            break;

    }


} else {
    switch ( $country ) {
        case "en":
            echo "Something went wrong, please fill out all the fields";
            sleep( 3 );
            header( 'location:' . $_SERVER[ 'HTTP_REFERER' ] );

            break;
        case "ru":
            echo "Что-то пошло не так, заполните все поля формы";
            sleep( 3 );
            header( 'location:' . $_SERVER[ 'HTTP_REFERER' ] );
            break;
        default:
            echo "Something went wrong, please fill out all the fields";
            sleep( 3 );
            header( 'location:' . $_SERVER[ 'HTTP_REFERER' ] );
    }
}

?>
