<?php

namespace App\Helpers;

use Symfony\Component\DomCrawler\Crawler;

class LinkOrganizer
{
    /**
     * @var string
     */
    protected $html;

    /**
     * @var mixed
     */
    protected $linkDetails;

    /**
     * @var mixed
     */
    protected $sourceCode;

    /**
     * @var mixed
     */
    protected $hash;

    /**
     * @var array
     */
    protected $link = [];

    /**
     * @param LinkDetailsExtractor $linkDetails
     * @param SourceCode $sourceCode
     * @param Hash $hash
     */
    public function __construct(LinkDetailsExtractor $linkDetails, SourceCode $sourceCode, Hash $hash)
    {
        $this->linkDetails = $linkDetails;
        $this->sourceCode  = $sourceCode;
        $this->hash        = $hash;
    }

    /**
     * @param $url
     * @return mixed
     */
    public function organize($url)
    {
        $this->html = $this->sourceCode->get($url);
        $this->crawler    = new \DOMDocument();
        @$this->crawler->loadHTML($this->html);

        $this->link         = $this->linkDetails->fetch($url, $this->crawler);
        $this->link['url']  = $url;
        $this->link['hash'] = $this->hash->generate();

        return $this->link;
    }
}
