<?php

class OmniApiVisualizer
{
    public static $errorMessages = array(
        203103 => 'Вы не заполнили поле "Телефон"',
        203104 => 'Поле "Телефон" заполнено неверно',
        203109 => 'Уважаемый клиент, вы создали дубликат заказа. Если у вас есть необходимость внести корректировку в первоначальный заказ, дождитесь, пожалуйста, звонка от менеджера по логистике и вы сможете внести необходимые корректировки.',
        203108 => 'Извините, доставка в Вашу страну не осуществляется',
        203105 => 'Извините, доставка в Вашу страну не осуществляется'
    );

    public static $defaultErrorMessage = 'Обратитесь в поддержку. Код ошибки: ';
    public static $defaultSuccessMessage = 'Операция прошла успешно';
    public static $orderSuccessMessage = ' Спасибо за заказ, в ближайшее время  наш менеджер свяжется с Вами!';

    public static function error($message)
    {
        self::style();
        print <<<END
<div id="error" class="message"> <a id="close" title="Закрыть" href="#" onClick="document.getElementById('error').setAttribute('style','display: none;');">&times;</a> <span>Ошибка!</span> {$message}</div>
END;
    }

    public static function debug($message)
    {
        self::style();
        print <<<END
<div id="warning" class="message"> <a id="close" title="Закрыть" href="#" onClick="document.getElementById('warning').setAttribute('style','display: none;');">&times;</a> <span>Режим отладки включен!</span> {$message}</div>
END;
    }

    public static function information($message)
    {
        self::style();
        print <<<END
<div id="info" class="message"> <a id="close" title="Закрыть" href="#" onClick="document.getElementById('info').setAttribute('style','display: none;');">&times;</a> <span>Важно!</span> {$message}</div>
END;
    }

    public static function success($message)
    {
        self::style();
        print <<<END
<div id="success" class="message"> <a id="close" title="Закрыть" href="#" onClick="document.getElementById('success').setAttribute('style','display: none;');">&times;</a> <span>Поздравляем!</span> {$message}</div>
END;
    }

    private static $styleAddedd = false;

    private static function style()
    {
        if(self::$styleAddedd){
            return false;
        } else {
            self::$styleAddedd = true;
        }

        print <<<END
<style> .message{ background-size: 40px 40px; background-image: -moz-linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%, transparent 75%, transparent); background-image: -webkit-linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%, transparent 75%, transparent); background-image: linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%, transparent 75%, transparent); box-shadow: 0 0 8px rgba(0,0,0,.3); font:16px 'Open Sans'; width: 85%; margin: 20px auto; padding:15px; -moz-animation: bg-animate 5s linear infinite; -webkit-animation: bg-animate 5s linear infinite; -ms-animation: bg-animate 5s linear infinite; animation: bg-animate 5s linear infinite; } .message span{font-weight:600;} .message #close{float:right; color:inherit; text-decoration:none;} .message#error{ background-color:tomato; border-left:7px #dc3d21 solid; color:white; } .message#warning{ background-color: #eaaf51; border-left:7px #df8b00 solid; color:#6b6d31; } .message#info{ background-color: #4ea5cd; border-left:7px #3b8eb5 solid; color:#beecfc; } .message#success{ background-color: #61b832; border-left:7px #55a12c solid; color:#296829; } @-webkit-keyframes bg-animate { from { background-position: 0 0; } to { background-position: -80px 0; } } @-moz-keyframes bg-animate { from { background-position: 0 0; } to { background-position: -80px 0; } } @keyframes bg-animate { from { background-position: 0 0; } to { background-position: -80px 0; } }</style>
END;
    }
}