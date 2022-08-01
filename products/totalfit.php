<?php include "parameters.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Totalfit - slimming cocktail</title>
</head>
<body>
<script type="text/javascript" src="add/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="add/js/jquery.blockUI.min.js"></script>
<script type="text/javascript" src="add/js/promo_widgets_v2.js"></script>
<link type="text/css" rel="stylesheet" href="add/css/promo_v2.css">
<script type="text/javascript" src="add/js/promo_v2.js"></script>
<script>
    window.current_country = '<?= generate_country_code(); ?>';
    $(function(){
        $('body').lFunctions({"p_spacer_comeback_form":"none","price":"<?=$price?>","is_preview":true,"script_is_active":true,"is_mobile":false,"is_adaptive":true,"is_one_rub":false,"is_free":true,"is_universal":true,"special_price":0,"next_url":"","in_frame":false,"protocol":"http","cyr_city":"","clean_domain":"","web_counters":[],"comebacker_allowed":false,"s_page":"spacer","s_country":"<?= generate_country_code(); ?>","country":"<?= generate_country_code(); ?>","s_avaliable_countries":["it","es","pl","de","bg","ro","cz","lv","lt","ee","sk","at","hu","gr","cy","pt","fr","hr"],"s_language":"rus","s_currency":"EUR","s_collected":true,"version":"2.07","is_subscribe":true,"subscribe_url":"success.php","country_settings":{"it":{"offer_id":"111","country":"it","price":"39.00","currency":"EUR","currency_name":"€","currency_short_name":"€","currency_tiny_name":"€"},"es":{"offer_id":"112","country":"es","price":"39.00","currency":"EUR","currency_name":"€","currency_short_name":"€","currency_tiny_name":"€"},"pl":{"offer_id":"113","country":"pl","price":"199.00","currency":"PLN","currency_name":"zł","currency_short_name":"zł","currency_tiny_name":"zł"},"de":{"offer_id":"114","country":"de","price":"39.00","currency":"EUR","currency_name":"€","currency_short_name":"€","currency_tiny_name":"€"},"bg":{"offer_id":"115","country":"bg","price":"79.00","currency":"BGN","currency_name":"Лв.","currency_short_name":"Лв.","currency_tiny_name":"Лв."},"ro":{"offer_id":"147","country":"ro","price":"199.00","currency":"RON","currency_name":"lei","currency_short_name":"lei","currency_tiny_name":"lei"},"cz":{"offer_id":"187","country":"cz","price":"999.00","currency":"CZK","currency_name":"Kč","currency_short_name":"Kč","currency_tiny_name":"Kč"},"lv":{"offer_id":"188","country":"lv","price":"39.00","currency":"EUR","currency_name":"€","currency_short_name":"€","currency_tiny_name":"€"},"lt":{"offer_id":"189","country":"lt","price":"39.00","currency":"EUR","currency_name":"€","currency_short_name":"€","currency_tiny_name":"€"},"ee":{"offer_id":"213","country":"ee","price":"39.00","currency":"EUR","currency_name":"€","currency_short_name":"€","currency_tiny_name":"€"},"sk":{"offer_id":"283","country":"sk","price":"39.00","currency":"EUR","currency_name":"€","currency_short_name":"€","currency_tiny_name":"€"},"at":{"offer_id":"357","country":"at","price":"39.00","currency":"EUR","currency_name":"€","currency_short_name":"€","currency_tiny_name":"€"},"hu":{"offer_id":"358","country":"hu","price":"13499.00","currency":"HUF","currency_name":"Ft","currency_short_name":"Ft","currency_tiny_name":"Ft"},"gr":{"offer_id":"359","country":"gr","price":"39.00","currency":"EUR","currency_name":"€","currency_short_name":"€","currency_tiny_name":"€"},"cy":{"offer_id":"360","country":"cy","price":"39.00","currency":"EUR","currency_name":"€","currency_short_name":"€","currency_tiny_name":"€"},"pt":{"offer_id":"361","country":"pt","price":"39.00","currency":"EUR","currency_name":"€","currency_short_name":"€","currency_tiny_name":"€"},"fr":{"offer_id":"363","country":"fr","price":"39.00","currency":"EUR","currency_name":"€","currency_short_name":"€","currency_tiny_name":"€"},"hr":{"offer_id":"449","country":"hr","price":"299.00","currency":"HRK","currency_name":"kn","currency_short_name":"kn","currency_tiny_name":"kn"}}});
    });
