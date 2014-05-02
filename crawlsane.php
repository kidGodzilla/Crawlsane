<?php

class Crawlsane {

    /**
     * Holds the location object
     */
     private $location;

    /**
     * Holds the current configuration
     */
     private $configuration;

    /**
     * Holds the raw request body (response)
     */
     private $body;

    /**
     * Holds the Document Object Model (DOM)
     */
     private $dom;

    /**
     * Holds the Opengraph intrepretation
     */
     public $opengraph;


    /**
     * Initializes the class
     */
     public function __construct ($location, $configuration) {
         if (!$location || !$configuration)
             throw new Exception ('Missing arguements.');

         // Setup attributes
         $this->location = $location;
         $this->configuration = $configuration;
         $this->dom = new DOMDocument ();
     }

    /**
     * Requests the HTTP body of the location
     *
     */
     public function request () {

        // Request the resource
        $request = Requests::get(
            $this->location->getLocation(),
            $this->configuration->getHeaders(), array (
                'useragent'        => $this->configuration->getUserAgent(),
                'redirects'        => $this->configuration->getMaxRedirects(),
                'follow_redirects' => $this->configuration->getFollowRedirects(),
                'timeout'          => $this->configuration->getTimeout(),
                'connect_timeout'  => $this->configuration->getConnectTimeout()
            )
        );

        // Hold the response
        if ($request->body)
            $this->body = $request->body;
        else
            throw new Exception ('Response could not be made.');
     }

    /**
     * Parses the request body to a DOM.
     */
     public function parse () {

         // Let's avoid a error-spraying-mayhem
         libxml_use_internal_errors (true);

         // Only pass to DOM if request body was obtained
         if ($this->body)
             $this->dom->loadHTML($this->body);
     }

    /**
     * Tries to generate an OpenGraph object
     */
     public function opengraph () {

        $this->opengraph = new Opengraph ($this->dom);

        print_r($this->opengraph);

     }


    /**
     * Finds appropriate thumbnails
     * @todo this was written in a drunk state, review l8r
     */
     public function thumbnails () {


         // Try to find Opengraph-tags

         /*
         // Collect all img-tags
         $images = $this->dom->getElementsByTagName('img');

         // Replace relative urls with absolute ones
         foreach ($images as $image)
             $image->setAttribute('src',
                 url_to_absolute (
                     $this->resource->getLocation(),
                     $image->getAttribute('src')
                 )
             );
         */
     }

}
