<?php

namespace App\Helpers;

use Symfony\Component\DomCrawler\Crawler;

class LinkDetailsExtractor
{
    /**
     * @var DomCrawlerInterface $crawler
     */
    protected $crawler;

    /**
     * @var array
     */
    protected $details = [];

    /**
     * @return string
     */
    public function getTitle()
    {
        if ($this->crawler->getElementsByTagName('title')->item(0) == null) {
            return "";
        }

        return $this->crawler->getElementsByTagName('title')->item(0)->nodeValue;
    }

    /**
     * @return string
     */
    public function getImage($url)
    {
        if ($this->crawler->getElementsByTagName('img')->item(0) == null) {
            return "";
        }

        $image = $this->crawler->getElementsByTagName('img')->item(0)->getAttribute('src');

        if (parse_url($image, PHP_URL_HOST) == '') {
            $parsedUrl = parse_url($this->url);

            if (!array_key_exists('scheme', $parsedUrl)) {
                $parsedUrl['scheme'] = 'http://';
            }

            @$image = $parsedUrl['scheme'] . $parsedUrl['path'] . "/" . $image;
        }

        return $image;
    }

    /**
     * @return string
     */
    public function getMetas()
    {
        $metas = $this->crawler->getElementsByTagName('meta');

        $description = "";
        $keywords    = "";

        for ($i = 0; $i < $metas->length; $i++) {
            $meta = $metas->item($i);
            if ($meta->getAttribute('name') == 'description') {
                $description = $meta->getAttribute('content');
            }

            if ($meta->getAttribute('name') == 'keywords') {
                $keywords = $meta->getAttribute('content');
            }

        }

        return ['description' => $description, 'keywords' => $keywords];
    }

    /**
     * @return array
     */
    public function fetch($url, $crawler)
    {
        $this->url     = $url;
        $this->crawler = $crawler;

        $this->details['title']       = $this->getTitle();
        $this->details['image']       = $this->getImage($this->url);
        $metas                        = $this->getMetas();
        $this->details['description'] = $metas['description'];
        $this->details['keywords']    = $metas['keywords'];

        return $this->details;
    }
}
