<?php
$tpl = erLhcoreClassTemplate::getInstance('lhmicrosoftauth/index.tpl.php');

$Result['content'] = $tpl->fetch();

$Result['path'] = array(
    array(
        'url' => erLhcoreClassDesign::baseurl('microsoftauth/index'),
        'title' => erTranslationClassLhTranslation::getInstance()->getTranslation('chat/microsoftauth', 'Microsoft Auth')
    )
);

?>