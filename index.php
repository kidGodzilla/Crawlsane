<?php
/**
 * Require classes
 */
$classes = array (
    'vendor/absoluteUrl/url_to_absolute.php',
    'vendor/autoload.php',
    'configuration.php',
    'crawlsane.php',
    'opengraph.php',
    'resource.php'
);

foreach ($classes as $class)
    require_once ($class);

/**
 * Configuration
 */
$configuration = new Configuration ();
$configuration->setCookiejar('cookiejar');

/**
 * Resource
 */
$resource = new Resource ('http://www.lynda.com/Arduino-tutorials/Up-Running-Arduino/162273-2.html');

/**
 * Crawler
 */
$crawlsane = new Crawlsane ($resource, $configuration);

// Execute the request
$crawlsane->request();

// Parse the request body
$crawlsane->parse();

// Return thumbnail candidates
$crawlsane->opengraph();
