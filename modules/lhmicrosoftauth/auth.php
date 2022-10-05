<?php

if (isset($_GET['error']) && $_GET['error'] == 'immediate_failed') {
    erLhcoreClassModule::redirect('microsoftauth/login','?choose=1');
    exit;
}

use TheNetworg\OAuth2\Client\Provider;

$mSettings = erLhcoreClassModelChatConfig::fetch('microsoftauth_options');
$microsoftAuthdata = (array)$mSettings->data;

// Call Microsoft API
$mClient = new TheNetworg\OAuth2\Client\Provider\Azure([
    // Required
    'clientId'                  => $microsoftAuthdata['microsoft_client_id'],
    'clientSecret'              => $microsoftAuthdata['microsoft_client_secret'],
    'redirectUri'               => erLhcoreClassXMP::getBaseHost() . $_SERVER['HTTP_HOST'] . erLhcoreClassDesign::baseurl('microsoftauth/auth'),
]);

// Check given state against previously stored one to mitigate CSRF attack
if (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['OAuth2.state'])) {
    unset($_SESSION['OAuth2.state']);
    exit('Invalid state');
} else {
    // Try to get an access token (using the authorization code grant)
    $token = $mClient->getAccessToken('authorization_code', [
        'scope' => $mClient->scope,
        'code' => $_GET['code']
    ]);

    // Optional: Now you have a token you can look up a users profile data
    try {

        // We got an access token, let's now get the user's details
        $userInfo = $mClient->getResourceOwner($token);

        // Use these details to create a new profile
        $user = erLhcoreClassModelMicrosoftAuth::findOne(array('filter' => array('oauth_uid' => $userInfo->getId())));

        if (!($user instanceof erLhcoreClassModelMicrosoftAuth)) {
            $user = new erLhcoreClassModelMicrosoftAuth();
            $user->oauth_uid = $userInfo->getId();
            $user->givenName = $userInfo->getFirstName();
            $user->familyName = $userInfo->getLastName();
            $user->email = $userInfo->getUpn();
            $user->saveThis();
        }

        if ($user->user_id == 0) {
            if (erLhcoreClassUser::instance()->isLogged()) {
                $user->user_id = erLhcoreClassUser::instance()->getUserID();
                $user->saveThis();
                erLhcoreClassModule::redirect('user/account','#!#microsoftauth');
                exit;
            } else {
                erLhcoreClassModule::redirect('user/login', '?oauth_microsoft=' . $user->id);
                exit;
            }
        } elseif (erLhcoreClassUser::instance()->isLogged()) {
            erLhcoreClassModule::redirect('/');
            exit;
        } else {
            // Login user instantly as during password change he verified his logins
            erLhcoreClassUser::instance()->setLoggedUser($user->user_id);
            erLhcoreClassModule::redirect('/');
            exit;
        }

    } catch (Exception $e) {

        // Failed to get user details
        exit('Oh dear...');
    }

    // Use this to interact with an API on the users behalf
    echo $token->getToken();
}

exit;
?>