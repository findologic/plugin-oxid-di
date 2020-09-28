# Findologic OXID 4 & 6 DI Plugin

In order to use the Findologic service you need to install:
* Findologic [plugin-oxid-di](https://github.com/findologic/plugin-oxid-di) for search & navigation platform.
* Findologic [plugin-oxid-di-export](https://github.com/findologic/plugin-oxid-di-export/) for product export.

## Installation

See also [OXID documentation](https://docs.oxid-esales.com/developer/en/6.2/development/modules_components_themes/module/installation_setup/installation.html).

* Copy the `findologic` folder to the plugin directory at `<shop_directory>/source/modules`.

* Move the file `findologic/findologic/findologic_export.php` to `<shop_directory>/source`

* Install module configuration: 
```bash
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
  
## Product export

  A functional export must be returned in the `init` function of `controllers/Findologic.php`
  
  An example with our export library [libflexport](https://github.com/findologic/libflexport) is already included
  
  Export documentation can be found [here](https://docs.findologic.com/doku.php?id=xml_export_documentation:XML_format)
  
## Run export

  Export is called via url that is something like this:
  
  *SHOP_URL/findologic_export.php?shopkey=SHOP_KEY&start=NUMBER&count=NUMBER*
  
  Three parameters  that are necessary  for successfully running export are:
  * shopkey → SHOPKEY provided by FINDOLOGIC
  * start → number that should not be lower than zero
  * count → number that should not lower than zero and “start” number
  
  If any of these parameters is not according to standards, export would not be run, and error message will be displayed. Generated XML is validated against predefined [XSD Schema](https://github.com/findologic/xml-export/blob/master/src/main/resources/findologic.xsd).

## Deployment & Release

1. Create a release if not already done.
1. Manually zip all contents from the topmost `findologic` folder and name it
 `FINDOLOGIC_OXID_4_6_x.x.x.zip`.
1. Upload this zip file to Google Drive in folder `Development/Modul-Entwicklung/DI Module/OXID 4 & 6/`.
1. Log into https://exchange.oxid-esales.com and go to *My extensions*. The next
 step needs to be done for two plugins ("FINDOLOGIC DI - PE" & "FINDOLOGIC DI - CE").
1. Click on the plugin and go to *Edit versions*, upload the zip file and select all
 available checkboxes and enter the version constraint. Check older versions in order to
 know for which OXID versions the plugin is compatible. Lastly save the plugin version by clicking on "Save".
1. Wait until OXID has reviewed the plugin and then notify everyone at Basecamp.
