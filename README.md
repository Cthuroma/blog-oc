# PHP Blog - 5th Project
## Prerequisites
- PHP ver. 7.2.19^
- MySQL Database
- Apache Server
- Any Mail-Catcher
## Installation
- Execute the SQL script on your local DB.
- Make sure you have a virtual host running root at ./public/ for the router to work correctly. For example :
```apacheconfig
<VirtualHost *:80>
    DocumentRoot "C:/laragon/www/blog-oc/public/"
    ServerName blog-oc.test
    ServerAlias *.blog-oc.test
    <Directory "C:/laragon/www/blog-oc/public/">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```
- Tweak the ./Config.php file to put your own DB credentials.
- The default SQL script includes an admin account : admin@admin.blog:wKXCoF5$
