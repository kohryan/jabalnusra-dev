<?php

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('{clientId}');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('{secretkey}');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('{redirect}');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>