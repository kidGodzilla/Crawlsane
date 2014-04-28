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
     * Holds the raw request body (response)
     */
     private $body;

    /**
     * Holds the Document Object Model (DOM)
     */
     private $dom;


    /**
     * Initializes the class
     */
     public function __construct ($resource, $configuration) {
         if (!$resource || !$configuration)
             throw new Exception ('Missing arguements.');

         // Setup attributes
         $this->resource = $resource;
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
            $this->resource->getLocation(),
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
         if ($this->body) $this->dom->loadHTML($this->body);
     }

    /**
     * Finds appropriate thumbnails
     */
     public function thumbnails () {

         // Collect all img-tags
         $images = $this->dom->getElementsByTagName('img');

         // Iterate each tag and echo absolute url
         foreach ($images as $image)
             print url_to_absolute (
                 $this->resource->getLocation(),
                 $image->getAttribute('src')
             );



     }

}
