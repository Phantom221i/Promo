<?php

require_once dirname(__FILE__) . '/OmniApiEntity.php';

class OmniApiCreateOrder extends OmniApiEntity
{
    const COOKIE_VISITOR_ID = 'bRIvit5XlDAH';
    const COOKIE_TIMEZONE = 'bRIvit5XlDTZ';
    const COOKIE_USEAGENT = 'bRIvit5XlDUA';

    private $pbid;
    private $obid;

    private $utm_source;
    private $utm_site;
    private $utm_medium;
    private $utm_campaign;
    private $utm_content;
    private $utm_term;

    private $traffic_flow_id;
    private $pay_action;
    private $special_price;
    private $fio;
    private $first_name;
    private $middle_name;
    private $last_name;
    private $phone;
    private $timezone;
    private $useragent;
    private $visitor_id;
    private $country;
    private $ip;
    private $product_id;
    private $price;
    private $is_roulette;
    private $discount;
    private $promo_id;
    private $tags;

    /**
     * @var string|null
     */
    private $promo_language;

    public function __construct($clickIdName)
    {
        if(!empty($_COOKIE[self::COOKIE_VISITOR_ID])) {
            $this->visitor_id = $_COOKIE[self::COOKIE_VISITOR_ID];
        }

        if(!empty($_COOKIE[self::COOKIE_TIMEZONE])) {
            $this->timezone = $_COOKIE[self::COOKIE_TIMEZONE];
        }

        if(!empty($_COOKIE[self::COOKIE_USEAGENT])) {
            $this->useragent = $_COOKIE[self::COOKIE_USEAGENT];
        }

        foreach (array(
             'utm_source',
             'utm_site',
             'utm_medium',
             'utm_campaign',
             'utm_content',
             'utm_term',
             $clickIdName
         ) as $name) {
            if(!empty($_GET[$name])) {
                if($name == $clickIdName){
                    $this->pbid = $_GET[$name];
                } else {
                    $this->{$name} =$_GET[$name];
                }
            }
        }

        $this->ip = $_SERVER['REMOTE_ADDR'];
    }

    /**
     * @return mixed
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param mixed $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * @param $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param $promo_id
     */
    public function setPromoId($promo_id)
    {
        $this->promo_id = $promo_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPromoId()
    {
        return $this->promo_id;
    }

    /**
     * @param $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return mixed
     */
    public function getUseragent()
    {
        return $this->useragent;
    }

    /**
     * @param mixed $useragent
     */
    public function setUseragent($useragent)
    {
        $this->useragent = $useragent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVisitorId()
    {
        return $this->visitor_id;
    }

    /**
     * @param mixed $visitor_id
     */
    public function setVisitorId($visitor_id)
    {
        $this->visitor_id = $visitor_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPbid()
    {
        return $this->pbid;
    }

    /**
     * @param mixed $pbid
     */
    public function setPbid($pbid)
    {
        $this->pbid = $pbid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getObid()
    {
        return $this->obid;
    }

    /**
     * @param mixed $obid
     */
    public function setObid($obid)
    {
        $this->obid = $obid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmSource()
    {
        return $this->utm_source;
    }

    /**
     * @param mixed $utmSource
     */
    public function setUtmSource($utmSource)
    {
        $this->utm_source = $utmSource;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmSite()
    {
        return $this->utm_site;
    }

    /**
     * @param mixed $utmSite
     */
    public function setUtmSite($utmSite)
    {
        $this->utm_site = $utmSite;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmMedium()
    {
        return $this->utm_medium;
    }

    /**
     * @param mixed $utmMedium
     */
    public function setUtmMedium($utmMedium)
    {
        $this->utm_medium = $utmMedium;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmCampaign()
    {
        return $this->utm_campaign;
    }

    /**
     * @param mixed $utmCampaign
     */
    public function setUtmCampaign($utmCampaign)
    {
        $this->utm_campaign = $utmCampaign;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmContent()
    {
        return $this->utm_content;
    }

    /**
     * @param mixed $utmContent
     */
    public function setUtmContent($utmContent)
    {
        $this->utm_content = $utmContent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmTerm()
    {
        return $this->utm_term;
    }

    /**
     * @param mixed $utmTerm
     */
    public function setUtmTerm($utmTerm)
    {
        $this->utm_term = $utmTerm;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrafficFlowId()
    {
        return $this->traffic_flow_id;
    }

    /**
     * @param mixed $trafficFlowId
     */
    public function setTrafficFlowId($trafficFlowId)
    {
        $this->traffic_flow_id = $trafficFlowId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPayAction()
    {
        return $this->pay_action;
    }

    /**
     * @param mixed $payAction
     */
    public function setPayAction($payAction)
    {
        $this->pay_action = $payAction;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpecialPrice()
    {
        return $this->special_price;
    }

    /**
     * @param mixed $specialPrice
     */
    public function setSpecialPrice($specialPrice)
    {
        $this->special_price = $specialPrice;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * @param mixed $firstName
     */
    public function setFio($fio)
    {
        $this->fio = $fio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middle_name;
    }

    /**
     * @param mixed $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middle_name = $middleName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->product_id = $productId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsRoulette()
    {
        return $this->is_roulette;
    }

    /**
     * @param mixed $price
     */
    public function setIsRoulette()
    {
        $this->is_roulette = true;
        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return 'createOrder';
    }

    /**
     * @return string|null
     */
    public function getPromoLanguage()
    {
        return $this->promo_language;
    }

    /**
     * @param string|null $promo_language
     *
     * @return $this
     */
    public function setPromoLanguage($promo_language)
    {
        $this->promo_language = $promo_language;
        return $this;
    }


}