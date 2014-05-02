<?php
/**
 * Require classes
 */
$classes = array (
    'vendor/absoluteUrl/url_to_absolute.php',
    'vendor/autoload.php',
    'configuration.php',
    'crawlsane.php',
    'location.php',
    'resource.php',
    'opengraph.php'
);

foreach ($classes as $class)
    require_once ($class);

/**
 * Configuration
 */
$configuration = new Configuration ();
$configuration->setCookiejar('cookiejar');

/**
 * Location
 */
$location = new Location ('https://www.youtube.com/watch?v=9DZXOANUaNk');

/**
 * Crawler
 */
$crawlsane = new Crawlsane ($location, $configuration);


// Execute the request
$crawlsane->request();

// Parse the request body
$crawlsane->parse();

// Return thumbnail candidates
$crawlsane->opengraph();
