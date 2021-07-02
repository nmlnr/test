# README #

Farmitoo - Technical test 2021

Author : Nicolas MOLINARO

## Pré-requis
```
- Node.js installed
- PHP >= 7.2.5, test use PHP 7.4.12
```
## Hosts file
```
# FARMITOO - TEST
127.0.0.1	www.farmitoo.test	farmitoo.test
```
## Vhost XAMPP - Windows - w/ multiple PHP versions installed

```apacheconfig
# 
# FARMITOO - TEST
#
<VirtualHost *:80>
	ServerName www.farmitoo.test
	ServerAlias farmitoo.test
	DocumentRoot "path\to\root\public"
	<Directory "path\to\root\public">
        AllowOverride All
		Options +FollowSymLinks -Indexes 
		Order Allow,Deny
		Allow from all
		Require all granted  
    </Directory>
	
	SetEnv PHPRC "\\xampp\\php74"
    <FilesMatch "\.php$">
      SetHandler application/x-httpd-php74
      Action application/x-httpd-php74 "/php74/php-cgi.exe"
    </FilesMatch>
</VirtualHost>
```
## .env.local (adapt if necessary)
```
###> doctrine/doctrine-bundle ###
DATABASE_URL="mysql://root:@localhost/farmitoo-test?serverVersion=mariadb-10.4.8"
###< doctrine/doctrine-bundle ###
```

## Assets (CSS & JS)
At the root of the project, run
```
npm install
npm run build
```

## Database
At the root of the project, run
```
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

## Tests (Windows)
At the root of the project, run
```
.\vendor\bin\phpunit.bat tests\Unit\
```