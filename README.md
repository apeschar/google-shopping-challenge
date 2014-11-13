Challenge: build a price scraper
================================

We need to have access to a database of product prices. For this, we would like
you to build a PHP class that scrapes the prices for a given product from Google
Shopping, a price comparison site.

Every product is uniquely identified by a 14-digit EAN number.

Take a look at `test.php`. This is how your class is supposed to work:

```php
$google = new GoogleShopping;
$prices = $google->getPrices('8806085553941');
```

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

Coding standards
----------------

1. Please use comments when your code is not obvious.
1. Use variable names that make sense and are in the English language.
1. Use whitespace to logically separate sections of code.
1. Use functions and classes to separate functionality.

```php
<?php
// use 4 spaces for indentation
class Divider {
    private $dividend;
    private $divisor;

    // place braces on the same line
    public function setDividend($dividend) {
        $this->dividend = $dividend;
    }

    public function setDivisor($divisor) {
        // do not leave a space between the name of functions or control
        // statements and the parentheses
        if($divisor == 0) {
            // use single quotes, unless the string contains escape
            // characters or a single quote
            throw new Exception("You can't divide by zero.");
        }
    }

    public function getResult() {
        // split complicated boolean conditions over multiple lines, using this
        // exact method and alignment:
        // - boolean operators at the beginning of each line
        // - closing parentheses and opening brace alone on the last line
        if(!isset($this->dividend)
           || !isset($this->divisor)
        ) {
            // break long lines in a logical way
            throw new Exception(
                'You need to set the dividend and the divisor before dividing.');
        }

        return $this->dividend / $this->divisor;
    }
}
// do not use a closing ? > if the file contains only PHP
```

Hints
-----

In order to process the HTML code in your script, it might be useful to use the
[PHP Simple HTML DOM Parser](http://simplehtmldom.sourceforge.net/) class. It is
very easy to use. Feel free to do it another way, if you prefer.

Also, you might want to set the User-Agent header when you download the pages
from Google. Otherwise it might block you. It is best to use
[curl](http://php.net/curl) because it makes it easy to add headers.
