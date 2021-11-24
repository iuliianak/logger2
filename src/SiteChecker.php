<?php

namespace Yulia\Logger;

class SiteChecker
{
    protected $site;

    public function getArrWebsitesFromList($filename)
    {
        foreach(file($filename) as $website){
            $arrSite[] = $this->clearFormat($website);
        }
        return $arrSite;
    }

    public function setSite($site)
    {
        $this->site = $site;
    }

    public function getSite($site)
    {
        return $this->site;
    }

    function websiteCheck($adres)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $adres);
        curl_setopt($curl, CURLOPT_REFERER, 'http://google.ru/');
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSLVERSION, 13);
        curl_setopt($curl, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 200);

        $stranica = curl_exec($curl);

        $message = curl_getinfo($curl, CURLINFO_HTTP_CODE);

     if(curl_exec($curl) === false){
         $message = curl_error($curl);
     }
        curl_close($curl);

        return $message;
    }

    public function clearFormat($text)
    {
        $arr = ['\n','\t','\r'];
        $text = trim(str_replace($arr,'',$text));
        return $text;
    }
}