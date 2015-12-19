# List of vulnerabilities in this project

**WARNING:** Stop reading here if you would like to find the vulnerabilities
yourself.

---

This list is categorized by the
[OWASP 2013 Top 10 Vulnerabilities list](https://www.owasp.org/index.php/Top_10_2013-Top_10).


## Injection

### SQL Injection (SQLi)

### Command Injection

#### OS Command Injection

#### PHP Command Injection


## Broken Authentication and Session Management


## Cross-Site Scripting (XSS)

### Stored/Persistent XSS

### Reflected XSS

### DOM Based XSS


## Insecure Direct Object References


## Security Misconfiguration


## Sensitive Data Exposure


## Missing Function Level Access Control


## Cross-Site Request Forgery (CSRF)


## Using Components with Known Vulnerabilities


## Unvalidated Redirects and Forwards





Einlogge, ohne Password oder Benutzer zu kennen SQL Injection, in URL: password=x" OR 1=1 (enkodiert)
JSON-Datei auslesen: http://192.168.33.10/configuration/db.json
DB-User ist root
User-ID in Cookie ändern
== -Vergleich bei Passwort
XSS im Login-Formular
XSS im Suchformular
SQLi bei User-ID im Cookie
Information Disclosure (Path) bei Fehlermeldungen

SQL-User ist Root
Passwörter nicht gehasht
Passwörter nicht gesaltet

ToDo: Root-User-Passwort = SSH-Passwort
persistentes XSS in Userliste

Request-URI im Form-Tag