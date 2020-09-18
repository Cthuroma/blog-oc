# PHP Blog - 5th Project
## Prerequisites
- PHP ver. 7.2.19^
- MySQL Database
- Apache Server
- Any Mail-Catcher
## Installation
- Clone the repo :
```shell script
git clone https://github.com/Cthuroma/blog-oc.git
```
- Execute the ./blog-db.sql script on your local DB.
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
- Duplicate the ./Config.dist.php file into a ./Config.php file and put your own DB credentials.
- The default SQL script includes an admin account : Login :
admin@admin.blog / Password : wKXCoF5$
