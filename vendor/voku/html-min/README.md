[![Build Status](https://travis-ci.org/voku/HtmlMin.svg?branch=master)](https://travis-ci.org/voku/HtmlMin)
[![Coverage Status](https://coveralls.io/repos/github/voku/HtmlMin/badge.svg?branch=master)](https://coveralls.io/github/voku/HtmlMin?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/voku/HtmlMin/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/voku/HtmlMin/?branch=master)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/a433ed2b3b7546b3a1c520310222a601)](https://www.codacy.com/app/voku/HtmlMin?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=voku/HtmlMin&amp;utm_campaign=Badge_Grade)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/63d796ba-64b9-487d-a45f-ac121fdc5491/mini.png)](https://insight.sensiolabs.com/projects/63d796ba-64b9-487d-a45f-ac121fdc5491)
[![Latest Stable Version](https://poser.pugx.org/voku/html-min/v/stable)](https://packagist.org/packages/voku/html-min) 
[![Total Downloads](https://poser.pugx.org/voku/html-min/downloads)](https://packagist.org/packages/voku/html-min) 
[![Latest Unstable Version](https://poser.pugx.org/voku/html-min/v/unstable)](https://packagist.org/packages/voku/html-min)
[![License](https://poser.pugx.org/voku/html-min/license)](https://packagist.org/packages/voku/html-min)

# HTML Compressor and Minifier

## Description

HtmlMin is a fast and very easy to use PHP library that minifies given HTML5 source by removing extra whitespaces, comments and other unneeded characters without breaking the content structure. As a result pages become smaller in size and load faster. It will also prepare the HTML for better gzip results, by re-ranging (sort alphabetical) attributes and css-class-names.


## Install via "composer require"

```shell
composer require voku/html-min
```

## Quick Start

```php
use voku\helper\HtmlMin;

require_once 'composer/autoload.php';

$html = "
<html>
  \r\n\t
  <body>
    <ul style=''>
      <li style='display: inline;' class='foo'>
        \xc3\xa0
      </li>
      <li class='foo' style='display: inline;'>
        \xc3\xa1
      </li>
    </ul>
  </body>
  \r\n\t
</html>
";
$htmlMin = new HtmlMin();

echo $htmlMin->minify($html); 
// '<html><body><ul><li class=foo style="display: inline;"> à <li class=foo style="display: inline;"> á </ul>'
```

## Options

```php
$htmlMin = new HtmlMin();

/* 
 * Protected HTML (inlince css / inline js / conditional comments) are still protected,
 *    no matter what settings you use.
 */

$htmlMin->doOptimizeViaHtmlDomParser();               // optimize html via "HtmlDomParser()"
$htmlMin->doRemoveComments();                         // remove default HTML comments (depends on "doOptimizeViaHtmlDomParser(true)")
$htmlMin->doSumUpWhitespace();                        // sum-up extra whitespace from the Dom (depends on "doOptimizeViaHtmlDomParser(true)")
$htmlMin->doRemoveWhitespaceAroundTags();             // remove whitespace around tags (depends on "doOptimizeViaHtmlDomParser(true)")
$htmlMin->doOptimizeAttributes();                     // optimize html attributes (depends on "doOptimizeViaHtmlDomParser(true)")
$htmlMin->doRemoveHttpPrefixFromAttributes();         // remove optional "http:"-prefix from attributes (depends on "doOptimizeAttributes(true)")
$htmlMin->doRemoveDefaultAttributes();                // remove defaults (depends on "doOptimizeAttributes(true)" | disabled by default)
$htmlMin->doRemoveDeprecatedAnchorName();             // remove deprecated anchor-jump (depends on "doOptimizeAttributes(true)")
$htmlMin->doRemoveDeprecatedScriptCharsetAttribute(); // remove deprecated charset-attribute - the browser will use the charset from the HTTP-Header, anyway (depends on "doOptimizeAttributes(true)")
$htmlMin->doRemoveDeprecatedTypeFromScriptTag();      // remove deprecated script-mime-types (depends on "doOptimizeAttributes(true)")
$htmlMin->doRemoveDeprecatedTypeFromStylesheetLink(); // remove "type=text/css" for css links (depends on "doOptimizeAttributes(true)")
$htmlMin->doRemoveEmptyAttributes();                  // remove some empty attributes (depends on "doOptimizeAttributes(true)")
$htmlMin->doRemoveValueFromEmptyInput();              // remove 'value=""' from empty <input> (depends on "doOptimizeAttributes(true)")
$htmlMin->doSortCssClassNames();                      // sort css-class-names, for better gzip results (depends on "doOptimizeAttributes(true)")
$htmlMin->doSortHtmlAttributes();                     // sort html-attributes, for better gzip results (depends on "doOptimizeAttributes(true)")
$htmlMin->doRemoveSpacesBetweenTags();                // remove more (aggressive) spaces in the dom (disabled by default)
$htmlMin->doRemoveOmittedQuotes();                    // remove quotes e.g. class="lall" => class=lall
$htmlMin->doRemoveOmittedHtmlTags();                  // remove ommitted html tags e.g. <p>lall</p> => <p>lall 
```

## Unit Test

1) [Composer](https://getcomposer.org) is a prerequisite for running the tests.

```
composer install voku/html-min
```

2) The tests can be executed by running this command from the root directory:

```bash
./vendor/bin/phpunit
```

