<?php

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Marcus Biesioroff <marcus@biesioroff.com>, Marcus Biesioroff Group
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

namespace BIESIOR\Geopicker\Controller;

use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * CommentController
 */
class GeopickerController extends ActionController
{

    /**
     * ObjectManager to create needed Objects in init-function
     *
     * @var ObjectManager
     */
    protected $objectManager;


    public function geoPickerWizard()
    {
        $p = GeneralUtility::_GET('P');

        $latField = $p['latField'];
        $lonField = $p['lonField'];
        $table = $p['table'];
        $uid = $p['uid'];
        $elevationEditable = $p['elevationEditable'];
        $elevationField = $p['elevField'];
        $elevationUnit = $p['elevUnit'];
        if ($elevationUnit !== 'feet') {
            $elevationUnit = 'meters';
        }
        $startLat = $p['startLat'];
        $startLon = $p['startLon'];

        $this->objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $configurationManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
        $typoscriptArray = $configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT,
            null,
            null
        );

        $data = array();
        $data['googleMapsApiKey'] = $typoscriptArray['module.']['tx_geopicker.']['settings.']['googleMapsApiKey'];
        $data['latField'] = $latField;
        $data['lonField'] = $lonField;
        $data['elevationEditable'] = $elevationEditable;
        $data['elevationField'] = $elevationField;
        $data['dataLatField'] = "data[$table][$uid][$latField]";
        $data['dataLonField'] = "data[$table][$uid][$lonField]";
        $data['dataElevationField'] = "data[$table][$uid][$elevationField]";
        $data['table'] = $table;
        $data['elevationUnit'] = $elevationUnit;
        $data['startLat'] = $startLat;
        $data['startLon'] = $startLon;
        $data['extPath'] = ExtensionManagementUtility::extRelPath('geopicker');

        /** @var $view \TYPO3\CMS\Fluid\View\StandaloneView */
        $view = GeneralUtility::makeInstance('TYPO3\CMS\Fluid\View\StandaloneView');
        $view->setTemplatePathAndFilename(ExtensionManagementUtility::extPath('geopicker') . 'Resources/Private/Standalone/GeoPickerWizard.html');
        $view->assign('data', $data);
        $rendered = $view->render();
        echo $rendered;
    }
}
