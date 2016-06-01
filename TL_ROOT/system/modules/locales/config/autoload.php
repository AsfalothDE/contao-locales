<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'ContaoLocales',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'ContaoLocales\ContaoLocales' => 'system/modules/locales/classes/ContaoLocales.php',
));
