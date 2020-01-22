# FINDOLOGIC OXID 6 DI PLUGIN

  FINDOLOGIC OXID DI plug-in needs to be implemented in OXID eShop for successful implementation of FINDOLOGIC Search.
  
## INSTALLATION

  FINDOLOGIC OXID DI plug-in installation procedure is basically the same as for any other OXID plug-in. It can be summed up in a few simple steps:
  * Plug-in content needs to copied into OXID folder called *“Modules”*
  * File called *“findologic_export.php”* that can be found in plug-in root directory needs to be moved into root directory of OXID eshop
  * After all this, in Admin panel under Extension → Modules, *“Findologic Search”* should be listed as one of available plug-ins
  * After clicking on *“Findologic Search”*, on the lower part of the screen plug-in info should be displayed. In order for plug-in to be installed on the system one needs to click *“Activate”*
  * After activation, small icon beside *“Findologic Search”* should become green, which indicates that plug-in is successfully installed on the system
  * After clicking on *“Findologic Search”* on lower part of the screen, click on *“Settings”* tab, then click *“FINDOLOGIC Shop key”* and in the available field or fields (depends on how many languages shop has) insert SHOPKEY that is provided by FINDOLOGIC, and finally,  click *“Save”*
  
  **Note**: Shop key must be entered in valid format or error will be shown
  * Finally, shop's cache must be cleared
  
## WRITING EXPORT

  A functional export must be returned in the `init` function of `controllers/Findologic.php`
  
  An example with our export library [libflexport](https://github.com/findologic/libflexport) is already included
  
  Export documentation can be found [here](https://docs.findologic.com/doku.php?id=xml_export_documentation:XML_format)
  
## RUNNING EXPORT

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
 `FINDOLOGIC_OXID6_x.x.x.zip`.
1. Upload this zip file to Google Drive in folder `Development/Modul-Entwicklung/DI Module/OXID6/`.
1. Log into https://exchange.oxid-esales.com and go to *My extensions*. The next
 step needs to be done for two plugins ("FINDOLOGIC DI - PE" & "FINDOLOGIC DI - CE").
1. Click on the plugin and go to *Edit versions*, upload the zip file and select all
 available checkboxes and enter the version constraint. Check older versions in order to
 know for which OXID versions the plugin is compatible. Lastly save the plugin version by clicking on "Save".
1. Wait until OXID has reviewed the plugin and then notify everyone at Basecamp.
