Challenge: build a price scraper
================================

We need to have access to a database of product prices. For this, we would like
you to build a PHP class that scrapes the prices for a given product from Google
Shopping, a price comparison site.

Every product is uniquely identified by a 14-digit EAN number.

Take a look at `test.php`. This is how your class is supposed to work:

    $google = new GoogleShopping;
    $prices = $google->getPrices('8806085553941');

Please place your new class in the file GoogleShopping.php.

Clone this repository into your own Github repository and commit your code
there. Then, you can send me a link. If you don't know how to do this, you can
send me a ZIP file with your code.

How to crawl?
-------------

1. Make sure that the EAN number has 14 digits. If it has less than 14 digits,
   add zeroes (0) on the left.
1. Request the search page on this URL:
   `https://www.google.nl/search?hl=nl&output=search&tbm=shop&q=08806085553941`
1. Find the first product link on this page. For example:
   `/shopping/product/12115883691353094589`
1. Add `/online?hl=nl` to the end of the product link, so you get
   `/shopping/product/12115883691353094589/online?hl=nl`
1. Download the product link.
1. Return an array with all the prices. See the example in `test.php`.

Hints
-----

In order to process the HTML code in your script, it might be useful to use the
[PHP Simple HTML DOM Parser](http://simplehtmldom.sourceforge.net/) class. It is
very easy to use. Feel free to do it another way, if you prefer.

Also, you might want to set the User-Agent header when you download the pages
from Google. Otherwise it might block you. It is best to use
[curl](http://php.net/curl) because it makes it easy to add headers.
