<?php

namespace Tudock\HelloWorld\Observer;

use Magento\Framework\Event\Observer;

/**
 * A demo observer that triggers after a product was loaded
 *
 * @category  Magento 2
 * @package   Tudock_HelloWorld
 * @copyright Copyright (c) 2016 Tudock GmbH (http://www.tudock.de/)
 * @author    Marco Köpcke <marco.koepcke@tudock.de>
 * @license   The MIT License (https://opensource.org/licenses/MIT)
 */
class ProductLoadInjecter implements \Magento\Framework\Event\ObserverInterface {

	/**
	 * Add a little text to the product.
	 *
	 * @param Observer $observer
	 *
	 * @return void
	 */
	public function execute(\Magento\Framework\Event\Observer $observer) {
		/** @var \Magento\Catalog\Model\Product $model */
		$model = $observer->getData('data_object');
		$model->setData('tudock_helloworld','Hello Observer!');
	}}