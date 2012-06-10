<?php

namespace Sly\UrlShortenerBundle\Provider;

/**
 * Googl provider.
 * For goog.gl URL shortener service.
 *
 * @uses BaseProvider
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Googl extends BaseProvider implements ProviderInterface
{
    /**
     * @var string
     */
    protected $apiUrl;

    /**
     * @var string
     */
    protected $longUrl;

    /**
     * @var string
     */
    protected $creationData;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->apiUrl = 'https://www.googleapis.com/urlshortener/v1/url';
    }

    /**
     * Set long URL.
     * 
     * @param string $longUrl Long URL
     */
    public function setLongUrl($longUrl)
    {
        $this->longUrl = $longUrl;
    }

    /**
     * Create short URL from API.
     * 
     * @return array
     */
    public function shorten()
    {
        parent::shorten();

        $curlResquest = $this->curl;
        $curlResquest->setUrl($this->apiUrl);
        $curlResquest->setPostData(array('longUrl' => $this->longUrl));

        $response = $curlResquest->getResponse();

        return array(
            'hash'     => $this->getHashFromShortUrl($response->id),
            'shortUrl' => $response->id,
        );
    }

    /**
     * Get hash from short URL.
     * 
     * @param string $shortUrl Short URL
     * 
     * @return string
     */
    protected function getHashFromShortUrl($shortUrl)
    {
        $shortUrl = explode('/', $shortUrl);

        return $shortUrl[count($shortUrl) - 1];
    }
}