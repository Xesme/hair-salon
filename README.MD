# Hair Salon Database

#### _A webpage that simulates a hair salon database, 24th February 2017_

#### By _**Xia Amendolara**_

## Description

This web application will simulate a management database for a hair salon, and allows the user to manage stylists as well as that stylists client list.

## Setup/Installation Requirements

1. _Fork and clone this repository from_ [gitHub](https://github.com/xesme/hair-salon).
2. Run `composer install --prefer-source --no-interaction` from project root
3. Create a local server in the /web directory within the project folder using the command: `php -S localhost:8000`
4. Open the directory http://localhost:8000/ in any standard web browser.


## Specifications

|Behavior|Input|Output|
|--------|-----|------|
|User can add a new stylist to the database| "Lisa" | "Lisa"|
|User can add a new client to the database | "Marge Simpleson" | "Marge Simpleson"|
|User can add numerous clients to the database | "Marge Simpleson", "Mary Monroe"| "Marge Simpleson", "Mary Monroe"|
|User can view all stylist | clicks button | "Lisa, Beth, Bruce"|
|User can view all clients for that stylist | clicks Lisa | "Marge Simpleson, Lady Gigi"|
|User can delete all information for each stylist | click delete button | " "|
|User can edit or add to the stylists client list| "Marge Simpleson" = "Margery Simpleson" | "Margery Simpleson"|

## Known Bugs

No bugs currently but, this application is unfinished.

## Support and contact details

Please contact XiaEsmeAmen@me.com with questions or concerns.

## Technologies Used

* _HTML_
* _CSS_
* _Bootstrap_
* _PHP_
* _Silex_
* _Twig_
* _Composer_

## License

*MIT license*

Copyright (c) 2017 {**Xia Amendolara**} All Rights Reserved.
