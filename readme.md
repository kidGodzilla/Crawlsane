Crawlsane
================

Crawlsane is a project aimed at crawling external resources to retrieve general
metadata in PHP. It uses the HTTP library [Requests] and the native [DomDocument]
extension.

This project is mainly developed for a start-up that crawls [MOOC]'s and tutorials
from any website.


## Usage
The Crawlsane-object requires two arguments. The first of which is the location
of the resource you want to retrieve metadata. Secondly it takes a configuration
object.

```php
$configuration = new Configuration ();
$configuration->setCookiejar ('cookiejar');
$location = new Location ('https://www.youtube.com/watch?v=9DZXOANUaNk');
$crawlsane = new Crawlsane ($location, $configuration);
```

## How does it work?
Crawlsane first tries to create an [Opengraph] object according to the OGP
protocol. If that fails it tries to apply an algorithm to find thumbnails
and metadata that can represent the resource.

## The algorithm
To find the most appropriate thumbnail to represent the resource it looks for the
images with the biggest ratio (height/width) that is closest to a chunk of text.

### Inspiration
* [Reddit's scraper.py]:

* [Facebook's crawler]:



## Libraries
* The code features an implementation of the Opengraph protocol developed by Facebook.
* It uses DomDocument to generate an internal document object model.


[Requests]: https://github.com/rmccue/Requests
[DomDocument]: http://www.php.net/manual/en/class.domdocument.php
[Opengraph]: http://ogp.me
[MOOC]: http://en.wikipedia.org/wiki/Massive_open_online_course

[Reddit's scraper.py]: https://github.com/reddit/reddit/blob/a6a4da72a1a0f44e0174b2ad0a865b9f68d3c1cd/r2/r2/lib/scraper.py#L192-L235
[Facebook's crawler]:
