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
     * Determines whether or not requests should follow redirects
     *
     * @var boolean
    **/
    private $follow_redirects = true;

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
    private $user_agent;

    /**
     * Initializes the class
     *
     **/
    function __construct ($configuration) {

        foreach ($configuration as $key => $value)
            print 'This is config.';


        $this->cookie_file = dirname(__FILE__) .
        DIRECTORY_SEPARATOR . 'cookiejar' .DIRECTORY_SEPARATOR. 'curl_cookie.txt';
        $this->user_agent = false;
    }
}
