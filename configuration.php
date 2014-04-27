<?php

/**
 * Class Configuration
 *
 * - Handles configuration towards scraping
 *   of external resources.
 */
class Configuration {

    /**
     * The file to read and write cookies to for requests
     *
     * @var string
    **/
    private $cookiejar;

    /**
     * Respect or ignore robots.txt
     */
     private $respectful = true;

    /**
     * Determines whether or not requests should follow redirects
     *
     * @var boolean
    **/
    private $followRedirects = true;

    /**
     * An associative array of headers to send along with requests
     *
     * @var array
    **/
    private $headers = array();

    /**
     * An associative array of CURLOPT options to send along with requests
     *
     * @var array
    **/
    private $options = array();

    /**
     * The referer header to send along with requests
     *
     * @var string
    **/
    private $referer;

    /**
     * The user agent to send along with requests
     *
     * @var string
    **/
    private $userAgent;

    /**
     * Initializes the class
     *
     **/
    public function __construct () {
        $this->cookie_file = dirname (__FILE__) .
            DIRECTORY_SEPARATOR . 'cookiejar';

        $this->user_agent = 'Mozilla/5.0 (compatible; Crawlsane/1.0;' .
            '+http://github.com/michaelmcmillan/Crawlsane)';
    }

    /**
     * Sets the userAgent
     *
     * @var string
     */
    public function setUserAgent ($userAgent) {
        $this->userAgent = $userAgent;
    }

    /**
     * Sets the referer
     *
     * @var string
     */
    public function setReferer ($referer) {
        $this->referer = $referer;
    }

    /**
     * Sets the cookiejar (directory) path
     *
     * @var string
     */
    public function setCookiejar ($cookiejar) {
        if (is_writable ($cookiejar))
            $this->cookiejar = $cookiejar;
        else
            throw new Exception ('Cookiejar is not writable.');
    }
}
