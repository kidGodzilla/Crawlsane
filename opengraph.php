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
     * Valid og:type(s)
     */
     private $validTypes = array (
         'activity' => array(
             'activity', 'sport'
         ),

         'business' => array(
             'bar', 'company', 'cafe',
             'hotel', 'restaurant'
         ),

         'group' => array(
             'cause', 'sports_league',
              'sports_team'
          ),

         'organization' => array(
             'band', 'government',
             'non_profit', 'school',
             'university'
         ),

         'person' => array(
             'actor', 'athlete', 'author',
             'director', 'musician',
             'politician', 'public_figure'
         ),

         'place' => array(
             'city', 'country', 'landmark',
             'state_province'
         ),

         'product' => array(
             'album', 'book', 'drink',
             'food', 'game', 'movie',
             'product', 'song', 'tv_show'
         ),

         'website' => array(
             'blog', 'website'
         )
     );

     /**
      * Initialize the Opengraph object
      */
     public function __construct ($dom) {

         // Store the dom internally
         $this->dom = $dom;

         // Parse the dom
         $this->parse();
     }

     /**
      * Parses the internal dom
      */
     private function parse () {

         // Look for meta tags
         $metatags = $this->dom->getElementsByTagName('meta');

         // No metatags kills the parser
         if (!$metatags || $metatags->length === 0)
            return false;

         // Iterate each metatag
         foreach ($metatags as $metatag)

             // If property attributes are present
             if ($metatag->hasAttribute('property')
             &&  substr($metatag->getAttribute('property'), 0, 3) == 'og:') {

             }
     }

    /**
     * Sets og:type
     */
     private function setType ($type) {
         // @todo check for valid type
         //if (i)
         $this->type = $type;
     }

    /**
     * Sets og:title
     */
     private function setTitle ($title) {
         $this->title = $title;
     }

    /**
     * Sets og:title
     */
     private function setDescription ($description) {
         $this->description = $description;
     }

    /**
     * Sets og:title
     */
     private function setImage ($image) {
         $this->image = $image;
     }


}
