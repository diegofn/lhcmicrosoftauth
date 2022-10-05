<?php

$gauth = erLhcoreClassModelMicrosoftAuth::fetch($Params['user_parameters']['id']);

if ($gauth->user_id == erLhcoreClassUser::instance()->getUserID()){
    $gauth->removeThis();
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;

?>