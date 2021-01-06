<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['url', 'visits', 'hash', 'title', 'description', 'image'];

    /**
     * @param $value
     * @return string
     */
    public function getDescriptionAttribute($value)
    {
        if (!$value) {
            return 'Description not available';
        }

        return $value;
    }

    public function getTitleAttribute($value)
    {
        if (!$value) {
            return 'Title not available';
        }

        return $value;
    }

    /**
     * @return string
     */
    public function getDomainAttribute()
    {
        // if (!filter_var($this->url, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED)) {
        //     $this->url = 'http://' . $this->url;
        // }

        // $parseUrl = parse_url(trim($this->url));

        // if (isset($parseUrl['path'])) {
        //     $explodedUrl = explode('/', $parseUrl['path'], 2);
        // } else {
        //     return $this->url;
        // }

        // $shiftedArray = array_shift($explodedUrl);

        // $host = trim($parseUrl['host'] ? $parseUrl['host'] : $shiftedArray);

        // $parts     = explode('.', $host);
        // $num_parts = count($parts);
        // $h         = "";
        // if ($parts[0] == "www") {
        //     for ($i = 1; $i < $num_parts; $i++) {
        //         $h .= $parts[$i] . '.';
        //     }
        // } else {
        //     for ($i = 0; $i < $num_parts; $i++) {
        //         $h .= $parts[$i] . '.';
        //     }
        // }
        // return substr($h, 0, -1);

        $host = @parse_url($this->url, PHP_URL_HOST);
        // If the URL can't be parsed, use the original URL
        // Change to "return false" if you don't want that
        if (!$host) {
            $host = $this->url;
        }

        // The "www." prefix isn't really needed if you're just using
        // this to display the domain to the user
        if (substr($host, 0, 4) == "www.") {
            $host = substr($host, 4);
        }

        // You might also want to limit the length if screen space is limited
        if (strlen($host) > 50) {
            $host = substr($host, 0, 47) . '...';
        }

        return $host;
    }

    /**
     * @return integer
     */
    public function getAlexaRankAttribute()
    {
        $xml = simplexml_load_file('http://data.alexa.com/data?cli=10&dat=snbamz&url=' . $this->url);

        $rank = isset($xml->SD[1]->POPULARITY) ? $xml->SD[1]->POPULARITY->attributes()->TEXT : 0;

        return $rank;
    }

    /**
     * @param $value
     * @return integer
     */
    public function getVisitsAttribute($value)
    {
        if (!$value) {
            return 0;
        }

        return $value;
    }

    /**
     * @param $value
     * @return string
     */
    public function getImageAttribute($value)
    {
        if (!$value) {
            return asset('images/preview.png');
        }

        return $value;
    }

    /**
     * @return mixed
     */
    public function keywords()
    {
        return $this->belongsToMany('App\Keyword');
    }

    /**
     * @return mixed
     */
    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }
}
