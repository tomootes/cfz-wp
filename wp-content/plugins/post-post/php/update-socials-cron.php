<?php

set_include_path('/var/www/html');

require_once("wp-load.php");
require_once("wp-content/plugins/social-mashup-manager/php/update-socials-cron.php");

updateSocialFeeds();

?>