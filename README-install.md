# README #

Farmitoo - Technical test 2021

Author : Nicolas MOLINARO

## PHP version
```
PHP >= 7.2.5
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