</script>
<script src="add/inputmask_4_x/jquery.inputmask.bundle.min.js"></script>
<script src="add/inputmask_4_x/inputmask/phone-codes/phone.at.js?v=13"></script>
<script type="text/javascript" src="add/js/localization/eng.js?v=13"></script>
<div class="container">
    <?php include '../header.php'; ?>

    <div class="container d-flex align-items-center w-100" style="min-height: 87.1vh">
        <div class="row d-flex justify-content-center w-100">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"><img id="product" src="../src/img/products/correct/totalfit.png" /> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">

                            <div class="mt-4 mb-3">
                                <h3 class="text-uppercase fs-48 fw-bold">Totalfit</h3>
                            </div>
                            <p class="about fs-5 fs-2 fs-bold">Totalfit - slimming cocktail</p>
                            <form action="" class="mw-500" method="POST">
                                <input type="hidden" name="product_id" value="123">
                                <input type="hidden" name="promo_id" value="6707">

                                <div class="form-group mb-24">
                                    <select name="order[country]" id="country" class="input-roulette form-control">
                                        <option value='at'>Austria</option>
                                        <option value='bg'>Bulgaria</option>
                                        <option value='cy'>Cyprus</option>
                                        <option value='cz'>Czech Republic</option>
                                        <option value='de'>Germany</option>
                                        <option value='ee'>Estonia</option>
                                        <option value='es'>Spain</option>
                                        <option value='fr'>France</option>
                                        <option value='gr'>Greece</option>
                                        <option value='hr'>Croatia</option>
                                        <option value='hu'>Hungary</option>
                                        <option value='it'>Italy</option>
                                        <option value='lt'>Lithuania</option>
                                        <option value='lv'>Latvia</option>
                                        <option value='pl'>Poland</option>
                                        <option value='pt'>Portugal</option>
                                        <option value='ro'>Romania</option>
                                        <option value='sk'>Slovakia</option>
                                    </select>
                                </div>
                                <div class="form-group mb-24">
                                    <input type="text" class="input-roulette form-control" name="order[fio]" placeholder="Your name">
                                </div>
                                <div class="form-group mb-24">
                                    <input type="tel" class="input-roulette form-control" name="order[phone]" id="phoneNumber" placeholder="Your phone number">
                                </div>
                                <center><button name="submit" class="submit-roulette btn btn-primary" type="submit" onclick="$(this).closest('form').submit();return false;">GET</button></center>
                                <input type="hidden" name="order[specifications]" value="" />
                                <input type="hidden" name="order[discount]" value="">
                                <input type="checkbox" name="order[address_info]" class="pl_field_address_info">
                                <input type="hidden" name="order[advHash]" class="advHash">
                                <input type="hidden" name="pbid" value="<?=!empty($_GET['pbid']) ? $_GET['pbid'] : '';?>"></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<footer class="bg-gray-800 pt-48 pb-48">
    <div class="container">
        <p class="mb-0 fs-5 text-white text-center">© 2022. All Rights Reserved</p>
    </div>
</footer>
</body>
<div id="plOrderCreatedModal" class="pl_modal pl_hidden">
    <div class="pl_modal_dialog">
        <div class="pl_modal_content">
            <a href="#" class="ps-icon-cross popup-close"></a>
            <div class="pl_modal_header" l-loc="l_pl10">
                Подтвердите, что номер указан правильно:
            </div>
            <div class="pl_modal_body">
                <div class="pl_modal_phone"></div>
            </div>
            <div class="pl_modal_footer">
                <button class="pl_btn pl_btn_success" l-loc="l_pl11">ДА</button>
                <button class="pl_btn pl_btn_danger" l-loc="l_pl12">НЕТ</button>
            </div>
        </div>
    </div>
</div>
<script>
    (function(){let currentCountry='<?= generate_country_code(); ?>';$('[pl-country="'+currentCountry+'"]').each(function(){if($(this).attr('pl-src')){let src=$(this).attr('pl-src');$(this).attr('src',src);$(this).removeAttr('pl-src');}});$('[pl-country="'+currentCountry+'"]').find('[pl-src]').each(function(){let src=$(this).attr('pl-src');$(this).attr('src',src);$(this).removeAttr('pl-src');});})();
</script>
<div id="plDuplicateOrderModal" class="pl_modal pl_hidden">
    <div class="pl_modal_dialog">
        <div class="pl_modal_content">
            <a href="#" class="ps-icon-cross popup-close"></a>
            <div class="pl_modal_header">
                <h4 class="pl_modal_title">
                    -
                </h4>
            </div>
            <div class="pl_modal_body">
                -
            </div>
            <div class="pl_modal_footer">
                <button class="pl_btn pl_btn_success">ОК</button>
            </div>
        </div>
    </div>
</div>
<div id="plErrorModal" class="pl_modal pl_hidden">
    <div class="pl_modal_dialog">
        <div class="pl_modal_content">
            <a href="#" class="ps-icon-cross popup-close"></a>
            <div class="pl_modal_header">
                <h4 class="pl_modal_title">
                    -
                </h4>
            </div>
            <div class="pl_modal_body">
                -
            </div>
            <div class="pl_modal_footer">
                <button class="pl_btn pl_btn_danger">ОК</button>
            </div>
        </div>
    </div>
</div>
<div id="plSpecialModal" class="pl_modal pl_hidden">
    <div class="pl_modal_dialog">
        <div class="pl_modal_content">
        </div>
    </div>
</div>
<div class="pl_modal_backdrop pl_hidden"></div>
<script src="../dist/js/scripts.js"></script>
</html>