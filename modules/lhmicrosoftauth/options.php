<?php

$tpl = erLhcoreClassTemplate::getInstance('lhmicrosoftauth/options.tpl.php');

$tOptions = erLhcoreClassModelChatConfig::fetch('microsoftauth_options');
$data = (array)$tOptions->data;

if ( isset($_POST['StoreOptions']) ) {

    $definition = array(
        'microsoft_client_id' => new ezcInputFormDefinitionElement(
            ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
        ),
        'microsoft_client_secret' => new ezcInputFormDefinitionElement(
            ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
        )
    );

    $form = new ezcInputForm( INPUT_POST, $definition );
    $Errors = array();

    if ( $form->hasValidData( 'microsoft_client_id' ) ) {
        $data['microsoft_client_id'] = $form->microsoft_client_id;
    } else {
        $data['microsoft_client_id'] = '';
    }

    if ( $form->hasValidData( 'microsoft_client_secret' )) {
        $data['microsoft_client_secret'] = $form->microsoft_client_secret;
    } else {
        $data['microsoft_client_secret'] = '';
    }

    $tOptions->explain = '';
    $tOptions->type = 0;
    $tOptions->hidden = 1;
    $tOptions->identifier = 'microsoftauth_options';
    $tOptions->value = serialize($data);
    $tOptions->saveThis();

    $tpl->set('updated','done');
}

$tpl->set('ga_options',$data);

$Result['content'] = $tpl->fetch();

$Result['path'] = array(
    array(
        'url' => erLhcoreClassDesign::baseurl('microsoftauth/index'),
        'title' => erTranslationClassLhTranslation::getInstance()->getTranslation('microsoftauth/module', 'Microsoft Auth')
    ),
    array(
        'title' => erTranslationClassLhTranslation::getInstance()->getTranslation('microsoftauth/module', 'Options')
    )
);

?>