<?php

/**
 * Diese Datei ist Teil des OAuth2-Login-Bundles
 *
 * (c) Samson1964 <https://github.com/Samson1964>
 *
 * @package   contao-oauth2-bundle
 * @author    Frank Binding <https://github.com/Samson1964>
 * @license   LGPL-3.0-or-later
 * @copyright Frank Binding @2025
 */

use \CoreBundle\DataContainer\PaletteManipulator;

/**
 * Palette tl_member modifizieren
 */
PaletteManipulator::create()
	->addField('nuId', 'username')
	->applyToSubpalette('login', 'tl_member')
;


/**
 * CSS-Klasse w50 beim Feld username hinzufügen
 */
$GLOBALS['TL_DCA']['tl_member']['fields']['username']['eval']['tl_class'] = 'w50';


/**
 * Passwort-Feld ist nicht Pflicht im Backend
 */
if(TL_MODE == 'BE')
{
	$GLOBALS['TL_CONFIG']['minPasswordLength'] = 0;
	$GLOBALS['TL_DCA']['tl_member']['fields']['password']['eval']['minlength'] = 0;
	$GLOBALS['TL_DCA']['tl_member']['fields']['password']['eval']['mandatory'] = false;
}


/**
 * Felder
 */
$GLOBALS['TL_DCA']['tl_member']['fields']['nuId'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_member']['nuId'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array
	(
		'unique'              => true, 
		'tl_class'            => 'w50'
	),
	'sql'                     => "varchar(255) NOT NULL default ''"
);
