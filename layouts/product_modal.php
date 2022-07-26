<?php
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
}?>
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog mw-624">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">New message</h5>
                <button type="button" class="btn-close p-4 bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close">✖</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col col-md-6">
                        <img src="" alt="product">
                    </div>
                    <div class="col col-md-6">
                        <form action="send.php" class="mw-500" method="POST">
                            <input type="hidden" name="product_name" value="">
                            <input type="hidden" name="special_price" value="">
                            <input type="hidden" name="product_id" value="">
                            <input type="hidden" name="flow" value="">
                            <input type="hidden" name="country" value="<?= generate_country_code() ?>">
                            <input type="hidden" name="price" value="">

                            <div class="form-group mb-24">
                                <input type="text" class="input-roulette form-control" name="order[fio]" placeholder="Your name">
                            </div>
                            <div class="form-group mb-24">
                                <input type="tel" class="input-roulette form-control" name="order[phone]" id="phoneNumber" placeholder="Your phone number">
                            </div>
                            <center><button name="submit" class="submit-roulette btn btn-primary" type="submit">GET</button></center>
                            <input type="hidden" name="order[specifications]" value="" />
                            <input type="hidden" name="order[discount]" value="">
                            <input type="hidden" name="order[advHash]" class="advHash">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>