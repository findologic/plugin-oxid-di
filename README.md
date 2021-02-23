# Findologic OXID 4 & 6 DI Plugin

In order to use the Findologic service you need to install:
* Findologic [plugin-oxid-di](https://github.com/findologic/plugin-oxid-di) for search & navigation platform.
* Findologic [plugin-oxid-di-export](https://github.com/findologic/plugin-oxid-di-export/) for product export.

## Installation

* See [Findologic docs](https://docs.findologic.com/doku.php?id=integration_documentation:plugin:en:direct_integration:oxid).

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
