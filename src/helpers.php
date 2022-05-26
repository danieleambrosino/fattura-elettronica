<?php

/**
 * This file is part of deved/fattura-elettronica
 *
 * Copyright (c) Salvatore Guarino <sg@deved.it>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

if (!function_exists('fe_number_format')) {
	function fe_number_format($number)
	{
		return number_format($number, 2, '.', '');
	}
}
