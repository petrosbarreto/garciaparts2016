Thanks for using this extension!

Version: 2.3

Installation:
---------------

Extract downloaded mercadolivre.zip and you will find another zip called "mercadolivre.ocmod.zip"

Please Go to Extensions -> Extension Installer
Browse "mercadolivre.ocmod.zip" and click on continue.


Now install from admin -> Extensions -> Modules -> Mercadolivre

Finally, go to admin -> Extensions -> Modifications and now click on "Refresh" button

How to setup cron job
-----------------------
1. CronJob is optional. If you want to fetch ML order data without logging to store admin. Please add a cronjob in every
3 hours.

Cronjob URL:  http://YOUR_SITE_URL/mercadolivre_cron


How to upgrade?
--------------
Please go to Mercadolivre module Dashboard. It will show "Upgrade" button If there any upgrade available. Click on that button for upgrading.


Support:
---------------
Please write comments in the module page of the opencart.com

Or you can send email to opencartmart@gmail.com for quick response.


Image Issue
-------------
ML does not allow https for images. So you must be skip images if you have hard redirection from http to https. You can consider
following code for skipping images from SSL redirection.

RewriteCond %{HTTPS} !=on
RewriteCond %{THE_REQUEST} !\.(png|jpg|gif|jpeg|bmp)
RewriteRule ^/?(.*) https://%{SERVER_NAME}/$1 [R,L]



Change Log
-------------
4/12/2015

1. Google product option

12/01/2015

1. cronjob added for order fetcing

01/07/2016
1. Sync existing products from ML
2. Import old ML orders
3. Category Prediction