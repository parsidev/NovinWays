laravelSms
==========

package for NovinWays WebService - Laravel5 (published for www.novinways.com) (published for [novinways.com](http://novinways.com)) this package only work for Iranian Users

installation
------------
For install this package Edit your project's ```composer.json``` file to require parsidev/novinways

```php
"require": {
    "parsidev/novinways": "dev-master"
},
```
Now, update Composer:
```
composer update
```
Once composer is finished, you need to add the service provider. Open ```config/app.php```, and add a new item to the providers array.
```
'Parsidev\Novinways\NovinwaysServiceProvider',
```
Next, add a Facade for more convenient usage. In ```config/app.php``` add the following line to the aliases array:
```
'Novinways' => 'Parsidev\Novinways\Facades\Novinways',
```
Publish config files:
```
php artisan vendor:publish
```
for change webServiceID and webServicePassword change ```config/novinways.php```

Usage
-----
for use this package, please register on [novinways.com](http://novinways.com)

Coming Soon...