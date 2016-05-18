<?php
/**
 * Configuration file for Facebook API
 * Author: Jonathan Loescher
 * Date: 5/15/2016
 * Time: 2:51 PM
 */

$fb = new \Facebook\Facebook([
    'app_id' => '125261207887994',
    'app_secret' => '77e8cc0e908913043ee34c83284d589e',
    'default_graph_version' => 'v2.6',
]);
$helper = $fb->getRedirectLoginHelper();