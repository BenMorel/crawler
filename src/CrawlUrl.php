<?php

namespace Spatie\Crawler;

use Psr\Http\Message\UriInterface;

class CrawlUrl
{
    /** @var \Psr\Http\Message\UriInterface */
    public $url;

    /** @var \Psr\Http\Message\UriInterface */
    public $foundOnUrl;

    /** @var int */
    public $depth;

    /** @var mixed */
    protected $id;

    public static function create(UriInterface $url, ?UriInterface $foundOnUrl = null, $id = null, int $depth = 0)
    {
        $static = new static($url, $foundOnUrl, $depth);

        if ($id !== null) {
            $static->setId($id);
        }

        return $static;
    }

    protected function __construct(UriInterface $url, $foundOnUrl = null, int $depth = 0)
    {
        $this->url = $url;
        $this->foundOnUrl = $foundOnUrl;
        $this->depth = $depth;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
