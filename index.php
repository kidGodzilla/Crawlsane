<?php
/**
 * Crawlsane
 *
 * - The core for crawling MOOCs.
 */
$classes = array (
    'vendor/autoload.php',
    'configuration.php',
    'crawlsane.php',
    'resource.php',
);

foreach ($classes as $class)
    require_once ($class);


/**
 * Configuration
 */
$configuration = new Configuration ();
$configuration->setCookiejar ('cookiejar');


/**
 * Resources
 */
$resource = new Resource ('http://lynda.com');


/**
 * Crawler
 */
$crawlsane = new Crawlsane ($resource, $configuration);

$crawlsane->request();
