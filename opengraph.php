<?php

class Opengraph {

    /**
     * Document object model
     */
     private $dom;

    /**
     * The Opengraph fields
     */
     private $fields;

    /**
     * Valid og:type(s)
     */
     private $validTypes = array (
         'activity' => array (
             'activity', 'sport'
         ),

         'business' => array (
             'bar', 'company', 'cafe',
             'hotel', 'restaurant'
         ),

         'group' => array (
              'cause', 'sports_league',
              'sports_team'
          ),

         'organization' => array (
             'band', 'government',
             'non_profit', 'school',
             'university'
         ),

         'person' => array (
             'actor', 'athlete', 'author',
             'director', 'musician',
             'politician', 'public_figure'
         ),

         'place' => array (
             'city', 'country', 'landmark',
             'state_province'
         ),

         'product' => array (
             'album', 'book', 'drink',
             'food', 'game', 'movie',
             'product', 'song', 'tv_show',
             'video'
         ),

         'website' => array (
             'blog', 'website'
         )
     );

     /**
      * Initialize the Opengraph object
      */
     public function __construct ($dom) {

         // Store the dom internally
         $this->dom = $dom;

         // Traverse the dom
         $this->build();
     }

     /**
      * Builds the opengraph object
      */
     private function build () {

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

                /**
                 * protocol __
                 *            |
                 *            og:video:type
                 * field __________|     |
                 * key___________________|
                 */

                 // Find the field (outermost array key)
                 $field = explode (':', $metatag->getAttribute('property'))[1];

                 // Append value to each field
                 $keys = array_splice (explode (':',
                     $metatag->getAttribute('property')), 2);

                 // Store as an associative array
                 // If keys are present
                 if (empty($keys) == false)
                     foreach ($keys as $key)
                         $this->field[$field][$key] =
                         $metatag->getAttribute('content');

                 // Store as field => value pair
                 else
                     $this->field[$field][] =
                     $metatag->getAttribute('content');
             }
     }

    /**
     * Sets og:type
     */
     private function setType ($type) {

         // Validate the og:type
         foreach ($this->validTypes as $validType)
             if (in_array ($type, $validType))
                 $this->type = $type;
     }

   /**
    * Sets an og:field[:key] value
    */
    private function setField ($field, $key = false, $value) {
        if ($key)
            $this->fields[$field][$key] = $value;
        else
            $this->fields[$field][] = $value;
    }

   /**
    * Gets an og:field[:key] value
    */
    private function getField ($field, $key = false) {
        if ($key)
            return $this->fields[$field][$key];
        else
            return $this->fields[$field];
    }

}
