<?php
// COPY THIS FILE TO THE "source" FOLDER OF YOUR OXID INSTANCE

require_once dirname(__FILE__) . "/bootstrap.php";
require_once dirname(__FILE__) . "/modules/findologic/findologic/Controller/Findologic.php";

(new Findologic())->init();
