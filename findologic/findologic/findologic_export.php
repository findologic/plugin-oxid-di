<?php
require_once dirname(__FILE__) . "/bootstrap.php";
require_once dirname(__FILE__) . "/modules/findologic/findologic/Controller/Findologic.php";

(new Findologic())->init();
