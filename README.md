# Findologic OXID 4 & 6 DI Plugin

In order to use the Findologic service you need to install:
* Findologic [plugin-oxid-di](https://github.com/findologic/plugin-oxid-di) for search & navigation platform.
* Findologic [plugin-oxid-di-export](https://github.com/findologic/plugin-oxid-di-export/) for product export.

## Installation

See also [OXID documentation](https://docs.oxid-esales.com/developer/en/6.2/development/modules_components_themes/module/tutorials/module_setup.html).

* Copy the `findologic` folder to the plugin directory at `<shop_directory>/source/modules`.

* Move the file `findologic/findologic/findologic_export.php` to `<shop_directory>/source`

* Install module configuration: 
```bash
cd <shop_directory>
vendor/bin/oe-console oe:module:install-configuration source/modules/findologic/findologic
```

* Register module package in project composer.json:
```bash
cd <shop_directory>
composer config repositories.findologic/findologic path source/modules/findologic/findologic
composer require findologic/search
```
Important: In case you’ll be asked if you want to overwrite other module files, you need to select “No” for an answer to avoid changing files of other modules.

* Open the OXID admin and activate the module Findologic - Search & Navigation Platform.

* Click on Settings and insert the shop key provided by Findologic and press save.
  
* Clear shop cache or remove tmp files with 
```bash
rm <shop_directory>/source/tmp/*
```

## Deployment & Release

1. Create a release if not already done.
1. Set version number to `metadata.php` and `composer.json`.
1. Manually zip all contents from the topmost `findologic` folder and name it
 `FINDOLOGIC_OXID_4_6_x.x.x.zip`.
1. Upload this zip file to Google Drive in folder `Development/Plugins/OXID/OXID 4 & 6 DI Plugin/`.
1. Log into https://exchange.oxid-esales.com and go to *My extensions*. The next
 step needs to be done for two plugins ("FINDOLOGIC DI - PE" & "FINDOLOGIC DI - CE").
1. Click on the plugin and go to *Edit versions*, upload the zip file and select all
 available checkboxes and enter the version constraint. Check older versions in order to
 know for which OXID versions the plugin is compatible. Lastly save the plugin version by clicking on "Save".
1. Wait until OXID has reviewed the plugin and then notify everyone at Basecamp.
