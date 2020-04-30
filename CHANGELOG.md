# Change log

All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](https://semver.org/).

## x.y.z

### Added
- Add more Composer configuration (#47)
- Add a script for PHP style fixing (#43)
- Composer script for PHP linting

### Changed
- Upgrade to PHPUnit 8.5 (#50)
- Change the code style from PSR-2 to PSR-12 (#48)
- Simplify the PHP version requirement (#46)
- Upgrade PHP_CodeSniffer (#45)
- Use the default path for the PHP_CodeSniffer configuration (#42)
- Change the supported PHP versions to 7.2-7.4 (#39)

### Deprecated

### Removed

### Fixed
- Add the required PHP extensions to the `composer.json` (#49)
- Upgrade to jQuery 3.5.0 (#44)
- Always use the Composer-installed dev tools (#41)
- Fix warnings in the `travis.yml` (#40)
- Do not cache `vendor/` on Travis CI (#38)
