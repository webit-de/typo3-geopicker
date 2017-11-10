<?php

return [
    // Register geopicker wizard
        'wizard_geopicker' => [
                'path' => '/Wizards/GeopickerWizard/',
                'target' => BIESIOR\Geopicker\Controller\GeopickerController::class . '::geoPickerWizard'
        ]
];
