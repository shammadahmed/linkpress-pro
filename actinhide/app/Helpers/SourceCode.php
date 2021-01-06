<?php

namespace App\Helpers;

class SourceCode
{
    /**
     * @var array
     */
    private $options = [
        CURLOPT_RETURNTRANSFER => true, //     Return web page
        CURLOPT_HEADER         => false, //    Do not return headers
        CURLOPT_FOLLOWLOCATION => true, //     Follow redirects
        CURLOPT_SSL_VERIFYPEER => false, //    Disable SSL verification
        CURLOPT_SSL_VERIFYHOST => 2, //        Disable SSL verification
        CURLOPT_USERAGENT      => "spider", // Who am i
        CURLOPT_AUTOREFERER    => true, //     Set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 220, //      Timeout on connect
        CURLOPT_TIMEOUT        => 220, //      Timeout on response
        CURLOPT_MAXREDIRS      => 20, //       Stop after 10 redirects
    ];

    /**
     * @param $url
     * @return mixed
     */
    public function get($url)
    {
        $ch = curl_init($url);
        curl_setopt_array($ch, $this->options);
        $content = curl_exec($ch);
        curl_close($ch);

        return $content;
    }
}
