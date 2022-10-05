<?php

$Module = array( "name" => "Microsoft Auth",
				 'variable_params' => true );

$ViewList = array();

$ViewList['auth'] = array(
    'params' => array(),
    'uparams' => array()
);

$ViewList['login'] = array(
    'params' => array('id'),
    'uparams' => array()
);

$ViewList['index'] = array(
    'params' => array(),
    'uparams' => array(),
    'functions' => array('use_admin_configure'),
);

$ViewList['remove'] = array(
    'params' => array('id'),
    'uparams' => array(),
    'functions' => array('use_admin'),
);

$ViewList['options'] = array(
    'params' => array(),
    'uparams' => array(),
    'functions' => array('use_admin_configure'),
);

$FunctionList['use_admin'] = array('explain' => 'Allow operator to use Microsoft Login');
$FunctionList['use_admin_configure'] = array('explain' => 'Allow operator to configure Microsoft Auth');