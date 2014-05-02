<?php
/**
 * Class Resource
 *
 * - An external resource
 */
class Location {

    /**
     * Location of the resource (http/https)
     *
     * @var string
     */
    private $location;

    /**
     * Initializes the class
     */
     public function __construct ($location) {
         if ($this->validLocation ($location))
             $this->location = $location;
         else
             throw new Exception ('Invalid location: http(s)');
     }

    /**
     * Validates the location
     *
     * @var string
     */
     private function validLocation ($location) {
         return filter_var($location, FILTER_VALIDATE_URL);
     }

     /**
      * Returns the location
      */
      public function getLocation () {
          return $this->location;
      }

}
