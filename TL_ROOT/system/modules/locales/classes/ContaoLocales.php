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
 * Namespace
 */
namespace ContaoLocales;


/**
 * Class ContaoLocales
 *
 * @copyright  Silvia Ulenberg 2016
 * @author     Silvia Ulenberg
 * @package    Devtools
 */
class ContaoLocales extends \Frontend
{
	
	/**
	 * Generate the module
	 */
	public function setLocale($objPage, $objLayout, $objPageRegular)
	{
		$strLocale = 'de_DE';

		// Load all parent pages
		$objParentPage = \PageModel::findParentsById($objPage->pid);

		while ($objParentPage->next()) {
			if ($objParentPage->type == 'root') {
				$strLocale = $objParentPage->locale;
				break;
			}
		}

		$objPage->locale = $strLocale;
		setlocale(LC_ALL, $strLocale);

		return $objPage;
	}
}
