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
     * Milliseconds to wait on response
     *
     * @var int
    **/
    private $timeout = 100000;

    /**
     * Milliseconds to wait on response
     *
     * @var int
    **/
    private $connectTimeout = 100000;

    /**
     * An associative array of headers to send along with requests
     *
     * @var array
    **/
    private $headers = array ();

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

        $this->user_agent =
            'Mozilla/5.0 (compatible; Crawlsane/1.0;' .
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

    /**
     * Sets the headers (array)
     *
     * @var mixed
     */
     public function setHeaders ($headers) {
         if (is_array ($headers))
             $this->headers = $headers;
         else
             throw new Exception ('Headers must be an array.');
     }

     /**
      * Get the headers
      *
      */
      public function getHeaders () {
          return $this->headers;
      }

      /**
       * Get the maxRedirects
       *
       */
       public function getMaxRedirects () {
           return $this->maxRedirects;
       }

      /**
       * Get the userAgent
       *
       */
       public function getUserAgent () {
           return $this->userAgent;
       }

       /**
        * Get the followRedirect
        */
        public function getFollowRedirects () {
            return $this->followRedirects;
        }

       /**
        * Get the timeout (ms)
        */
        public function getTimeout () {

            return $this->timeout;

        }

       /**
        * Get the connect_timeout (ms)
        */
        public function getConnectTimeout () {
            return $this->connectTimeout;
        }
}
