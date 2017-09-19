<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'GeoPicker',
    'description' => 'BE extension that allows to handle GPS coordinate fields in your own extensions',
    'category' => 'module',
    'version' => '0.0.2',
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
                    'typo3' => '6.2.0-6.2.99',
                ),
            'conflicts' =>
                array(),
            'suggests' =>
                array(),
        ),
);
