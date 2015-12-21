# Insecurity

[![Build Status](https://travis-ci.org/oliverklee/insecurity.svg?branch=master)](https://travis-ci.org/oliverklee/insecurity)

## What is this all about?

This project is a web application that consists of a plethora of security
vulnerabilities held together by some functionality.

This project has been created as an educational resource for workshops on
PHP web security. You could use in several ways:

* show the attendees the vulnerabilities and how to fix them
* have the attendees search for vulnerabilities
* have the attendees fix the vulnerabilities


## Warning

Never, ever put this project on any web server that is accessible from the
internet. Your server will get hacked.


## Installation

1. Install [Vagrant](https://www.vagrantup.com/) and run `vagrant up` .
2. `vagrant ssh`
3. `sh /var/www/db/setup-database.sh`
4. Log out from the virtual box.
5. You now can access your insecure site at [http://192.168.33.10/](http://192.168.33.10/).
6. You can log in as either `admin@example.com / 12345678` or as `user@example.com / asdfqwer` .  


## List of vulnerabilities

There is a list of vulnerabilities in the file `Vulnerabilities.md` in the
branch `solutions` (to keep you from seeing the solutions by accident before
you have had the chance to find the vulnerabilities yourself).


## About me (Oliver Klee)

I am a former member of the TYPO3 Security Team and the maintainer of the
[PHPUnit TYPO3 extension](http://typo3.org/extensions/repository/view/phpunit),
which is available in the TYPO3 extension repository (TER).

You can book me for
[workshops](https://www.oliverklee.de/workshops/workshops.html)
at your company.

I also frequently give workshops at the TYPO3 Developer Days.


## Contributing

Contributions in the form of bug fixes, more vulnerabilities or clean-up in the
form of pull requests is always more than welcome.

Please do not report any security vulnerabilities, and please do not submit pull
requests with security fixes - you're missing the point.


## License

The application is licensed under the Gnu Public License (GPL) V3.

The included Twitter Bootstrap and jQuery are licensed under the MIT License
(MIT).
