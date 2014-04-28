<?php

class Opengraph {

    /**
     * Document object model
     */
     private $dom;

    /**
     * og:type
     */
     private $type;

    /**
     * og:title
     */
     private $title;

    /**
     * og:description
     */
     private $description;

    /**
     * og:image
     */
     private $image;

     /**
      * Initialize the Opengraph object
      */
     public function __construct ($dom) {

         // Store the dom internally
         $this->dom = $dom;

         // Traverse the dom for og:values
         $meta = $this->dom->getElementsByTagName('meta');

         


     }

     private
}
