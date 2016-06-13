<?php
/**
 * Basic ResourceModel for custom HelloWorld text messages
 *
 * @category  Magento 2
 * @package   Tudock_HelloWorld
 * @copyright Copyright (c) 2016 Tudock GmbH (http://www.tudock.de/)
 * @author    Marco Köpcke <marco.koepcke@tudock.de>
 * @license   The MIT License (https://opensource.org/licenses/MIT)
 */

namespace Tudock\HelloWorld\Model\ResourceModel;

class HelloText extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
	/**
	 * Initialize resource model
	 *
	 * @return void
	 */
	protected function _construct() {
		$this->_init('tudock_helloworld', 'id');
	}
}