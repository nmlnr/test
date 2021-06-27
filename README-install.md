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
# SELLERMANIA - Technical test
#
<VirtualHost *:80>
	ServerName sellermania.local
	DocumentRoot "D:\xampp\htdocs\sellermania\technical_test\public"
	<Directory "D:\xampp\htdocs\sellermania\technical_test\public">
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
```