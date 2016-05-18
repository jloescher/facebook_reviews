<?php
/**
 * Author: Jonathan Loescher
 * Date: 5/16/2016
 * Time: 10:51 AM
 */

session_start();
require_once __DIR__ . '../src/Facebook/autoload.php';
include 'fb_config.php';

$permissions = ['email', 'reviews', 'user_likes', 'user_events', 'rsvp_event', 'manage_pages', 'pages_show_list'];

try {
    if (isset($_SESSION['facebook_access_token'])) {
        $accessToken = $_SESSION['facebook_access_token'];
    } else {
        $accessToken = $helper->getAccessToken();
    }
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // Display error when Graph returns error.
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // Display error when Validation fails or other local issues.
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (isset($accessToken)) {
    if (isset($_SESSION['facebook_access_token'])) {
        $fb->setDefaultAccessToken($_SESSION{'facebook_access_token'});
    } else {
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        $oAuth2Client = $fb->getOAuth2Client();
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }

    try {
        $profile_request = $fb->get('/me?fields=name,first_name,last_name');
        $profile = $profile_request->getGraphNode()->asArray();
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        header("Location: ./");
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
}