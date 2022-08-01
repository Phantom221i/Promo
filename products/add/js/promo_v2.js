(function($){var detectedGEOCity='';var ajaxRetryConfig={tryCount:0,retryLimit:3,retryDelay:3000,success:function(json){},error:function(xhr,textStatus,errorThrown){this.tryCount++;if(this.tryCount<this.retryLimit){setTimeout(function(_this){$.ajax(_this)},this.retryDelay,this);}}};var serialize=function(form){var data=form.serializeArray();var post_data={};for(var i=0;i<data.length;i++){val=data[i];if(val.name.indexOf('[]')!=-1){if(val.value){if(!post_data[val.name.replace('[]','')]){post_data[val.name.replace('[]','')]=[];post_data[val.name.replace('[]','')].push(val.value);}}}else{if(val.value){post_data[val.name]=val.value;}}}
    return post_data;}
    var openModal=function(selector){$('.pl_modal').addClass('pl_hidden');$('.pl_modal_backdrop').removeClass('pl_hidden');$(selector).removeClass('pl_hidden');return false;};var closeModal=function(){$('.pl_modal').addClass('pl_hidden');$('.pl_modal_backdrop').addClass('pl_hidden');return false;};var cleanForm=function(form){form.find('.pl_has_field_error').removeClass('pl_has_field_error');form.find('.pl_field_error').removeClass('pl_field_error');form.find('.pl_form_error').remove();return false;};var errorMessage=function(phoneEl,msg)
    {if(phoneEl.closest('.pl_modal').length){phoneEl.parent().addClass('pl_has_field_error');phoneEl.addClass('pl_field_error');var errorEl=$('<div></div>').text(msg).addClass('pl_form_error');phoneEl.after(errorEl);}else{$('#plErrorModal').find('.pl_modal_title').text('');$('#plErrorModal').find('.pl_modal_body').text(msg);openModal('#plErrorModal');}
        return false;}
    var initDmp=function(){(function(a,b,c,d,e,f,g){a['iDMPObject']={DMPData:true};a[e]=function(k,v){if(k==='match'){k='autoMatch';v=true;}
        a['iDMPObject'][k]=v;};f=b.createElement(c);f.id='iDMPFrame';f.src=d;f.style.width=0;f.style.height=0;f.style.border='none';f.style.visibility='hidden';f.style.position='fixed';f.style.right='200%';f.addEventListener("load",function(){if((typeof window.iDMPObject.autoMatch==='undefined')||(window.iDMPObject.autoMatch===true)){var frame=document.getElementById('iDMPFrame');frame=frame.contentWindow||frame;frame.postMessage(JSON.stringify(window.iDMPObject),"*");}
        window.iDMPData=Object.assign({},window.iDMPObject);window[e]=function(){if(arguments[0]==='match'){window.iDMPData.autoMatch=true;var frame=document.getElementById('iDMPFrame');frame=frame.contentWindow||frame;frame.postMessage(JSON.stringify(window.iDMPData),"*");}
            window.iDMPData[arguments[0]]=arguments[1];};});document.body.appendChild(f);window.addEventListener("message",function(event){if(event.data==='DMPClientDataReady'){document.dispatchEvent(new CustomEvent('DMPClientDataReady',{bubbles:true,detail:{},}));}});})(window,document,'iframe','//pixel.metrics0.com/frame.html','idmps');idmps('clientId','eewmw1jvoghxr6eewnp1jvogmtik');idmps('accuracy',2);idmps('autoMatch',false);}
    var detectGEOCity=function(callback,ip){if(detectedGEOCity=='busy')
    {var count=0;var interval=setInterval(function(){if(detectedGEOCity&&detectedGEOCity!='busy'){callback(detectedGEOCity);clearInterval(interval);}else if(count>30){clearInterval(interval);}
        count++;},100);}
    else if(detectedGEOCity)
    {callback(detectedGEOCity);}
    else
    {detectedGEOCity='busy';jQuery.ajax({type:"GET",url:"http://ipgeobase.ru:7020/geo/?ip="+ip,dataType:"xml",success:function(xml){var region=jQuery(xml).find('city').text();var country=jQuery(xml).find('country').text();if(region)
        {detectedGEOCity=region;callback(region);}
        else
        {switch(country){case'KZ':detectedGEOCity="Астана";break;default:detectedGEOCity="Москва";}}
            callback(detectedGEOCity);},error:function(){detectedGEOCity="Москва";callback(detectedGEOCity);}});}}
    var sendDStat=function(){var screen=window.screen;var timezone=detectTimezone();var conf=jQuery.extend({url:"/dStat",type:"POST",data:{width:typeof screen!='undefined'?screen.width:'',timezone:typeof timezone!='undefined'?timezone:''}},ajaxRetryConfig);$.ajax(conf);}
    var sendAddInfo=function(data){var conf=jQuery.extend({url:"/addInfo",type:"GET",data:data},ajaxRetryConfig);$.ajax(conf);}
    var sendAddStat=function(success){var conf=jQuery.extend({url:"/addStat",type:"GET"},ajaxRetryConfig);conf.success=success;$.ajax(conf);}
    var createOrder=function(success,error,data){var conf=jQuery.extend({url:window.orderPath,type:"POST",data:data},ajaxRetryConfig);conf.success=success;conf.error=error;$.ajax(conf);}
    var sendGetP=function(success){var conf=jQuery.extend({url:"/getP",type:"POST"},ajaxRetryConfig);conf.success=success;$.ajax(conf);}
    var detectTimezone=function()
    {var timezone=false;if(typeof Intl!='undefined'&&typeof Intl.DateTimeFormat!='undefined'){timezone=Intl.DateTimeFormat().resolvedOptions().timeZone;}
        if(!timezone){if(typeof Date!='undefined'){var date=new Date();var offset=date.getTimezoneOffset();if(typeof offset=='number'){if(offset>0){timezone='Etc/GMT+'+Math.abs(offset / 60);}else if(offset<0){timezone='Etc/GMT-'+Math.abs(offset / 60);}else{timezone='Etc/GMT-0';}}}}
        return timezone;}
    var pluralForm=function(number,one,two,five)
    {number=number%100;if(number>19){number=number%10;}
        switch(number){case 1:{return one;}
            case 2:case 3:case 4:{return two;}
            default:{return five;}}}
    var orderCreated=function(config)
    {if(typeof config.web_counters.fb!='undefined'){fbq('track','Lead');}
        var yandexMetrika=false;if(config.s_ym){yandexMetrika=config.s_ym;}else if(typeof config.web_counters.yandex!='undefined'){yandexMetrika=config.web_counters.yandex;}
        var yandexMetrikaTimeout=false;if(yandexMetrika){yandexMetrikaTimeout=setTimeout(function(){if(typeof yaCounter!='undefined'){yaCounter.reachGoal('orderCreated');yandexMetrikaTimeout=false;}},3000);}
        if(config.order_created.error)
        {$('#plErrorModal').find('.pl_modal_title').text('');$('#plErrorModal').find('.pl_modal_body').text(window.l_loc[config.order_created.error]);openModal('#plErrorModal');}
        else
        {if(typeof esk!='undefined'){esk('track','Conversion');}
            openModal('#plOrderCreatedModal');$('#plOrderCreatedModal .pl_modal_phone').text(config.order_created.phone);$('#plOrderCreatedModal .pl_btn_success').click(function(){if(yandexMetrika&&typeof yaCounter!='undefined'&&yandexMetrikaTimeout){yaCounter.reachGoal('orderCreated');clearTimeout(yandexMetrikaTimeout);}
            sendAddInfo({right:1});if(config.is_subscribe){var query='';if(window.pxlFB){query+='?pxl='+window.pxlFB;}
                if(typeof config.subscribe_url!='undefined'&&config.subscribe_url){location.href=config.subscribe_url+query;}else{location.href="/subscribe"+query;}}else{$('#plDuplicateOrderModal').find('.pl_modal_title').text('');$('#plDuplicateOrderModal').find('.pl_modal_body').text(window.l_loc.l_pl9);openModal('#plDuplicateOrderModal');}
            return false;});$('#plOrderCreatedModal .pl_btn_danger').click(function(){if(yandexMetrika&&typeof yaCounter!='undefined'&&yandexMetrikaTimeout){yaCounter.reachGoal('orderCreated');clearTimeout(yandexMetrikaTimeout);}
            sendAddInfo({right:0});closeModal();setTimeout(function(){$('input[name="order[phone]"]:first').focus();},500);return false;});}}
    var makeLocalization=function(config)
    {function prepareLoc(plc)
    {var text=window.l_loc[plc];text=text.replace('{{discount_price}}',parseInt(config.p_unload_price)+parseInt(config.p_old_price));text=text.replace('{{currency}}',config.s_currency);text=text.replace('{{unload_price}}',config.p_unload_price);if(text===undefined||!text){text='-- NO TRANSLATION --';}
        return text;}
        $('[l-loc]').each(function(key,el){var plc=$(el).attr('l-loc');html=prepareLoc(plc);$(el).html(html);});$('[l-loc-value]').each(function(key,el){var plc=$(el).attr('l-loc-value');text=prepareLoc(plc);$(el).attr('value',text);});}
    var initTraps=function(config)
    {var traps_started=false;var startT=function()
    {if(!traps_started)
    {traps_started=true;$("body").append($('<script />').attr({src:config.protocol+'://'+document.domain+'/noload.js?page='+config.s_page,type:'text/javascript'}));var done=false
        $(document).scroll(function(){if(!done){done=true;sendAddInfo({scroll:1,page:config.s_page});}});function work(){sendAddInfo({time:1,page:config.s_page});}
        setTimeout(work,3000);}}
        var l_traps_started=false;var startInFrameT=function(e)
    {if(!l_traps_started)
    {l_traps_started=true;sendAddStat(startT);}
        $(this).off(e);}
        if(config.s_page=='spacer')
        {startT();}
        else
        {if(config.in_frame){$('body').mousemove(startInFrameT);$('body').click(startInFrameT);$('body').scroll(startInFrameT);}else{startT();}}}
    var initPhoneValidation=function(config)
    {$('form').attr('autocomplete','off');$('input').attr('autocomplete','false');var phone='';$(document).on('keyup','[name="order[phone]"]',function(){var clear_phone=$(this).val().replace(/[^0-9]/g,'');if(clear_phone.indexOf('789')===0)
    {var fixed_phone='79'+clear_phone.substr(3);$(this).val(fixed_phone);var form=$(this).closest('form');if(form.length&&!form.find('input[name="order[phone_fixed]"]').length)
    {$('<input/>').attr({'type':'hidden','name':'order[phone_fixed]'}).val(1).appendTo(form);}}});if(typeof config.novalidation=='undefined'){$(document).on('submit','form',function(){cleanForm($(this));var googleAnalytics=false;if(config.s_ga){googleAnalytics=config.s_ga;}else if(typeof config.web_counters.google!='undefined'){googleAnalytics=config.web_counters.google;}
        var yandexMetrika=false;if(config.s_ym){yandexMetrika=config.s_ym;}else if(typeof config.web_counters.yandex!='undefined'){yandexMetrika=config.web_counters.yandex;}
        if(googleAnalytics){ga('send','event','main','formSubmit');}
        if(yandexMetrika&&typeof yaCounter!='undefined'){yaCounter.reachGoal('formSubmit');}
        phoneEl=$(this).find('[name="order[phone]"]');phone=phoneEl.val();var clear_phone=phone.replace(/[^0-9]/g,'');if(phone.length==0)
        {return errorMessage(phoneEl,window.l_loc.l_pl1);}
        if(clear_phone.length<9)
        {return errorMessage(phoneEl,window.l_loc.l_pl4);}
        if(clear_phone.indexOf('7')===0||clear_phone.indexOf('8')===0){if(clear_phone.length<11)
        {return errorMessage(phoneEl,window.l_loc.l_pl4);}}
        if(clear_phone.length>14)
        {return errorMessage(phoneEl,window.l_loc.l_pl5);}
        if(!$(this).find('[name="order[timezone]"]').length)
        {var timezone=detectTimezone();if(timezone)
        {$('<input/>').attr({'type':'hidden','name':'order[timezone]'}).val(timezone).appendTo(this);}}
        $('body').block();createOrder(function(data){$('body').unblock();console.log(data);config.order_created=data.order_created;if(typeof config.order_created.phone!='undefined')
        {$('input[name="order[fio]"]').val(config.order_created.fio);$('input[name="order[phone]"]').val(config.order_created.phone);$('select[name="order[country]"]').val(config.order_created.country);$('#created-block-1').text(config.order_created.phone);}
            orderCreated(config);},function(){$('body').unblock();errorMessage(phoneEl,window.l_loc.l_pl54);},serialize($(this)));return false;});}}
    var spacerUrlReplace=function(config)
    {$('a').each(function(key,element){if(!$(element).hasClass('replace_ignoring')){$(element).attr('href',config.next_url);$(element).attr('target','_blank');}});}
    var pluralCurrencies=function(config)
    {$('.pl_product_currency[type="full"]').each(function(key,element){var maybePrice=$(element).siblings().filter(function(index){return $.isNumeric($(this).text());});var price=parseInt(maybePrice.text());if(!price){price=1;}
        if(price&&config.s_language=='rus'){switch(config.s_currency){case'RUB':$(element).text(pluralForm(price,'рубль','рубля','рублей'));break;}
            if($.inArray(config.s_country,['ru','kz','ua','by'])==-1){switch(config.s_currency){case'BGN':$(element).text(pluralForm(price,'лев','лева','левов'));break;case'GEL':$(element).text('лари');break;case'EUR':$(element).text('евро');break;case'KGS':$(element).text(pluralForm(price,'сом','сома','сомов'));break;case'MDL':$(element).text(pluralForm(price,'лей','лея','леев'));break;case'PLN':$(element).text(pluralForm(price,'злотый','злотых','злотых'));break;case'RON':$(element).text(pluralForm(price,'лей','лея','леев'));break;case'UZS':$(element).text(pluralForm(price,'сум','сума','сумов'));break;case'UZS':$(element).text(pluralForm(price,'сум','сума','сумов'));break;case'HUF':$(element).text('форинт');break;case'CZK':$(element).text(pluralForm(price,'крона','крон','крон'));break;}}}});}
    window.plShowCallBackForm=function(){cleanForm($('#plCallbackModal').find('form'));openModal('#plCallbackModal');return false;}
    var initLCallback=function(config)
    {var documentOutTimer=false;var documentOut=true;var prefix='';if(typeof config.p_unload_button!='undefined'&&config.p_unload_button=='on'){function startCheckForShowButton(){setInterval(function(){if(!$('#kmacb').is(':visible')&&!$('.pl_modal_backdrop').is(':visible')){$('#kmacb').show();}},1000);}
        var wait=parseInt(config.p_unload_delay);if(wait>0){setTimeout(function(){$('#kmacb').show();startCheckForShowButton()},wait*1000);}else{$('#kmacb').show();startCheckForShowButton()}}
        window.test_showMeCallBackMobileForm=function(){$('#ps-call-pc-form').hide();$('#ps-call-mobile-form').show();window.plShowCallBackForm();}
        window.test_showMeCallBackPcForm=function(){$('#ps-call-pc-form').show();$('#ps-call-mobile-form').hide();window.plShowCallBackForm();}
        if(typeof config.p_comeback_form!='undefined'&&config.p_comeback_form=='callme'){$(document).mouseleave(function(e){if($('#ps-popup-call').is(':hidden')&&documentOut){if(e.clientY<10){documentOutTimer=setTimeout(function(){documentOut=false;window.plShowCallBackForm();},500);}}});$(document).mouseenter(function(e){if($('#ps-popup-call').is(':hidden')){if(documentOutTimer){clearTimeout(documentOutTimer);}}});}
        $('#fancy-button-callback').click(function(){documentOut=false;if(!prefix){sendGetP(function(data){if(data.prefix){prefix=data.prefix.replace(/-/g,'').split('');prefix=prefix[0]+prefix[1]+prefix[2]+'-'+
            prefix[3]+prefix[4]+prefix[5]+'-'+
            prefix[6]+prefix[7]+prefix[8]+'-'+
            prefix[9]+prefix[10]+prefix[11]+'-'+
            prefix[12]+prefix[13];$('.prefix_value').text(prefix);$('.prefix_container').show();}});}
            openModal('#plCallbackModal');$('#kmacb').hide();return false;});};var getRandomInt=function(min,max)
    {return Math.floor(Math.random()*(max-min+1))+min;}
    var initLandingComebacker=function(config)
    {var landing_comebacker_started=false;var startLandingComebacker=function()
    {if(!landing_comebacker_started)
    {landing_comebacker_started=true;var fadeAnimate=function(element)
    {var opacity=$(element).css('opacity')==1?0.5:1;$(element).animate({opacity:opacity},300,function(){fadeAnimate(element);});}
        var changeColor=function(element,color)
        {$(element).css('color',color);color=color=='red'?'red':'#00a651';$(element).closest('.ps-diagramm').find('input').trigger('configure',{'fgColor':color});$(element).closest('.ps-diagramm').find('canvas').css('border','1px solid '+color);}
        var showForm=function()
        {openModal('#plComebackerModal');if($('#kmacb').length){$('#kmacb').hide();}
            var client_start=parseInt($('#ps-popup-sale-clients').text());var client_time_min=[3,12];var client_time_max=[10,22];var clientAnimate=function(){changeColor($('#ps-popup-sale-clients'),'red');var client=parseInt($('#ps-popup-sale-clients').text());var percent=(client-29)/(99-29);$("#ps-popup-sale-clients").closest('.ps-diagramm').fadeOut("slow",function(){$('#ps-popup-sale-clients').text(client+1);$('#ps-popup-sale-clients').closest('.ps-diagramm').find('input').val(client+1).trigger('change');changeColor($('#ps-popup-sale-clients'),'black');$("#ps-popup-sale-clients").closest('.ps-diagramm').fadeIn("slow",function(){if(client<999){if(client>99)$('#ps-popup-sale-clients').css('fontSize','20px');setTimeout(clientAnimate,getRandomInt(client_time_min[0]+((client_time_min[1]-client_time_min[0])*percent),client_time_max[0]+((client_time_max[1]-client_time_max[0])*percent))*1000);}});});}
            var start_goods=parseInt($('#ps-popup-sale-goods').text());var goods_time_min=[3,12];var goods_time_max=[10,22];var goodsAnimate=function(){changeColor($('#ps-popup-sale-goods'),'red');var goods=parseInt($('#ps-popup-sale-goods').text());var percent=1-(goods / start_goods);$('#ps-popup-sale-goods').closest('.ps-diagramm').fadeOut("slow",function(){$('#ps-popup-sale-goods').text(goods-1);$('.ps-landing-limit-left').text(goods-1);$('.p_limit_left_text').text(goods-1);if((goods-1)>4){$('#ps-popup-sale-goods-text').text(window.l_loc.l_pl17);}else if((goods-1)<=4&&(goods-1)>1){$('#ps-popup-sale-goods-text').text(window.l_loc.l_pl41);}else{$('#ps-popup-sale-goods-text').text(window.l_loc.l_pl42);}
            $('#ps-popup-sale-goods').closest('.ps-diagramm').find('input').val(goods+1).trigger('change');changeColor($('#ps-popup-sale-goods'),'black');$('#ps-popup-sale-goods').closest('.ps-diagramm').fadeIn("slow",function(){if(goods>2){setTimeout(goodsAnimate,getRandomInt(goods_time_min[0]+((goods_time_min[1]-goods_time_min[0])*percent),goods_time_max[0]+((goods_time_max[1]-goods_time_max[0])*percent))*1000);}else{changeColor($('#ps-popup-sale-goods'),'red');$('#ps-popup-sale-warning').show();fadeAnimate($('#ps-popup-sale-warning'));fadeAnimate($('#ps-popup-sale-goods').closest('.ps-diagramm'));}});});}
            setTimeout(clientAnimate,getRandomInt(client_time_min[0],client_time_max[0])*1000);setTimeout(goodsAnimate,getRandomInt(goods_time_min[0],goods_time_max[0])*1000);}
        window.onbeforeunload=function(){var suffix=$('.pl_product_price:first').attr('prefix');suffix=suffix?' '+suffix:'';$('.pl_product_price').text((parseInt(config.price)-parseInt(config.p_unload_price))+suffix);$('[name="order[discount]"]').val(config.p_unload_price);$('#onbeforeunload_block').show();window.onbeforeunload=null;window.comeBackerDone=true;$('#onbeforeunload_audio').get(0).play();var message=["******************************",window.l_loc.l_pl25,"******************************",window.l_loc.l_pl26,window.l_loc.l_pl27,window.l_loc.l_pl28].join("\n");if(navigator.userAgent)
        {if(navigator.userAgent.search(/Firefox/)>-1)
        {showForm();}
        else
        {setTimeout(showForm,500);}}
            setTimeout(function(){$('#onbeforeunload_block').hide();},500);return message;}}}
        if(config.in_frame){$('body').mousemove(startLandingComebacker);$('body').click(startLandingComebacker);$('body').scroll(startLandingComebacker);}else{startLandingComebacker();}
        $(window).resize(function(){var height=parseInt($(window).height());if(height){if(height<365){$('.hiddable').hide();}else{$('.hiddable').show();}}});}
    var initLDetectCity=function(config)
    {if(config.cyr_city)
    {$(document).ready(function(){var selector='.pl_landing_geo_detect';if($(selector).length>0)
    {$(selector).text(config.cyr_city);}});}
    else
    {$(document).ready(function(){var selector='.pl_landing_geo_detect';if($(selector).length>0){if(config.s_country=='kz'){$(selector).text('Астана');}
        if(config.s_country=='ru'){$(selector).text('Москва');}}});}}
    var initSDetectCity=function(config)
    {if(config.cyr_city)
    {$(document).ready(function(){var selector='.pl_spacer_geo_detect';if($(selector).length>0)
    {$(selector).text(config.cyr_city);}});}
    else
    {$(document).ready(function(){var selector='.pl_spacer_geo_detect';if($(selector).length>0)
    {if(config.s_country=='kz'){$(selector).text('Астана');}
        if(config.s_country=='ru'){$(selector).text('Москва');}}});}}
    var initSRedirrect=function(config)
    {var landingIframe='';var redirrectUrl='//'+config.clean_domain+'/?out=1&in=1';if(config.is_preview){redirrectUrl=config.next_url;}
        $(function(){landingIframe=$('<iframe></iframe>').css({width:'100%',height:'100%',top:'0px',left:'0px',bottom:'0px',right:'0px',position:'fixed',border:'none',display:'none'}).attr('id','s_comebacker_iframe').attr('src',redirrectUrl);landingIframe.appendTo('body');});$(function(){$('a').click(function(){window.onbeforeunload=null;});var documentOut=true;var documentOutTimer=false;var spacerCallBack=function(time)
    {$('#s_comebacker_block').show();$('#s_comebacker_audio').get(0).play();var message=["******************************",window.l_loc.l_pl25,"******************************",window.l_loc.l_pl29,window.l_loc.l_pl30,window.l_loc.l_pl31,].join("\n");window.onbeforeunload=null;documentOut=false;window.activityReport=undefined;landingIframe.show();jQuery('body').children().not('#s_comebacker_iframe').not('#s_comebacker_block').not('#s_comebacker_block_style').not('#s_comebacker_audio').remove();$('body').css('background','transparent');if(time){setTimeout(function(){$('#s_comebacker_block').hide();},time);}else{$(document).mouseenter(function(){$('#s_comebacker_block').hide();});}
        return message;}
        if(typeof window.onbeforeunload=='undefined')
        {$(document).mouseenter(function(e)
        {if($('#fancy-container-callback').is(':hidden'))
        {if(documentOutTimer)
        {clearTimeout(documentOutTimer);}}});$(document).mouseleave(function(e)
        {if($('#s_comebacker_block').is(':hidden')&&documentOut)
        {if(e.clientY<10)
        {$('#s_comebacker_block').find('img').attr('src','/img/wait5.png');documentOutTimer=setTimeout(function()
        {spacerCallBack(false);},500);}}});}
        else
        {window.onbeforeunload=function()
        {var message=spacerCallBack(500);return message;}}});}
    var initSSpecial=function(config)
    {var documentOutTimer=false;var documentOut=true;$(document).mouseleave(function(e){if($('#ps-popup-out-comebacker').is(':hidden')&&documentOut){if(e.clientY<10){documentOutTimer=setTimeout(function(){documentOut=false;$('#plSpecialModal').find('.pl_modal_content').append($('.out-comebacker-content'));openModal('#plSpecialModal');},500);}}});$(document).mouseenter(function(e){if($('#ps-popup-out-comebacker').is(':hidden')){if(documentOutTimer){clearTimeout(documentOutTimer);}}});$('#ps-popup-out-comebacker-close').click(function(){documentOut=false;});}
    var init=function(config)
    {$(".ps-dial-lg").knob();$(".ps-dial-sm").knob();$('.pl_modal_dialog').click(function(e){e.stopPropagation()});$('.pl_modal').click(closeModal);$('.pl_modal .popup-close').click(closeModal);$('#plDuplicateOrderModal').find('.pl_btn_success').click(closeModal);$('#plErrorModal').find('.pl_btn_danger').click(closeModal);$('.pl_scroll_to_target').click(function(){var target=$(this).attr('scroll-to');if(target){closeModal();$('html, body').animate({scrollTop:$(target).offset().top},500);}
        return false;});$('#ps-popup-out-comebacker').find('img').each(function(key,el){$(this).attr('src',$(this).data('src'));});if(!config.is_preview)
    {initDmp();}
        makeLocalization(config);if(config.s_page=='spacer'){if(typeof config.order_created=='undefined')
    {if((typeof config.p_spacer_unload_script!='undefined'&&config.p_spacer_unload_script=='on')||(typeof config.p_spacer_comeback_form!='undefined'&&config.p_spacer_comeback_form=='redirrect')){if(config.comebacker_allowed)
    {initSRedirrect(config);}}
        if(typeof config.p_spacer_comeback_form!='undefined'&&config.p_spacer_comeback_form=='special'){initSSpecial(config);}}
        initSDetectCity(config);}
        if(config.s_page=='landing')
        {if(typeof config.order_created=='undefined')
        {if(typeof config.p_comeback_form!='undefined')
        {if(config.p_comeback_form=='discount'&&!config.is_one_rub&&!config.is_free&&config.comebacker_allowed){initLandingComebacker(config);}
            initLCallback(config);}
            if(!config.comebacker_allowed||((config.p_comeback_form!='discount'&&typeof config.p_limit_left!='undefined'&&parseInt(config.p_limit_left)>1)&&(typeof config.p_vv=='undefined'||config.p_vv!='on'||config.p_vv_order!='on'))){let limit_left=parseInt(config.p_limit_left);let animateLimitLeft=function(){limit_left=limit_left-1;if(limit_left>0){$('.p_limit_left_text').text(limit_left);setTimeout(animateLimitLeft,getRandomInt(5,30)*1000);}}
                setTimeout(animateLimitLeft,getRandomInt(5,30)*1000);}}
            initLDetectCity(config);}
        if(config.s_page=='spacer'||config.s_page=='landing')
        {if(!config.is_preview){initTraps(config);}
            var $country=$('select[name="order[country]"]'),$phone=$('input[name="order[phone]"]'),$fio=$('input[name="order[fio]"]');if(config.s_country=='ru'||config.s_country=='kz')
        {$phone.val(config.phone_codes[config.s_country]);}
            $country.val(config.s_country);$country.find('option[value="'+config.s_country+'"]').attr("selected","selected");$('.ps-phone-example-row').hide();$('.ps-phone-example-row[country="'+config.s_country+'"]').show();if(typeof config.order_created!='undefined')
        {if(typeof config.order_created.phone!='undefined')
        {$fio.val(config.order_created.fio);$phone.val(config.order_created.phone);$country.val(config.order_created.country);$country.find('option[value="'+config.order_created.country+'"]').attr("selected","selected");}
            orderCreated(config);}
            $('form').submit(function(){window.onbeforeunload=null;});if(!config.s_collected&&!config.is_preview)
        {sendDStat();}
            pluralCurrencies(config);initPhoneValidation(config);}}
    $.fn.lFunctions=function(method){return init.apply(this,arguments);}})(jQuery);