# Changelog

All notable changes to this project will be documented in this file.

The format is based on [keep a changelog 1.1.0][xtlink-keep-a-changelog]
and this project adheres to [Semantic Versioning 2.0.0][xtlink-semantic-versioning].

## [1.0.0] - 2024-07-28

### Fixed

* type hints
* PHPDoc

### Changed

* composer package
  * changed
    * description
    * require
      * `php` [>=8.3]
    * require-dev
      * `codekandis/phpunit` [^5.0.0]
  * added
    * version
    * require-dev
      * `rector/rector` [^1.2.2]
    * autoload-dev
      * psr-4
        * `CodeKandis\RegularExpressions\Build\`
          * `build/`
    * scripts
      * `test`
* PHPUnit tests
  * configuration
  * externalized data providers
* error and exception handling
* renamed arguments
* arguments order
* replaced all abstract enumerations with native enumerations
* `CODE_OF_CONDUCT.md`
* `README.md`
  * PHP version `8.3`
  * documentation

### Removed

* boolean overhead

### Added

* read-only fields
* type hints
* `Override` attributes
* PHPUnit tests
* rector
  * configuration script
  * shell script
* code style
* `.gitattributes` to ignore dev-assets

[1.0.0]: https://github.com/codekandis/regular-expressions/compare/0.2.0...1.0.0

---
## [0.2.0] - 2021-10-24

### Added

* `RegularExpressionInterface::replace()`

[0.2.0]: https://github.com/codekandis/regular-expressions/compare/0.1.0...0.2.0

---
## [0.1.0] - 2021-07-13

### Added

* regular expression validator interface and class
* wrapped flags for various regular expression operations
* regular expression interface and class
* necessary exceptions
* `CODE_OF_CONDUCT.md`
* `LICENSE`
* `composer.json`
* `REAMDE.md`
* `CHANGELOG.md`

[0.1.0]: https://github.com/codekandis/regular-expressions/tree/0.1.0



[xtlink-keep-a-changelog]: http://keepachangelog.com/en/1.1.0/
[xtlink-semantic-versioning]: http://semver.org/spec/v2.0.0.html
