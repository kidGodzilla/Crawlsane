<?php

class Crawlsane {


    /**
     * Holds the resource object
     */
     private $resource;

    /**
     * Holds the current configuration
     */
     private $configuration;

    /**
     * Initializes the class
     */
     public function __construct ($resource, $configuration) {
         if (!$resource || !$configuration)
             throw new Exception ('Missing arguements.');

         $this->resource = $resource;
         $this->configuration = $configuration;
     }

    /**
     * Requests the HTTP body of the location
     *
     */
     public function request () {

        // Request the resource
        $request = Requests::get(
            $this->resource->getLocation(),
            $this->configuration->getHeaders(),
                array (
                    'useragent'        => $this->configuration->getUserAgent(),
                    'redirects'        => $this->configuration->getMaxRedirects(),
                    'follow_redirects' => $this->configuration->getFollowRedirects(),
                    'timeout'          => $this->configuration->getTimeout(),
                    'connect_timeout'  => $this->configuration->getConnectTimeout()
            )
        );
     }
}
