# CORK

[![Join the chat at https://gitter.im/classprep/CORK](https://badges.gitter.im/classprep/CORK.svg)](https://gitter.im/classprep/CORK?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)


Constitution of Republic of Korea


 자체생성은 md.  직접 생성한것은 .markdow


codeigniter 폴더안에 생성  
composer 이용  
curl -sS https://getcomposer.org/installer | php  
composer init  
(composer.json init)  
php composer.phar install  

composer.json 수정시에
php composer.phar update

codeigniter 설치
composer require codeigniter/framework


#Tech
Codeigniter
MySQL


http://theeye.pe.kr/archives/2802





# Virtual Hosts
#
# Required modules: mod_log_config

# If you want to maintain multiple domains/hostnames on your
# machine you can setup VirtualHost containers for them. Most configurations
# use only name-based virtual hosts so the server doesn't need to worry about
# IP addresses. This is indicated by the asterisks in the directives below.
#
# Please see the documentation at
# <URL:http://httpd.apache.org/docs/2.4/vhosts/>
# for further details before you try to setup virtual hosts.
#
# You may use the command line option '-S' to verify your virtual host
# configuration.

#
# VirtualHost example:
# Almost any Apache directive may go into a VirtualHost container.
# The first VirtualHost section is used for all requests that do not
# match a ServerName or ServerAlias in any <VirtualHost> block.
#
#<VirtualHost *:80>
#    ServerAdmin webmaster@dummy-host.example.com
#    DocumentRoot "/usr/local/opt/httpd24/docs/dummy-host.example.com"
#    ServerName dummy-host.example.com
#    ServerAlias www.dummy-host.example.com
#    ErrorLog "/usr/local/var/log/apache2/dummy-host.example.com-error_log"
#    CustomLog "/usr/local/var/log/apache2/dummy-host.example.com-access_log" common
#</VirtualHost>
#
#<VirtualHost *:80>
#    ServerAdmin webmaster@dummy-host2.example.com
#    DocumentRoot "/usr/local/opt/httpd24/docs/dummy-host2.example.com"
#    ServerName dummy-host2.example.com
#    ErrorLog "/usr/local/var/log/apache2/dummy-host2.example.com-error_log"
#    CustomLog "/usr/local/var/log/apache2/dummy-host2.example.com-access_log" common
#</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "/Users/dvmoomoodv/Sites/classprep"
    ServerName local.classprep.com
    ErrorLog "/private/var/log/apache2/local.classprep.com-error_log"
    CustomLog "/private/var/log/apache2/local.classprep.com-access_log" common

    <Directory "/Users/dvmoomoodv/Sites/classprep">
        #Options Indexes MultiViews
        Options FollowSymLinks Multiviews Indexes

	#AllowOverride None
	AllowOverride All

        Require all granted
	#Allow from all
	#Order allow,deny
    </Directory>
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "/Users/dvmoomoodv/Sites/classprep_admin"
    ServerName local.classprep-admin.com
    ErrorLog "/private/var/log/apache2/local.classprep-admin.com-error_log"
    CustomLog "/private/var/log/apache2/local.classprep-admin.com-access_log" common

    <Directory "/Users/dvmoomoodv/Sites/classprep_admin">
        Options Indexes MultiViews
        #Options FollowSymLinks Indexes

        #AllowOverride None
        AllowOverride All

        Require all granted
        #Allow from all
        #Order allow,deny
    </Directory>
</VirtualHost>


#back
<VirtualHost *:9000>
  DocumentRoot "/Users/dvmoomoodv/Sites/cork/CORK-server/vendor/codeigniter/framework"
  ServerName local.cork-server.com
  ErrorLog "/private/var/log/apache2/local.cork-server.com-error_log"
  CustomLog "/private/var/log/apache2/local.cork-server.com-access_log" common

  <Directory "/Users/dvmoomoodv/Sites/cork/CORK-server/vendor/codeigniter/framework">
      Options Indexes MultiViews
      #Options FollowSymLinks Indexes

      #AllowOverride None
      AllowOverride All

      Require all granted
      #Allow from all
      #Order allow,deny
  </Directory>
</VirtualHost>


#front
#<VirtualHost *:9001>
#  DocumentRoot "/Users/dvmoomoodv/Sites/classprep_admin"
#  ServerName local.cork-client.com
#  ErrorLog "/private/var/log/apache2/local.classprep-admin.com-error_log"
#  CustomLog "/private/var/log/apache2/local.classprep-admin.com-access_log" common
#
#  <Directory "/Users/dvmoomoodv/Sites/classprep_admin">
#      Options Indexes MultiViews
#      #Options FollowSymLinks Indexes
#
#      #AllowOverride None
#      AllowOverride All
#
#      Require all granted
#      #Allow from all
#      #Order allow,deny
#  </Directory>
#</VirtualHost>
