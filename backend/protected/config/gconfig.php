<?php

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('613765511344-24h6ivqgr8nnfhk7euirirh2q0f7qi9e.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/jabalnusra-dev/backend/site/login');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>