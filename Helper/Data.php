<?php
namespace Tudock\HelloWorld\Helper;

/**
 * Demo of a simple data helper. You can create any helper with any name in this
 * directory and include it via dependency injection.
 *
 * @category  Magento 2
 * @package   Tudock_HelloWorld
 * @copyright Copyright (c) 2016 Tudock GmbH (http://www.tudock.de/)
 * @author    Marco Köpcke <marco.koepcke@tudock.de>
 * @license   The MIT License (https://opensource.org/licenses/MIT)
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper {

	/**
	 * Returns a random CSS color
	 * @return string
	 */
	public function getSomeColor() {
		return 'rgb('.rand(0,255).','.rand(0,255).','.rand(0,255).')';
	}
}