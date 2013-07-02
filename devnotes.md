# Development Notes

* 3rd, July 2013
	* 01 : Added Facebook Auth w/ eden library
	* 02 : eden library is in /app/eden/eden.php (single file only)
	* 03 : FacebookAuthController.php has been added there will be /auth/facebook/register and /auth/facebook/login
	* 04 : /app/library/Facebook.php has been added  - merged eden w/ laravel inside the php file
	* 05 : fixed register.blade.php

* 2nd, July 2013
	* 01 : Added UserCP routes
	* 02 : Added Mongo-Auth in laravel routes
	* 03 : Added a simple function in 'Users.php' in app/models
	* 04 : Added app/library/ in autoloaded functions in composer.json
* 1st, July 2013
	* 01 : Added mongodb to composer.json
	* 02 : Created 'MCollection.php'
	* 03 : Extended MCollection, and made it usable to create collections that mimic basic model functionalities
	* 04 : Mimiced eden's templating blocks - head - body - foot
	* 05 : Sliced the templating properly to be able be easily maneuverable (see views)
	* 06 : Created 'HomeController.php'
	* 07 : User Registration is already done in mongodb
	* 08 : Server-side data-validation added, (empty strings, csrf protection and double data entry)
	* 09 : bootstrap design xD
	* 10 : added pre-requisite folder. A MongoDB PHP driver is saved ( >= PHP 5.4.* VC9)
	* 11 : login is already working