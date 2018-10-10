1. Clone networking-portal in /var/www/ directory
2. ```nano /etc/apache2/sites-enabled/000-default.conf```
3. Add following lines at the bottom :
```
	Alias /networking /var/www/networking-portal/public/
	<Directory "/var/www/networking-portal/public">
		AllowOverride All
		Order allow,deny
		allow from all
	</Directory>
```
	
4. ```sudo service apache2 restart```
5. ```cd /var/www/networking-portal```
6. ```nano public/.htaccess```
7. Add the following line :
```
	 RewriteBase /networking
```
8. ```sudo chmod -R 777 storage/```
9. ```sudo chmod -R 777 public/uploads```

Note: Always use ```{{ url('/any-url') }} ```instead of ```'/any-url'```

