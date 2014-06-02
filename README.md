# Insecurity

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

Copy this project into the document root of some virtual host on your machine
(either directly into the document root or in a subdirectory). Enable PHP
and indexes for that virtual host.

Then add a MySQL DB and a user for it with sufficient permissions and import
the file db/users.sql into it.


## Contributing

Contributions in the form of bug fixes, more vulnerabilities or clean-up in the
form of pull requests is always more than welcome.

Please do not report any security vulnerabilities, and please do not submit pull
requests with security fixes - you're missing the point.


## License

The application is licensed under the Gnu Public License (GPL) V3.

The included Twitter Bootstrap and jQuery are licensed under the MIT License
(MIT).
