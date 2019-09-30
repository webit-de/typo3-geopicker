<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'GeoPicker /* PATCHED */',
    'description' => 'BE extension that allows to handle GPS coordinate fields in your own extensions',
    'category' => 'module',
    'version' => '1.0.0',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'clearcacheonload' => false,
    'author' => 'Marcus Biesioroff',
    'author_email' => 'marcus@biesioroff.com',
    'author_company' => 'Marcus Biesioroff Group',
    'constraints' =>
    array(
        'depends' =>
        array(
            'typo3' => '7.6.0-8.7.99',
        ),
        'conflicts' =>
        array(
        ),
        'suggests' =>
        array(
        ),
    ),
);
