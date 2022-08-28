# codekandis/regular-expressions

[![Version][xtlink-version-badge]][srclink-changelog]
[![License][xtlink-license-badge]][srclink-license]
[![Minimum PHP Version][xtlink-php-version-badge]][xtlink-php-net]
![Code Coverage][xtlink-code-coverage-badge]

`codekandis/regular-expressions` is a library to provide regular expression interfaces and classes.

## Index

* [Installation](#installation)
* [Testing](#testing)
* [How to use](#how-to-use)
  * [`RegularExpression::match()`](#regularexpressionmatch)
  * [`RegularExpression::matchAll()`](#regularexpressionmatchall)
  * [`RegularExpression::replace()`](#regularexpressionreplace)

## Installation

Install the latest version with

```bash
$ composer require codekandis/regular-expressions
```

## Testing

Test the code with

```bash
$ composer run-script test
```

## How to use

[`RegularExpression`][srclink-regular-expression] wraps several PHP RegEx functions. The description to the paramters used can be read in the PHP manual linked in the description of the respective methods. The parameter [`$throwNoMatchException`][] is described below

### Instanziation

The pattern must be passed to the constructor of the [`RegularExpression`][srclink-regular-expression].

```php
$regularExpression = new RegularExpression( '~[a-z]+[0-9]+~' );
```

If the passed pattern is invalid an [`InvalidRegularExpressionException`][srclink-invalid-regular-expression-exception] will be thrown.

### `RegularExpression::match()`

[`RegularExpression::match()`][srclink-regular-expression-match] wraps PHP's function [`preg_match()`][xtlink-php-net-preg_match].

```php
$regularExpression = new RegularExpression( '~[a-z]+[0-9]+~' );
$match             = $regularExpression->match( 'foo01234_bar56789' );
/**
 * $match = [
 *   'foo01234'
 * ]
 */
```

This method provides a parameter `$throwNoMatchException`. It defaults to `true`. If the regular expression does not match to the subject a [`RegularExpressionNotMatchingException`][srclink-regular-expression-not-matching-exception] will be thrown. If the parameter `$throwNoMatchException` is set to `false` the method returns `null`.

Passing an invalid offset throws an [`InvalidOffsetException`][srclink-invalid-offset-exception].

### `RegularExpression::matchAll()`

[`RegularExpression::matchAll()`][srclink-regular-expression-match-all] wraps PHP's function [`preg_match_all()`][xtlink-php-net-preg_match_all].

```php
$regularExpression = new RegularExpression( '~[a-z]+[0-9]+~' );
$matches           = $regularExpression->matchAll( 'foo01234_bar56789' );
/**
 * $matches = [
 *   [
 *     'foo01234',
 *     'bar56789'
 *   ]
 * ]
 */
```

This method provides a parameter `$throwNoMatchException`. It defaults to `true`. If the regular expression does not match to the subject a [`RegularExpressionNotMatchingException`][srclink-regular-expression-not-matching-exception] will be thrown. If the parameter `$throwNoMatchException` is set to `false` the method returns `null`.

Passing an invalid offset throws an [`InvalidOffsetException`][srclink-invalid-offset-exception].

### `RegularExpression::replace()`

[`RegularExpression::replace()`][srclink-regular-expression-replace] wraps PHP's function [`preg_replace()`][xtlink-php-net-preg_replace].

```php
$regularExpression = new RegularExpression( '~[a-z]+[0-9]+~' );
$replacedSubject   = $regularExpression->replace( 'foo01234_bar56789', 'replacement' );
/**
 * $replacedSubject = 'replacement_replacement'
 */
```

This method provides a parameter `$throwNoMatchException`. It defaults to `true`. If the regular expression does not match to the subject a [`RegularExpressionNotMatchingException`][srclink-regular-expression-not-matching-exception] will be thrown. If the parameter `$throwNoMatchException` is set to `false` the method returns the passed subject instead.

Passing an invalid limit throws an [`InvalidLimitException`][srclink-invalid-limit-exception].



[xtlink-version-badge]: https://img.shields.io/badge/version-development-blue.svg
[xtlink-license-badge]: https://img.shields.io/badge/license-MIT-yellow.svg
[xtlink-php-version-badge]: https://img.shields.io/badge/php-%3E%3D%208.3-8892BF.svg
[xtlink-code-coverage-badge]: https://img.shields.io/badge/coverage-100%25-green.svg
[xtlink-php-net]: https://php.net
[xtlink-php-net-preg_match]: https://www.php.net/manual/en/function.preg-match.php
[xtlink-php-net-preg_match_all]: https://www.php.net/manual/en/function.preg-match-all.php
[xtlink-php-net-preg_replace]: https://www.php.net/manual/en/function.preg-replace.php

[srclink-license]: ./LICENSE
[srclink-changelog]: ./CHANGELOG.md
[srclink-regular-expression-match]: ./src/RegularExpression.php#L53
[srclink-regular-expression-match-all]: ./src/RegularExpression.php#L79
[srclink-regular-expression-replace]: ./src/RegularExpression.php#L105
[srclink-invalid-regular-expression-exception]: ./src/InvalidRegularExpressionException.php
[srclink-invalid-offset-exception]: ./src/InvalidOffsetException.php
[srclink-invalid-limit-exception]: ./src/InvalidLimitException.php
[srclink-regular-expression-not-matching-exception]: ./src/RegularExpressionNotMatchingException.php
[srclink-regular-expression]: ./src/RegularExpression.php
