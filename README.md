Microsoft Authentication support

## Install instructions

1. Clone github repository
2. Put cloned folder in extension/ directory
3. Activate extension in settings/settings.ini.php file
```
'extensions' => 
    array (          
        'lhcmicrosoftauth'
    ),
```
4. Install composer requirements with. You have to download composer or just have it installed already.
``` 
cd extension/lhcmicrosoftauth && composer install
```
5. Clean cache. Just click clean cache in Live Helper Chat back office.
6. Execute doc/install.sql on database manager or just run
    ```
    php cron.php -s site_admin -e lhcmicrosoftauth -c cron/update_structure
    ```
9. Enter settings in module configuration from left menu Modules -> Microsoft Auth
10. That's it.

You will have to create Application in Azure.

