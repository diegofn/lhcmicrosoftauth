<?php

$mSettings = erLhcoreClassModelChatConfig::fetch('Microsoftauth_options');
$microsoftAuthdata = (array)$mSettings->data;

// Call Microsoft API
$mClient = new TheNetworg\OAuth2\Client\Provider\Azure([
    // Required
    'clientId'                  => $microsoftAuthdata['microsoft_client_id'],
    'clientSecret'              => $microsoftAuthdata['microsoft_client_secret'],
    'redirectUri'               => erLhcoreClassXMP::getBaseHost() . $_SERVER['HTTP_HOST'] . erLhcoreClassDesign::baseurl('microsoftauth/auth'),
]);

if (!isset($_GET['code'])) {
    // If we don't have an authorization code then get one
    $authUrl = $mClient->getAuthorizationUrl(['scope' => $mClient->scope]);
    $_SESSION['OAuth2.state'] = $mClient->getState();
    header('Location: '.$authUrl);
    exit;
}

?>