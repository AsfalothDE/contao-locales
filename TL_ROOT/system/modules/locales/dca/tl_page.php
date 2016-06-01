<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   ContaoLocales
 * @author    Silvia Ulenberg
 * @license   GNU/LGPL
 * @copyright Silvia Ulenberg 2016
 */


/**
 * Table tl_page
 */
Bit3\Contao\MetaPalettes\MetaPalettes::appendFields('tl_page', 'root', 'global', array('locale'));

$GLOBALS['TL_DCA']['tl_page']['fields']['locale'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['locale'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('my_tl_page', 'getLocales'),
	'eval'                    => array('includeBlankOption' => true, 'tl_class'=>'w50'),
	'reference'               => &$GLOBALS['TL_LANG']['LNG'],
	/*'save_callback' => array
	(
		array('tl_page', 'checkRootType')
	),*/
	'sql'                     => "varchar(10) NOT NULL default ''"
);

/**
 * Class my_tl_page
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    Core
 */
class my_tl_page extends tl_page
{
	public function getLocales(DataContainer $dc) {
		\System::loadLanguageFile('languages');

		$arrOptions = array();

		$locales = shell_exec('locale -a');
		$arrLocales = explode("\n", $locales);

		foreach ($arrLocales as $locale) {
			$arrLanguage = explode('.', $locale);

			if (array_key_exists($arrLanguage[0], $GLOBALS['TL_LANG']['LNG'])) {
				$arrOptions[] = $locale;
			}
		}

		return $arrOptions;
	}
}
